<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\LoanApplication;
use App\Models\LoanMaster;
use App\Models\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata'); 

        if(Auth::user()->role_id==1)
        {
            return redirect('agents');
        }
        else
        {
    
        }
    }
}
