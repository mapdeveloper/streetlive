<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay; 
use App\Models\Transaction;
use App\Models\Role;
use Auth;
USE Excel;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
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
     /**Display all the details**/
    public function index(Request $request)
    {  
        $table_search = !empty($request->table_search) ? $request->table_search : '';
        $transaction = Transaction::with('donors','ngos','volunteers')->filter($request->all())->paginate(5);
       // echo '<pre>';print_r($transaction);exit;
        return view('transaction.index', compact('transaction','table_search'))->with(Input::all());
    } 
    /**
     *Show the form for specified resource in storage.
     *
     * @return Response
     */
    public function transactionsdetails($id,Request $request)
    {
        $transactions = Transaction::where('id',$id)->first();
        $result = DB::select('select * from '. $transactions->class . 's where user_id = '.$transactions->user_id );
        return view('transaction.transactionsdetails',compact('transactions','result')); 
    }
     /**
     * Export the donor details in excel.
     *
     * @param  int  $id
     * @return Response
     */
     public function exportcsv()
     {
        $transactions = Transaction::with('users')->get();
        $transaction_array = array();
        $row = 0;
        foreach($transactions as $transaction){
            $transaction_array[$row] = [   
                'NAME'              => $transaction->users->name,
                'AMOUNT'            => $transaction->amount,
                'EMAIL'             => $transaction->email,
                'MERCHANT ID'       => $transaction->merchantTxnId,
                'TRANSACTION ID'    => $transaction->transactionId,
                'STATUS'            => $transaction->status,
            ];           
            $row++;
        }
        Excel::create('Transaction', function($excel) use($transaction_array) {
            $excel->sheet('Transaction', function($sheet) use($transaction_array) {  
                $sheet->fromArray(
                    $transaction_array
                );
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true
                    )
                ));
                $sheet->setAllBorders('thick');            
                $sheet->setAutoSize(true);                       
            });
        })->export('xlsx');         
     }
}
