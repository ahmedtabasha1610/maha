<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookkingReportController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:booking-list|booking-edit|booking-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:booking-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }
    public function index()
    {   $purchase=Purchase::where('status','!=','pedding')->latest()->simplepaginate(10);
       
        return view('booking.index',compact('purchase'));
    }

    public function statics_profits(){
        $d= Purchase::selectRaw('DATE_FORMAT(register_status_day, "%b") as month, SUM(disacount) as total')
        ->where('status','completed')
        ->where('confirm','yes')
        ->whereYear('register_status_day', '=', Carbon::now()->year)
         ->groupBy('month')
        ->orderByRaw('MONTH(register_status_day)')
        ->getQuery()
        ->get()
        ->mapWithKeys(function ($row) {
            return [$row->month => $row->total];
        })
        ->toJson();
        return view('booking.statics_profits',compact('d'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
       
            if($purchase)
            {
                $purchase->status = $request->input('status');
                $purchase->register_status_day = \Carbon\Carbon::now();
                $purchase->delivery_time = \DateTime::createFromFormat('Y-m-d H:i:s', $purchase->register_status_day)
                ->add(new \DateInterval('P14DT3H10M'))
                ->format('Y-m-d H:i:s'); 
                if($purchase->status =='completed'){
                    $bookings->status=4;
                    $bookings->save();
    
                 }if($purchase->status =='refunded'){
                    $bookings->status=5;
                    $bookings->save();
                 }
                $purchase->update();


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purchase::find($id)->delete();
        return redirect()->route('booking.index')->with('success','delete successfully.');
    }
}
