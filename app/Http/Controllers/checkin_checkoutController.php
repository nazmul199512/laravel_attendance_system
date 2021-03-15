<?php

namespace App\Http\Controllers;

use App\Admin;
use App\checkin;
use App\checkout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/**
 * Class checkin_checkoutController
 * @package App\Http\Controllers
 * @author MD. Nazmul Alam <nazmul199512@gmail.com>
 */
class checkin_checkoutController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_employee()
    {
//        if(!isset($_SESSION)){
//            session_start();
//        }
//        $current = isset($_SESSION['current_employee']['email'])?$_SESSION['current_employee']['email']:'';
        $checkin_last = checkin::latest()->first();
       // $checkin_last = DB::table('checkin')->where('email', $current);
        return view('employee',['last_checkin'=>$checkin_last]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkin(Request $request)
    {
        //$admin = Admin::all();
        $checkin = new checkin();
        $checkin->username = $request->username;
        $checkin->email = $request->email;
        $checkin->checkin_time = Carbon::now();
        $checkin->save();
       // Mail::to($admin->email)->send();
        return redirect('/employee');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkout(Request $request)
    {
        $checkout = new checkout();
        $checkout->username = $request->username;
        $checkout->email = $request->email;
        $checkout->checkout_time = Carbon::now();
        $checkout->save();
        return redirect('/employee');
    }
}
