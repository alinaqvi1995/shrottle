<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buyers;
use App\Models\User;
use App\Models\LeadsBike;

class BuyerController extends Controller
{
    public function create()
    {
        $user = User::where('id', auth()->user()->id)->first();
        // dd($user->toArray());
        $name = $user->name;
        $description="";
        $country_code ="";
        $phone ="";
        $license_no ="";
        $avatar ="";
        $license_image ="";
        $buyer = Buyers::where('user_id', auth()->user()->id)->first();

        if(isset($buyer))
        {
            $name           = $buyer->name;
            $description    = $buyer->description;
            $country_code   = $buyer->country_code;
            $phone          = $buyer->phone;
            $license_no     = $buyer->license_no;
            $avatar         = $buyer->avatar;
            $license_image  = $buyer->license_image;
        }
        return view('dashboard.buyer.create', compact('buyer', 'name', 'description' ,'country_code' ,'phone', 'license_no', 'avatar', 'license_image'));
    }
    public function update(Request $request)
    {
        // dd($request->toArray());
        try{
            DB::beginTransaction();

            $buyer = Buyers::where('user_id', auth()->user()->id)->first();
            if($buyer != null)
            {
                // dd($request->toArray());
                $buyer->name            = $request->name;
                $buyer->description     = $request->description;
                $buyer->country_code    = $request->country_code;
                $buyer->phone           = $request->phone;
                $buyer->license_no      = $request->license_no;
                if ($request->hasFile('avatar')) 
                {
                    $img = $request->avatar;
                    $number = rand(1,999);
                    $numb = $number / 7 ;
                    $extension      = $img->extension();
                    $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                    $filenamepath   = 'buyerAvater'.'/'.'img/'.$filenamenew;
                    $filename       = $img->move(public_path('storage/buyerAvater'.'/'.'img'),$filenamenew);
                    $buyer->avatar  = $filenamepath;
                }
                if ($request->hasFile('license_image')) 
                {
                    $img = $request->license_image;
                    $number = rand(1,999);
                    $numb = $number / 7 ;
                    $extension      = $img->extension();
                    $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                    $filenamepath   = 'licenseImage'.'/'.'img/'.$filenamenew;
                    $filename       = $img->move(public_path('storage/licenseImage'.'/'.'img'),$filenamenew);
                    $buyer->license_image     = $filenamepath;
                }
                $buyer->save();
            }
            else
            {
                $buyer = new Buyers;
                $buyer->user_id         = auth()->user()->id;
                $buyer->name            = $request->name;
                $buyer->description     = $request->description;
                $buyer->country_code    = $request->country_code;
                $buyer->phone           = $request->phone;
                $buyer->license_no      = $request->license_no;
                if ($request->hasFile('avatar')) 
                {
                    $img = $request->avatar;
                    $number = rand(1,999);
                    $numb = $number / 7 ;
                    $extension      = $img->extension();
                    $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                    $filenamepath   = 'buyerAvater'.'/'.'img/'.$filenamenew;
                    $filename       = $img->move(public_path('storage/buyerAvater'.'/'.'img'),$filenamenew);
                    $buyer->avatar     = $filenamepath;
                }
                if ($request->hasFile('license_image')) 
                {
                    $img = $request->license_image;
                    $number = rand(1,999);
                    $numb = $number / 7 ;
                    $extension      = $img->extension();
                    $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                    $filenamepath   = 'licenseImage'.'/'.'img/'.$filenamenew;
                    $filename       = $img->move(public_path('storage/licenseImage'.'/'.'img'),$filenamenew);
                    $buyer->license_image     = $filenamepath;
                }
                $buyer->save();
            }

        // return redirect()->route('buyer.index');

        DB::commit();
        return redirect()->route('buyer.index')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    public function myTrips()
    {
        $leads = LeadsBike::where('user_id', auth()->user()->id)->where('dropoff_date', '>=', now()->format('m/d/Y'));
        if($leads != null)
        {
            $leads = $leads->with('bike');
        }
        $leads = $leads->get();
        // dd($leads[0]->bike->bike_brand->name);
        return view('dashboard.buyer.myRides', compact('leads'));
    }
    public function myTripDetails($id)
    {
        $leads = LeadsBike::with('bike')->find($id);
        // dd($leads->toArray());
        return view('dashboard.buyer.rideDetail', compact('leads'));
    }
    public function bookingHistory()
    {
        $leads = LeadsBike::where('user_id', auth()->user()->id)->where('dropoff_date', '<=', now()->format('m/d/Y'));
        if($leads != null)
        {
            $leads = $leads->with('bike');
        }
        $leads = $leads->get();
        // $leads = now()->format('m/d/Y');
        // dd($leads);
        return view('dashboard.buyer.bookingHistory', compact('leads'));
    }
}
