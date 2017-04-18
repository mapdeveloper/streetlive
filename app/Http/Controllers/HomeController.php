<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\Ngo;
use App\Models\Volunteer;
use App\Models\Transaction;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $donor       = Donor::count();
        $ngo         = Ngo::count();
        $volunteer   = Volunteer::count();
        $transaction = Transaction::count();
        return view('home')->with(array('donor'=> $donor,'ngo'=> $ngo,'volunteer'=> $volunteer,'transaction'=> $transaction)); 
    }

public function index1()
    {
        return view('welcome');
    }
}
