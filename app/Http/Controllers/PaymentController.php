<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay; 
use App\Models\Transaction;
use App\Models\Role;
use Auth;
use Session;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**Get the donate amount **/
    public function donate()
    {
        return view('payment.donate');
    }
    /** save the donate amount **/
    public function paynow(Request $request)
    {
       $role =Role::where('id',Auth::user()->role_id)->first();
       $amount = $request->amount;
       $transactions = new Transaction; 
       $transactions->user_id       = Auth::user()->id;
       $transactions->class         = $role->slug;
       $transactions->amount        = $request->amount;
       $transactions->email         = $request->email;
       $transactions->merchantTxnId = $request->merchantTxnId;
       $transactions->transactionId = $request->transactionId;
       $transactions->currency      = $request->currency;
       $transactions->status        = $request->status;
       $transactions->save();
       return view('payment.paynow',compact('amount'));
    
    }
}
