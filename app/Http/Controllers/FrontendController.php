<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;
use App\Models\Bike;
use App\Models\LeadsBike;
use App\Models\State;
use App\Models\City;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\CustomerTestimonials;
use App\Models\HowItWorks;
use App\Models\FAQs;
use App\Models\Brands;
use App\Models\BikeTypes;

class FrontendController extends Controller
{
    public function index()
    {
        $faqs = FAQs::take(4)->get();
        $brand = Brands::take(2)->inRandomOrder()->get();
        $bike_loc = Bike::with('bike_brand', 'bike_state')->get()->groupBy('state');
        $test = CustomerTestimonials::get();
        $state = State::all()->sortBy('name');
        // dd($bike_loc->toArray());
        return view('welcome', compact('brand', 'faqs', 'test', 'bike_loc', 'state'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function service()
    {
        $brand = Brands::take(2)->inRandomOrder()->get();
        return view('pages.service', compact('brand'));
    }
    public function howItWorks()
    {
        $how = HowItWorks::get();
        // dd($how);
        return view('pages.howItWorks', compact('how'));
    }
    public function faqs()
    {
        $faqs = FAQs::get();
        return view('pages.faqs', compact('faqs'));
    }
    public function testimonial()
    {
        $test = CustomerTestimonials::get();
        // dd($test->toArray());
        return view('pages.testimonial', compact('test'));
    }
    public function insurance()
    {
        $bike = Bike::with('bike_brand')->take(2)->inRandomOrder()->get();
        return view('pages.insurance', compact('bike'));
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function becomeHost()
    {
        return view('pages.becomeHost');
    }
    public function bikeList(Request $request)
    {
        // dd($request->toArray());
        $location = State::all()->sortBy('name');
        $brands = Brands::where('active', 1)->get()->sortBy('name');
        $purpose = BikeTypes::where('status', 1)->get()->sortBy('name');
        if($request->has('filter'))
        {
            // dd('ok');
            $bike = Bike::with('bike_brand', 'bike_type', 'bike_state', 'bike_country');
            // if($request->has('pickup'))
            // {
            //     if($request->pickup != null)
            //     {
            //         $all_dates = array();
            //         $start = $request->pickup;
            //         $end = $request->dropoff;
                    
            //         $result = CarbonPeriod::create($start, $end);
              
            //         foreach ($result as $dt) {
            //             array_push($all_dates, $dt->format('m/d/y'));    
            //         }
            //         dd($all_dates);

            //     }
            // }
            if($request->has('purpose'))
            {
                if($request->purpose != null)
                {
                    $bike = $bike->where('type', $request->purpose);
                }
            }
            if($request->has('brands'))
            {
                if($request->brands != null)
                {
                    $bike = $bike->where('brand', $request->brands);
                }
            }
            if($request->has('location'))
            {
                if($request->location != null)
                {
                    $bike = $bike->where('state', $request->location);
                }
            }
            $bike = $bike->get();
            // dd($bike->toArray());
        }
        elseif($request->has('brand'))
        {
            // dd('ok');
            $brand = Brands::where('slug', $request->brand)->first();
            $bike = Bike::with('bike_brand', 'bike_type', 'bike_state', 'bike_country')->where('brand', $brand->id)->take(9)->get();
        }
        elseif($request->has('destination'))
        {
            // dd('ok');
            $bike = Bike::with('bike_brand', 'bike_type', 'bike_state', 'bike_country')->where('state', $request->destination)->take(9)->get();
            // dd($bike->toArray());
        }
        elseif($request->has('load_more'))
        {
            // dd('load_more');
            $bike = Bike::with('bike_brand', 'bike_type', 'bike_state', 'bike_country')->get();
            // dd($bike->toArray());
        }
        else{
            $bike = Bike::with('bike_brand', 'bike_type', 'bike_state', 'bike_country')->take(9)->get();
        }
        // dd($bike->toArray());
        return view('pages.bikeList', compact('bike', 'brands', 'purpose', 'location'));
    }
    public function bikeDetails($id)
    {
        // dd($id);
        $bike = Bike::where('slug', $id)->first();
        $pickup_date = LeadsBike::where('bike_id', $bike->id)->select('pickup_date', 'dropoff_date')->get();
        $all_dates = array();
        
        foreach($pickup_date as $pk)
        {
            $start = Carbon::parse($pk->pickup_date)->format('Y-m-d');
            $end = Carbon::parse($pk->dropoff_date)->format('Y-m-d');
            
            $result = CarbonPeriod::create($start, $end);
      
            foreach ($result as $dt) {
                // echo $dt->format("Y-m-d"). '</br>';
                // array_push($all_dates, $dt->year.'-'.$dt->month.'-'.$dt->day);    
                array_push($all_dates, substr($dt->toDateTimeString(), 0, 10));    
            }
            // $all_dates = $result->toArray();
        }
        // dd($all_dates);
        $all_dates = json_encode($all_dates);
        
        $bike = Bike::with('bike_brand', 'bike_type', 'bike_country')->where('slug', $id)->first();
        // dd($bike->toArray());
         
        
        return view('pages.bikeDetails', compact('bike', 'all_dates'));
    }
    public function destinations()
    {
        $bike = Bike::with('bike_state')->take(9)->inRandomOrder()->get();
        // dd($bike->toArray());
        return view('pages.destinations', compact('bike'));
    }
    public function brands()
    {
        $brand = Brands::inRandomOrder()->get();
        // dd($brand->toArray());
        return view('pages.brand', compact('brand'));
    }
    public function newsLetter(Request $request)
    {
        // dd($request->toArray());
        $sub = new Subscribe;
        $sub->email = $request->user;
        $sub->save();
        return back();
    }
}
