<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Bike;
use App\Models\Sellers;
use App\Models\Buyers;
use App\Models\LeadsBike;
use DateTime;

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
    public function index()
    {
        $user = Auth::user();
        // dd($user->role);
        if($user->role == 'admin')
        {
            return redirect('/admin');
        }
        elseif($user->role == 'buyer')
        {
            // return redirect('/buyer');
            
            return redirect()->route('/');
        }
        elseif($user->role == 'seller')
        {
            return redirect('/seller');
        }
        // return view('home');
    }

    public function dashboard()
    {
        $user = Auth::user();
        // dd($totalBikes);
        
        if($user->role == "admin")
        {
            $bike = Bike::get();
            $totalBikes = count($bike);
            $seller = Sellers::get();
            $totalSellers = count($seller);
            $buyers = Buyers::get();
            $totalBuyers = count($buyers);
            $leads = LeadsBike::with('bike')->take(5)->get();
            // dd($leads->toArray());
            return view('dashboard.admin.index', compact('totalBikes', 'totalSellers', 'totalBuyers', 'leads'));
        }
        elseif($user->role == "buyer")
        {
            $leads = LeadsBike::with('bike')->where('user_id', auth()->user()->id)->get()->take(5);
            
            // dd($leads->toArray());
            return view('dashboard.buyer.index', compact('leads'));
        }
        elseif($user->role == "seller")
        {
            // $bike = Bike::where('seller_id', auth()->user()->seller->id)->get();
            // $totalBikes = count($bike);
            
            if(auth()->user()->seller != null)
            {
                $leads = LeadsBike::where('status', '!=', 5)->with('user', 'bike')->whereHas('bike',function($query){
                $query->where('seller_id', auth()->user()->seller->id);
                })->latest('created_at')->get()->take(5);
                return view('dashboard.seller.index', compact('leads'));
            }
            else{
                $leads = "";
                return view('dashboard.seller.index', compact('leads'));
            }
        }

    }
}
