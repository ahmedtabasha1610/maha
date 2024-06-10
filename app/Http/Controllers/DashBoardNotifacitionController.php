<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\dashNotifaction;

class DashBoardNotifacitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifies = DB::table('notifications')->where('type', 'App\Notifications\dashNotifaction')->get();

        return view('notifiy.index', compact('notifies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('notifiy.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'user_id' => 'required',
            'body' => 'required',

        ]);
        $user = User::all();

        $ordernotifiy = new Order([
            'title' => $request->get('title'),
            'user_id' => $request->get('user_id'),
            'body' => $request->get('body'),
        ]);
        $ordernotifiy->save();
        $u = $ordernotifiy->user_id;
        $user = User::find($u);
        $details = [
            'title' => $ordernotifiy->title,
            'decription' => $ordernotifiy->body,
            'body' => trans('Alert from Admin:') . Auth::user()->name,
            'order_id' => $ordernotifiy->id,
            'actionURL' => url('/notifiy/send/details/' . $ordernotifiy->user_id),

        ];

        $user->notify(new dashNotifaction($details));


        return redirect()->route('ordernotifiy.index')
            ->with('success', __('notifiy created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('notifiy.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notifiy = Order::findOrFail($id);
        $users = User::all();
        return view('notifiy.edit', compact('notifiy', 'users'));
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
        $this->validate($request, [
            'title' => 'nullable',
            'body' => 'nullable',

        ]);
        $input = $request->all();

        $notifiy = Order::find($id);

        $notifiy->update($input);


        $u = $notifiy->user_id;
        $user = User::where($u);
        $details = [
            'title' => $notifiy->title,
            'body' => trans('Alert from Admin:') . Auth::user()->name,
            'actionURL' => url('/notifiy/send/details/' . $user->id),

        ];

        $user->notify(new dashNotifaction($details));

        return redirect()->back()

            ->with('success', __('A notification of  has been sent to the user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notifiy = Order::find($id)->delete();
        return redirect()->route('ordernotifiy.index')
            ->with('success', __('notify deleted successfully.'));
    }
    public function notifydestroy($id)
    {
        $notifies = DB::table('notifications')->where('id',$id)->where('type', 'App\Notifications\dashNotifaction')->delete();
        // foreach ($notifies as $not) {
        //     $r = json_decode($not->data);
        //     foreach ($r as $key => $item) {
        //     }
        

        return redirect()->route('ordernotifiy.index')
            ->with('success', __('notify deleted successfully.'));

     }
    }

