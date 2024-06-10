<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Purchase;
use Illuminate\Http\Request;

class check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {    $purchase=Purchase::latest()->simplepaginate(10);
        foreach($purchase as $r){
            if($r->status=='completed'){
                $p= Purchase::find($r->id);
                $p->disacount=($p->total_amount)*0.4;
                $p->residual=$r->total_amount-$p->disacount;
                $p->save();
            }if($r->status=='refunded'){
                $p= Purchase::find($r->id);
                $p->disacount=0.0;
                $p->residual=0.0;
                $p->delivery_time=null;
                $p->register_status_day=null;
                $p->save(); 
            }if($r->status=='ok'){
                $p= Purchase::find($r->id);
                $p->disacount=($p->total_amount)*0.4;
                $p->residual=$r->total_amount-$p->disacount;
                $p->delivery_time=null;
                $p->register_status_day=null;
                $p->save(); 
            }if($r->status=='waiting'){
                $p= Purchase::find($r->id);
                $p->disacount=null;
                $p->residual=null;
                $p->delivery_time=null;
                $p->register_status_day=null;
                $p->save(); 
            }if($r->status=='canceled'){
                $p= Purchase::find($r->id);
                $p->disacount=null;
                $p->residual=null;
                $p->delivery_time=null;
                $p->register_status_day=null;
                $p->save(); 
            }if($r->status=='pedding'){
                $p= Purchase::find($r->id);
                $p->disacount=0.0;
                $p->residual=0.0;
                $p->delivery_time=null;
                $p->register_status_day=null;
                $p->save(); 
            }
        }
        return $next($request);
    }
}
