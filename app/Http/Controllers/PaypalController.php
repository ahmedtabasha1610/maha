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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Notification;
use App\Notifications\advisorbookingNotification;
use App\Notifications\sendNotificationNewbooktoAdvisor;

class PaypalController extends Controller
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


    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        //This not exstis
        $payment_id = Session::get('paypal_payment_id');
        $amount = Session::get('payment');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        //false payment
        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            Session::flash('delete', trans('flash.PaymentFailed'));
            return Redirect('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);



        if ($result->getState() == 'approved') {

            $transactions = $payment->getTransactions();
            $relatedResources = $transactions[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            $saleId = $sale->getId();

            $Purchase  = Purchase::where('transaction_id', '=', $payment_id)->first();

            $Purchase->status = 'waiting';
            $Purchase->save();

            //Save Order ...
            $booking = Booking::find($Purchase->booking_id);
            $booking->status = 1;
            $booking->save();
            //  $user=User::find($Purchase->advisor_id);
            // $deta = [
            //     'greeting' => 'اشعار تنبيه بوصول حجز مدفوع',
            //     'body' => 'الاشعار من موقع استشاري',
            //     'thanks' => 'شكرا لتواصلك معنا',
            //     'actionText' => 'View My Site',
            //     'actionURL' => url('/'),
            // ];
      
            // $user->notify(new advisorbookingNotification($deta));
            //true paymemt.
            Session::flash('delete', trans('flash.PaymentSuccess'));
            return redirect()->route('details.advisor',['advisor_id'=>$Purchase->advisor_id,'id'=>$Purchase->id]);
        } else {
            //false paymemt.
            Session::flash('delete', trans('flash.PaymentFailed'));
            return redirect('/');
        }
    }
}
