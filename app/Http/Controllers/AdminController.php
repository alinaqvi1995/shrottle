<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LeadsContactUs;
use App\Models\LeadsBike;
use App\Models\Sellers;
use App\Models\Buyers;
use App\Models\Bike;
use App\Models\user;
use App\Models\Brands;
use App\Models\CustomerTestimonials;
use App\Models\FAQs;
use App\Models\HowItWorks;
use App\Models\Subscribe;
use App\Models\BikeTypes;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $leads = LeadsBike::all();
        dd($leads);
        return view('dashboard.admin.index', compact('leads'));
    }
    public function bike()
    {
        $bike = Bike::with('seller', 'bike_brand')->where('status', '!=', 5)->get();
        // dd($bike->toArray());
        return view('dashboard.admin.bike', compact('bike'));
    }
    public function bikeDetails($slug)
    {
        $bike = Bike::with('seller', 'bike_brand', 'bike_type', 'bike_country', 'bike_state', 'bike_city')->where('slug', $slug)->first();
        // dd($bike->toArray());
        return view('dashboard.admin.bikeDetail', compact('bike'));
    }
    public function bikeDelete($id)
    {
        $bike = Bike::find($id);
        // dd($leads->toArray());
        $bike->status = 5;
        $bike->save();
        return back();
    }
    public function buyer()
    {
        $buyer = Buyers::get();
        // dd($buyer->toArray());
        return view('dashboard.admin.buyer', compact('buyer'));
    }
    public function buyerDetails($id)
    {
        $buyer = Buyers::find($id);
        // dd($buyer->toArray());
        return view('dashboard.admin.buyerDetail', compact('buyer'));
    }
    public function seller()
    {
        $seller = Sellers::get();
        // dd($seller->toArray());
        return view('dashboard.admin.seller', compact('seller'));
    }
    public function sellerDetail($id)
    {
        $seller = Sellers::find($id);
        // dd($seller->toArray());
        return view('dashboard.admin.sellerDetail', compact('seller'));
    }
    public function leadContact()
    {
        $leads = LeadsContactUs::where('status', '!=', 5)->get();
        // dd($leads->toArray());
        return view('dashboard.admin.leadContactUs', compact('leads'));
    }
    public function leadContactDetail($id)
    {
        $leads = LeadsContactUs::find($id);
        // dd($leads->toArray());
        return view('dashboard.admin.leadContactUsDetail', compact('leads'));
    }
    public function leadContactDelete($id)
    {
        $leads = LeadsContactUs::find($id);
        // dd($leads->toArray());
        $leads->status = 5;
        $leads->save();
        return back();
    }
    public function leadBike()
    {
        $leads = LeadsBike::with('user')->where('status', '!=', 5)->get();
        // dd($leads->toArray());
        return view('dashboard.admin.leadBike', compact('leads'));
    }
    public function leadBikeDetail($id)
    {
        $leads = LeadsBike::with('user', 'bike')->find($id);
        // dd($leads->toArray());
        return view('dashboard.admin.leadBikeDetail', compact('leads'));
    }
    public function leadBikeDelete($id)
    {
        $leads = LeadsBike::find($id);
        // dd($leads->toArray());
        $leads->status = 5;
        $leads->save();
        return back();
    }
    // Bike Brands
    public function indexBrands()
    {
        $brand = Brands::get();
        return view('dashboard.admin.bikeBrands', compact('brand'));
    }
    public function addBrands()
    {
        return view('dashboard.admin.bikeBrandsAdd');
    }
    public function storeBrands(Request $request)
    {
        // dd($request->toArray());
        $valid = $this->validate($request, [
           'name' => 'required|string|unique:bike_brands,name',
       ]);
	   
	   $slug     = Str::slug($request->name);

        try{
            DB::beginTransaction();

        $brand = new Brands;
        $brand->name        = $request->name;
        $brand->shortname   = $request->shortname;
        $brand->active      = $request->active;
        $brand->featured    = $request->featured;
        $brand->slug        = $slug;
        if ($request->hasFile('image')) 
        {
            $img = $request->image;
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension      = $img->extension();
            $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
            $filenamepath   = 'bikeBrand'.'/'.'img/'.$filenamenew;
            $filename       = $img->move(public_path('storage/bikeBrand'.'/'.'img'),$filenamenew);
            $brand->image   = $filenamepath;
        }
        $brand->save();

        DB::commit();
        return redirect()->route('admin.brands')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    public function editBrands($id)
    {
        // dd($id);
        $brand = Brands::where('id', $id)->first();
        return view('dashboard.admin.bikeBrandsEdit', compact('brand'));
    }
    public function updateBrands(Request $request)
    {
        try{
        DB::beginTransaction();
        $brand = Brands::where('id', $request->brand_id)->first();
        if ($request->has('name')) 
        {
            $brand->name       = $request->name;
        }
        if ($request->has('shortname')) 
        {
            $brand->shortname  = $request->shortname;
        }
        if ($request->has('active')) 
        {
            $brand->active     = $request->active;
        }
        if ($request->has('featured')) 
        {
            $brand->featured   = $request->featured;
        }
        // dd($brand->toArray());
        if ($request->hasFile('image')) 
        {
            $img = $request->image;
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension      = $img->extension();
            $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
            $filenamepath   = 'bikeBrand'.'/'.'img/'.$filenamenew;
            $filename       = $img->move(public_path('storage/bikeBrand'.'/'.'img'),$filenamenew);
            $brand->image  = $filenamepath;
        }
        $brand->save();

        DB::commit();
        return redirect()->route('admin.brands')->with('success', 'Updated Successfully!');
    }
    catch (\Throwable $e) 
    {
        DB::rollback();

        return back()->with('error', $e->getMessage());
    }
    return back()->with('error', 'Error in Store!');
}
    // Subscribers
    public function indexSubscribers()
    {
        $subs = Subscribe::get();
        // dd($subs->toArray());
        return view('dashboard.admin.subscribers.index', compact('subs'));
    }
    // FAQs
    public function indexFAQs()
    {
        $faqs = FAQs::get();
        // dd('ok');
        return view('dashboard.admin.faqs.index', compact('faqs'));
    }
    public function addFAQs()
    {
        return view('dashboard.admin.faqs.create');
    }
    public function storeFAQs(Request $request)
    {
        try{
        DB::beginTransaction();
        // dd($request->toArray());
            $faqs = new FAQs;
            $faqs->question = $request->question;
            $faqs->answer   = $request->answer;
            $faqs->status   = $request->status;
            $faqs->save();

            DB::commit();
            return redirect()->route('admin.faqs')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    public function editFAQs($id)
    {
        $faqs = FAQs::where('id', $id)->first();
        return view('dashboard.admin.faqs.edit', compact('faqs'));
    }
    public function updateFAQs(Request $request)
    {
        // dd($request->question);
        $faqs = FAQs::where('id', $request->faq_id)->first();
        try{
        DB::beginTransaction();

        if($request->has('question'))
        {
            $faqs->question = $request->question;
        }
        if($request->has('answer'))
        {
            $faqs->answer = $request->answer;
        }
        $faqs->status   = $request->status;
        $faqs->save();
        // return redirect()->route('admin.faqs');

            DB::commit();
            return redirect()->route('admin.faqs')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    // How it works
    public function indexHowitworks()
    {
        $how = HowItWorks::get();
        // dd('ok');
        return view('dashboard.admin.howItWorks.index', compact('how'));
    }
    public function addHowitworks()
    {
        return view('dashboard.admin.howItWorks.create');
    }
    public function storeHowitworks(Request $request)
    {
        try{
        DB::beginTransaction();
        // dd($request->toArray());
            $how = new HowItWorks;
            $how->question = $request->question;
            $how->answer   = $request->answer;
            $how->status   = $request->status;
            $how->save();

            DB::commit();
            return redirect()->route('admin.how')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    public function editHowitworks($id)
    {
        $how = HowItWorks::where('id', $id)->first();
        return view('dashboard.admin.howItWorks.edit', compact('how'));
    }
    public function updateHowitworks(Request $request)
    {
        // dd($request->question);
        $how = HowItWorks::where('id', $request->faq_id)->first();
        if($request->has('question'))
        {
            $how->question = $request->question;
        }
        if($request->has('answer'))
        {
            $how->answer = $request->answer;
        }
        $how->status   = $request->status;
        $how->save();
        return redirect()->route('admin.how');
    }
    // Testimonials
    public function indexTestimonials()
    {
        $cust = CustomerTestimonials::get();
        // dd('ok');
        return view('dashboard.admin.testimonials.index', compact('cust'));
    }
    public function addTestimonials()
    {
        return view('dashboard.admin.testimonials.create');
    }
    public function storeTestimonials(Request $request)
    {
        try{
            DB::beginTransaction();
            // dd($request->toArray());
            $cust = new CustomerTestimonials;
            $cust->user_id      = auth()->user()->id;
            $cust->rating       = $request->rating;
            $cust->description  = $request->description;
            $cust->name         = $request->name;
            $cust->title        = $request->title;
            $cust->status       = $request->status;
            if ($request->hasFile('avatar')) 
            {
                $img = $request->avatar;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'testimonials'.'/'.'img/'.$filenamenew;
                $filename       = $img->move(public_path('storage/testimonials'.'/'.'img'),$filenamenew);
                $cust->avatar  = $filenamepath;
            }
            $cust->save();

            DB::commit();
            return redirect()->route('admin.test')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    public function editTestimonials($id)
    {
        $cust = CustomerTestimonials::where('id', $id)->first();
        return view('dashboard.admin.testimonials.edit', compact('cust'));
    }
    public function updateTestimonials(Request $request)
    {
        $cust = CustomerTestimonials::where('id', $request->test_id)->first();
        // dd($cust->toArray());
        if($request->has('rating'))
        {
            $cust->rating = $request->rating;
        }
        if($request->has('description'))
        {
            $cust->description = $request->description;
        }
        if($request->has('name'))
        {
            $cust->name = $request->name;
        }
        if($request->has('title'))
        {
            $cust->title = $request->title;
        }
        if ($request->hasFile('avatar')) 
        {
            $img = $request->avatar;
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension      = $img->extension();
            $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
            $filenamepath   = 'testimonials'.'/'.'img/'.$filenamenew;
            $filename       = $img->move(public_path('storage/testimonials'.'/'.'img'),$filenamenew);
            $cust->avatar  = $filenamepath;
        }
        $cust->status       = $request->status;
        $cust->save();
        return redirect()->route('admin.test');
    }
    // Bike Types
    public function indexType()
    {
        $type = BikeTypes::get();
        // dd('ok');
        return view('dashboard.admin.bikeType.index', compact('type'));
    }
    public function addType()
    {
        return view('dashboard.admin.bikeType.create');
    }
    public function storeType(Request $request)
    {
        try{
            DB::beginTransaction();
            // dd($request->toArray());
            $type = new BikeTypes;
            $type->name         = $request->name;
            $type->status       = $request->status;
            $type->save();

            DB::commit();
            return redirect()->route('admin.type')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    public function editType($id)
    {
        $type = BikeTypes::where('id', $id)->first();
        return view('dashboard.admin.bikeType.edit', compact('type'));
    }
    public function updateType(Request $request)
    {
        $type = BikeTypes::where('id', $request->type_id)->first();
        // dd($type->toArray());
        if($request->has('name'))
        {
            $type->name = $request->name;
        }
        $type->status       = $request->status;
        $type->save();
        return redirect()->route('admin.type');
    }

}
