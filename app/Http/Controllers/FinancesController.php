<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Notifications\confirmedpaymentNotification;

class FinancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $purchase = Purchase::where('status','completed')->latest()->simplepaginate(10);
       return view('finances.index',compact('purchase'));
    }

 
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
        $extension = pathinfo(storage_path($purchase->image), PATHINFO_EXTENSION);

        return view('finances.edit',compact('purchase','extension'));
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
        $this->validate($request,[
           'confirm'=>'required',
           'image'=>'nullable|mimes:png,jpg,docx',
           'note'=>'nullable',
        ],[
          'confirm.required'=>'Please confirm your payment ',  
          'image.required'=>'Please enter image or doc or pdf',
        ]);
        
        $purchase = Purchase::find($id);
         $user=User::find($purchase->advisor_id);
        if ($request->hasfile('image')) {

            $request->image->store('images-payment-confirm','public');

           $image = $request->image->hashName();

        }else{
            $image = $purchase->image;
        }
        if($request->has('confirm')=='yes'){
            $confirm='yes';

        }else{
            $confirm='no';
        }
       
        $purchase->update([
            'confirm'=>$confirm,
            'historypay'=>Carbon::now(),
            'image'=>$image,
            'note'=>$request->input('note'),
        ]);

        if($purchase->confirm == 'yes'){
            $deta = [
                'title' => ' تم تحويل المبلغ المالي بقيمة '.$purchase->residual.$purchase->currency.'يرجى فحص البريد االالكتروني',
                'image' => url('storage/images-payment-confirm/'.$purchase->image),
            ];
      
            $user->notify(new confirmedpaymentNotification($deta));  
        }
     return redirect()->route('finances.index')->with('success','تم التحويل بنجاح');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
