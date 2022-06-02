<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;
use App\Models\LeadsContactUs;
use App\Models\LeadsBike;
use Session;
use Stripe;
use DateTime;

class LeadsController extends Controller
{
    public function contactLeads(Request $request)
    {
        try{
            DB::beginTransaction();
            // dd($request->toArray());
                $lead = new LeadsContactUs;
                $lead->name     = $request->name;
                $lead->phone    = $request->phone;
                $lead->email    = $request->email;
                $lead->message  = $request->message;
                $lead->save();

                DB::commit();
                return back()->with('success', 'Updated Successfully!');
            }
            catch (\Throwable $e) 
            {
                DB::rollback();

                return back()->with('error', $e->getMessage());
            }
        return back()->with('error', 'Error in Store!');
    }
    public function bikeLeads(Request $request)
    {
        // dd($request->toArray());
        $pickup_date = substr($request->datetimes, 0, 10);
        $dropoff_date = substr($request->datetimes, 22, 10);
        
        $date1 = new DateTime($pickup_date);
        $date2 = new DateTime($dropoff_date);
        $interval = $date1->diff($date2);
        $totalRent = ($interval->d + 1) * $request->rent;
        // dd($totalRent);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = Stripe\Charge::create([
            "amount"        =>  100 * $totalRent,
            "currency"      =>  "usd",
            "source"        => $request->stripeToken,
            "description"   => "Test",
        ]);
        // dd($stripe->id);
        $email = auth()->user()->email;
        // dd($email);
        Mail::to($email)->send(new BookingMail($request, $stripe, $pickup_date, $dropoff_date, $totalRent));
        try{
            DB::beginTransaction();
            $lead = new LeadsBike;
            $lead->user_id          = auth()->user()->id;
            $lead->bike_id          = $request->bike_id;
            $lead->pickup_loc       = $request->pickup_loc;
            $lead->dropoff_loc      = $request->dropoff_loc;
            $lead->totalRent        = $totalRent;
            $lead->pickup_date      = $pickup_date;
            $lead->dropoff_date     = $dropoff_date;
            $lead->status           = 0;
            $lead->stripeChargeId   = $stripe->id;
            $lead->save();
            

            DB::commit();
            
            return back()->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
}
