<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\content;
use App\Models\Purchase;
use App\Models\Services;

use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Notifications\agreeanddisagreebookingNotification;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $purchases= Purchase::where('advisor_id', '=',Auth::user()->id)
        ->where('status','!=','pedding')
        ->OrderBy('id','DESC')
        ->simplepaginate(5);
        $sers=Services::all();
        return view('dashadvisor.bookingdetails',[
            'Configuration' => $Configuration,
            'pages' => $pages,
            'Services' => $Services,
            'pagecontent' => $pagecontent,
            'purchases'=>$purchases,
            'sers'=>$sers,
        ]);   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
        if($purchase)
        {
            return response()->json([
                'status'=>200,
                'purchase'=> $purchase,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Purchase Found.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'status'=> 'required',
          
        ]);

     

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $purchase = Purchase::find($id);
            $bookings=Booking::find($purchase->booking_id);
            
            $user=User::find($purchase->user_id);
           
            if($purchase)
            {
                $purchase->status = $request->input('status');
                if($purchase->status =='ok'){
                    
                    $bookings->status=2;
                    $bookings->save();
    
                 }if($purchase->status =='canceled'){
                    $bookings->status=3;
                    $bookings->save();
                 }
                $purchase->update();
                $deta = [
                    'title' =>trans('title:').$purchase->booking->title,
                    'status' =>trans('status:').$purchase->status,
                    'date' =>trans('date:').$purchase->booking->start_date."to".$purchase->booking->end_date,
                    'time' => trans('time:').$purchase->booking->start_time."to".$purchase->booking->end_time,
                    'advisor_name' =>trans('Employee name:').$purchase->advisor->name." ".$purchase->advisor->lastname,
                    'advisor_id'=>$purchase->advisor_id,
                    'purchase_id'=>$purchase->id,
                 
                   
                ];
          //اشعار قاعدة بيانات وجيميل للمستخ\دم بحالة الحجز
                $user->notify(new agreeanddisagreebookingNotification($deta));
                //dd($purchase);
                return response()->json([
                    'status'=>200,
                    'message'=>'purchase Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No purchase Found.'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
