<?php

namespace App\Http\Controllers;

use App\Models\User;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use App\Models\Booking;
use App\Models\content;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use App\Models\Purchase;
use App\Models\Services;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Models\Configuration;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Schema\Blueprint;
use App\Notifications\advisorbookingNotification;
use App\Notifications\sendNotificationNewbooktoAdvisor;

class CalendarController extends Controller
{
    private $_api_context;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET')));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function index()
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $events = array();
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        foreach ($bookings as $booking) {
            $color = '#660d33';

            if ($booking->status === 1) {
                $color = '#000';
            }if($booking->status === 2){
            $color='green';
            }if($booking->status === 3){
                $color='red';
            }if($booking->status === 4){
                $color='blue';
            }if($booking->status === 5){
                $color='orange';
            }

            $events[] = [
                'id'   => $booking->id,
               // 'title' => $booking->title . "\n" . $booking->start_time . "-" . $booking->end_time,
               'title' => $booking->start_time . "-" . $booking->end_time,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color,
                'startTime' => $booking->start_time,
                'endTime' => $booking->end_time,
            ];
        }

        return view('calendar.index', [
            'events' => $events,
            'Configuration' => $Configuration,
            'pages' => $pages,
            'Services' => $Services,
            'pagecontent' => $pagecontent
        ]);
    }
    public function detailsadvisor($advisor_id,$id,$notifiy_id=' '){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $advisor=Purchase::find($id);

        $user=User::find($advisor->user_id);
        $user->unreadNotifications->where('id',$notifiy_id)->markAsRead();
        
        return view('dashuser.detailsadvisor',compact('advisor','Configuration','pages','pagecontent','Services'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $booking = Booking::create([
            //'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'user_id' => Auth::user()->id,
            'status' => 0
        ]);

        if ($booking->status === 0) {
            $color = '#660d33';
        }
     

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
           // 'title' => $booking->title . "\n" . $booking->start_time . "-" . $booking->end_time,
            'title' =>$booking->start_time . "-" . $booking->end_time,
            'color' => $color,
            'startTime' => $booking->start_time,
            'endTime' => $booking->end_time,


        ]);
    }
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }




    public function indexbook($id)
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $events = array();
        $bookings = Booking::where('user_id', $id)->where('status', 0)->get();
        foreach ($bookings as $booking) {
            $color = '#660d33';

            if ($booking->status === 1) {
                $color = '#000';
            }

            $events[] = [
                'id'   => $booking->id,
                'title' => $booking->start_time . "-" . $booking->end_time,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color,
                'startTime' => $booking->start_time,
                'endTime' => $booking->end_time,
            ];
        }

        return view('calendar.indexbook', [
            'events' => $events,
            'Configuration' => $Configuration,
            'pages' => $pages,
            'Services' => $Services,
            'pagecontent' => $pagecontent
        ]);
    }


    public function details()
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        return view('calendar.details', [
            'Configuration' => $Configuration,
            'pages' => $pages,
            'Services' => $Services,
            'pagecontent' => $pagecontent
        ]);
    }


    public function updatebook($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }


        $user = User::find($booking->user_id);//user_id in booking table is advisor_id
        //paypal  with amount 
        $currency_code = 'USD';
        $pay = $user->amount;
    

        $Purchase =   Purchase::create([
            'user_id' => Auth::user()->id,
            'advisor_id' => $user->id,
            'order_id' => isset(Purchase::orderBy('id', 'DESC')->first()->order_id) ? Purchase::orderBy('id', 'DESC')->first()->order_id + 1 : 5000,
            'transaction_id' => null,
            'payment_method' => 'paypal',
            'booking_id' => $booking->id,
            'total_amount' => $pay,
            'currency' => $currency_code,
            'status' => 'pedding',
        ]);

        Session::put('payment', $pay);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($user->name)
            /** item name **/
            ->setCurrency($currency_code)
            ->setQuantity(1)
            ->setPrice($pay);
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency($currency_code)
            ->setTotal($pay);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            /** Specify return URL **/
            ->setCancelUrl(URL::route('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (PaymentExecution $ex) {
            if (Config::get('app.debug')) {
                Session::flash('delete', $ex->getMessage());
                return redirect('/');
            } else {
                Session::flash('delete', $ex->getMessage());
                return redirect('/');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                
        
                $redirect_url = $link->getHref();
                break;
            }
        }

        $deta = [
            'greeting' => ' اشعار تنبيه بوصول حجز مدفوع',
            'body' => 'Alert notification of the arrival of a paid reservation ',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'username' => 'UserName:'.Auth::user()->name.Auth::user()->lastname,
            'price'=>'Price:'.$pay.$currency_code,
            'details'=>'Reservation details'.$booking->start_date.'to'.$booking->end_date,
           
        ];
  
        $user->notify(new advisorbookingNotification($deta));
        // $details = [
        //     'title' => $booking->title,
        //     'body' => $booking->body,
        //     'owner_id' => Auth::user()->id,
        //     'user_id' => $booking->user_id,
        // ];

        // $user->notify(new sendNotificationNewbooktoAdvisor($details));

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        //save transaction_id and update row
        $Purchase->transaction_id = $payment->getId();
        $Purchase->save();

        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return response()->json($redirect_url);
        }

        Session::put('error', 'Unknown error occurred');
        return redirect('/');


        return response()->json('Event updated');
    }
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        if($booking->status==0){
        $booking->delete();
         return $id;
        }
    }
}
