<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sellers;
use App\Models\Bike;
use App\Models\BikeImages;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Brands;
use App\Models\SellerGallery;
use App\Models\LeadsBike;
use App\Models\BikeTypes;
use Illuminate\Support\Str;
use Session;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;
use App\Mail\BookingCancelMail;

class SellerController extends Controller
{
    public function create()
    {
        // dd(auth()->user()->id);
        $user = User::where('id', auth()->user()->id)->first();
        // dd($user->toArray());
        $name = $user->name;
        $description="";
        $country_code ="";
        $phone ="";
        $avatar ="";
        $address ="";
        $zip_code ="";
        $country = "";
        $state = "";
        $city = "";
        $data['countries'] = Country::orderBy('name')->get(["name","id"]);
        $company_name ="";
        $company_logo ="";
        $seller = Sellers::where('user_id', auth()->user()->id)->first();
        if(isset($seller))
        {
            $state_all = State::where('country_id', $seller->country)->get();
            $city_all = City::where('state_id', $seller->state)->get();
        }
        else{
            $state_all = "";
            $city_all = "";
        }
        
        // dd($seller->toArray());

        if(isset($seller))
        {
            $name           = $seller->name;
            $description    = $seller->description;
            $country_code   = $seller->country_code;
            $phone          = $seller->phone;
            $avatar         = $seller->avatar;
            $address        = $seller->address;
            $zip_code       = $seller->zip_code;
            $state          = $seller->state;
            $city           = $seller->city;
            $company_name   = $seller->company_name;
            $company_logo   = $seller->company_logo;
            $country        = $seller->country;
        }
        // dd($city_all->toArray());
        return view('dashboard.seller.create', compact('city_all', 'state_all', 'data', 'country', 'state', 'city', 'company_logo', 'company_name', 'zip_code', 'address', 'seller', 'name', 'description' ,'country_code' ,'phone', 'avatar'), $data);
    }
    public function getState($id)
    {
        $data['states'] = State::orderBy('name')->where('country_id', $id)
        ->get(['name','id']);
        // dd($data);
        return response()->json($data);
    }
    public function getCity($id)
    {
        $data['cities'] = City::orderBy('name')->where('state_id',$id)
                    ->get(['name','id']);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        try{
        DB::beginTransaction();
        $seller = Sellers::where('user_id', auth()->user()->id)->first();
        // dd($request->toArray());
        if($seller != null)
        {
            // dd($request->toArray());
            $seller->name            = $request->name;
            $seller->description     = $request->description;
            $seller->country_code    = $request->country_code;
            $seller->phone           = $request->phone;
            // $seller->avatar          = $request->avatar;
            $seller->address         = $request->address;
            $seller->country         = $request->country;
            $seller->zip_code        = $request->zip_code;
            $seller->state           = $request->state;
            $seller->city            = $request->city;
            $seller->company_name    = $request->company_name;
            if ($request->hasFile('avatar')) 
            {
                $img = $request->avatar;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'sellerAvater'.'/'.'img/'.$filenamenew;
                $filename       = $img->move(public_path('storage/sellerAvater'.'/'.'img'),$filenamenew);
                $seller->avatar  = $filenamepath;
            }
            if ($request->hasFile('company_logo')) 
            {
                $img = $request->company_logo;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'sellerCompanyLogo'.'/'.'logo/'.$filenamenew;
                $filename       = $img->move(public_path('storage/sellerCompanyLogo'.'/'.'logo'),$filenamenew);
                $seller->company_logo  = $filenamepath;
            }
            $seller->save();
        }
        else
        {
            $seller = new Sellers;
            $seller->user_id         = auth()->user()->id;
            $seller->name            = $request->name;
            $seller->description     = $request->description;
            $seller->country_code    = $request->country_code;
            $seller->phone           = $request->phone;
            $seller->avatar          = $request->avatar;
            $seller->country         = $request->country;
            $seller->address         = $request->address;
            $seller->zip_code        = $request->zip_code;
            $seller->state           = $request->state;
            $seller->city            = $request->city;
            $seller->company_name    = $request->company_name;
            if ($request->hasFile('avatar')) 
            {
                $img = $request->avatar;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'sellerAvater'.'/'.'img/'.$filenamenew;
                $filename       = $img->move(public_path('storage/sellerAvater'.'/'.'img'),$filenamenew);
                $seller->avatar = $filenamepath;
            }
            if ($request->hasFile('company_logo')) 
            {
                $img = $request->company_logo;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'sellerCompanyLogo'.'/'.'logo/'.$filenamenew;
                $filename       = $img->move(public_path('storage/sellerCompanyLogo'.'/'.'logo'),$filenamenew);
                $seller->company_logo  = $filenamepath;
            }
            $seller->save();
        }

        // return redirect()->route('seller.index');
        DB::commit();
            return redirect()->route('seller.index')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $error) 
        {
            DB::rollback();

            return back()->with('error', $error->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    public function myBikes()
    {
        $user = User::with('seller')->where('id', auth()->user()->id)->first();
        if($user->seller != null AND $user->seller->bike)
        {
            $bike = Bike::with('gallery', 'bike_brand')->where('status', '!=', 5)->where('seller_id', auth()->user()->seller->id)->get();
            // dd($bike->toArray());
            // dd($bike[0]->brand->name);
        }
        else
        {
            $bike = [];
        }
        return view('dashboard.seller.myBikes', compact('bike'));
        // dd($bike->toArray());
    }
    public function myBikesAdd()
    {
        $data['countries'] = Country::orderBy('name')->get(["name","id"]);
        // $country_all = Country::get();
        // $states = State::get();
        // $city_all = City::get();
        $brand = Brands::get();
        $type = BikeTypes::get();
        return view('dashboard.seller.addBike', compact('brand', 'type'), $data);
    }
    public function bikeStore(Request $request)
    {
        dd($request->toArray());
        $valid = $this->validate($request, [
           'title' => 'required|string|unique:bike,title',
       ]);
	   
	   $slug     = Str::slug($request->title);
        try{
        DB::beginTransaction();

            $bike = new Bike;
            $bike->seller_id        = auth()->user()->seller->id;
            $bike->mileage          = $request->mileage;
            $bike->brand            = $request->brand;
            $bike->cc               = $request->cc;
            $bike->description      = $request->description;
            $bike->reg_no           = $request->reg_no;
            $bike->type             = $request->type;
            $bike->country          = $request->country;
            $bike->city             = $request->city;
            $bike->state            = $request->state;
            $bike->zipCode          = $request->zipCode;
            $bike->title            = $request->title;
            $bike->mileage_bike     = $request->mileage_bike;
            $bike->pickup_loc       = $request->pickup_loc;
            $bike->slug             = $slug;
            $bike->rentPerDay       = $rentPerDay;
            // if ($request->has('availablity')) 
            // {
            //     $bike->availablity = $request->availablity;
            // }
            // if ($request->has('weight')) 
            // {
            //     $bike->weight = $request->weight;
            // }
            // if ($request->has('seat_height')) 
            // {
            //     $bike->seat_height = $request->seat_height;
            // }
            if ($request->has('lugaggeR')) 
            {
                $bike->lugaggeR = $request->lugaggeR;
            }
            if ($request->has('lugaggeL')) 
            {
                $bike->lugaggeL = $request->lugaggeL;
            }
            if ($request->has('lugaggeT')) 
            {
                $bike->lugaggeT = $request->lugaggeT;
            }
            if ($request->has('hp')) 
            {
                $bike->hp = $request->hp;
            }
            if ($request->hasFile('fea_image')) 
            {
                $img = $request->fea_image;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'bikeFeaImage'.'/'.'img/'.$filenamenew;
                $filename       = $img->move(public_path('storage/bikeFeaImage'.'/'.'img'),$filenamenew);
                $bike->fea_image = $filenamepath;
            }
            if ($request->hasFile('regNoImage')) 
            {
                $img = $request->regNoImage;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'bikeRegImg'.'/'.'img/'.$filenamenew;
                $filename       = $img->move(public_path('storage/bikeRegImg'.'/'.'img'),$filenamenew);
                $bike->regNoImage = $filenamepath;
            }
            $bike->save();
            if($request->hasFile('gallery'))
            {
                foreach($request->gallery as $key => $do)
                {
                    $doc = new BikeImages;
                    $img = $do;
                    $number = rand(1,999);
                    $numb = $number / 7 ;
                    $extension      = $img->extension();
                    $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                    $filenamepath   = 'bikeGallery'.'/'.'doc/'.$filenamenew;
                    $filename       = $img->move(public_path('storage/bikeGallery'.'/'.'doc'),$filenamenew);
                    $doc->image = $filenamenew;
                    $doc->bike_id = $bike->id;
                    $doc->save();
                }
            }

            // return redirect()->route('seller.bikes');
            DB::commit();
                return redirect()->route('seller.bikes')->with('success', 'Updated Successfully!');
            }
            catch (\Throwable $e) 
            {
                DB::rollback();

                return back()->with('error', $e->getMessage());
            }
        return back()->with('error', 'Error in Store!');
    }
    public function myBikesEdit($id)
    {
        $bike = Bike::with('gallery', 'seller')->where('id', $id)->first();
        // dd($bike->toArray());
        $data['countries'] = Country::orderBy('name')->get(["name","id"]);
        $brand = Brands::get();
        $type = BikeTypes::get();
        $state_all = State::where('country_id', $bike->country)->get();
        $city_all = City::where('state_id', $bike->state)->get();
        return view('dashboard.seller.editBike', compact('state_all', 'city_all', 'bike', 'brand', 'type'), $data);
    }
    public function bikeUpdate(Request $request)
    {
        try{
        DB::beginTransaction();

        $bike = Bike::with('gallery')->where('id', $request->bike_id)->first();
        // dd($request->toArray());
        if ($request->has('mileage')) 
        {
            $bike->mileage = $request->mileage;
        }
        if ($request->has('brand')) 
        {
            $bike->brand = $request->brand;
        }
        if ($request->has('cc')) 
        {
            $bike->cc = $request->cc;
        }
        if ($request->has('description')) 
        {
            $bike->description = $request->description;
        }
        if ($request->has('reg_no')) 
        {
            $bike->reg_no = $request->reg_no;
        }
        if ($request->has('type')) 
        {
            $bike->type = $request->type;
        }
        if ($request->has('pickup_loc')) 
        {
            $bike->pickup_loc = $request->pickup_loc;
        }
        if ($request->has('lugaggeR')) 
        {
            $bike->lugaggeR = $request->lugaggeR;
        }
        if ($request->has('lugaggeL')) 
        {
            $bike->lugaggeL = $request->lugaggeL;
        }
        if ($request->has('lugaggeT')) 
        {
            $bike->lugaggeT = $request->lugaggeT;
        }
        if ($request->has('rentPerDay')) 
        {
            $bike->rentPerDay = $request->rentPerDay;
        }
        if ($request->has('hp')) 
        {
            $bike->hp = $request->hp;
        }
        if ($request->has('country')) 
        {
            $bike->country = $request->country;
        }
        if ($request->has('city')) 
        {
            $bike->city = $request->city;
        }
        if ($request->has('state')) 
        {
            $bike->state = $request->state;
        }
        if ($request->has('zipCode')) 
        {
            $bike->zipCode = $request->zipCode;
        }
        if ($request->has('title')) 
        {
            $bike->title = $request->title;
            $bike->slug = Str::slug($request->title);
        }
        if ($request->has('mileage_bike')) 
        {
            $bike->mileage_bike = $request->mileage_bike;
        }
        if ($request->hasFile('fea_image')) 
        {
            $img = $request->fea_image;
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension      = $img->extension();
            $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
            $filenamepath   = 'bikeFeaImage'.'/'.'img/'.$filenamenew;
            $filename       = $img->move(public_path('storage/bikeFeaImage'.'/'.'img'),$filenamenew);
            $bike->fea_image = $filenamepath;
        }
        if ($request->hasFile('regNoImage')) 
        {
            $img = $request->regNoImage;
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension      = $img->extension();
            $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
            $filenamepath   = 'bikeRegImg'.'/'.'img/'.$filenamenew;
            $filename       = $img->move(public_path('storage/bikeRegImg'.'/'.'img'),$filenamenew);
            $bike->regNoImage = $filenamepath;
        }
        if($request->hasFile('gallery'))
        {
            $ga = BikeImages::where('bike_id', $bike->id)->get();
            // dd($ga->toArray());
            // $ga->each->delete();
            foreach($request->gallery as $key => $do)
            {
                $doc = new BikeImages;
                $img = $do;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'bikeGallery'.'/'.'doc/'.$filenamenew;
                $filename       = $img->move(public_path('storage/bikeGallery'.'/'.'doc'),$filenamenew);
                $doc->image = $filenamenew;
                $doc->bike_id = $bike->id;
                $doc->save();
            }
        }
        $bike->save();

        // return redirect()->route('seller.bikes');
        DB::commit();
            return redirect()->route('seller.bikes')->with('success', 'Updated Successfully!');
        }
        catch (\Throwable $e) 
        {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Store!');
    }
    
    public function bikesDelete($id)
    {
        $bike = Bike::find($id);
        // dd($leads->toArray());
        $bike->status = 5;
        $bike->save();
        return back();
    }
    public function bikesBook($id)
    {
        $bike = LeadsBike::find($id);
        // dd($id);
        $stripe = new \Stripe\StripeClient(
            (env('STRIPE_SECRET'))
          );
        // $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = $stripe->refunds->create([
            'charge' => $bike->stripeChargeId,
          ]);
        // dd($stripe->id); stripe refund transaction id
        // $stripe = $stripe->id;
        // dd($stripe);
        $bike->status = 0;
        
        $email = $bike->user->email;
        // dd($email);
        Mail::to($email)->send(new BookingCancelMail($stripe));
        
        $bike->save();
        
        return back();
    }
    public function vendorStatus(Request $request)
    {
        $bike = LeadsBike::where('id', $request->lead_vendor)->first();
        // dd($bike->toArray());
        $bike->vendor_status = $request->vendor_status;
        
        if($request->vendor_status == 'Confirm')
        {
            $bike->status = 1;
        }
        elseif($request->vendor_status == 'Cancel')
        {
            $stripe = new \Stripe\StripeClient(
                (env('STRIPE_SECRET'))
            );
            $stripe = $stripe->refunds->create([
                'charge' => $bike->stripeChargeId,
            ]);
            $email = $bike->user->email;
            // dd($email);
            Mail::to($email)->send(new BookingCancelMail($stripe));
        }
        elseif($request->vendor_status == 'Confirm')
        {
            $bike->status = 2;
        }
        
        $bike->save();
        
        return back();
    }
    public function myGallery(Request $request)
    {
        // dd($request->toArray());
        $galleryAll = SellerGallery::where('seller_id', auth()->user()->seller->id)->get();
        $gallery = SellerGallery::where('seller_id', auth()->user()->seller->id);
        $load_more = "";
        if($request->has('load_more'))
        {
            $load_more = $request->load_more;
            $gallery = $gallery->get();
        }
        else{
            $gallery = $gallery->take(8)->get();
        }
        return view('dashboard.seller.gallery.index', compact('gallery', 'galleryAll', 'load_more'));
    }
    public function myGalleryCreate()
    {
        // $gallery = SellerGallery::get();
        return view('dashboard.seller.gallery.create');
    }
    public function myGalleryStore(Request $request)
    {
        // dd($request->toArray());
        // dd(auth()->user()->seller->id);
        if($request->hasFile('gallery'))
        {
            foreach($request->gallery as $key => $do)
            {
                $doc = new SellerGallery;
                $img = $do;
                $number = rand(1,999);
                $numb = $number / 7 ;
                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                $filenamepath   = 'vendorGallery'.'/'.'images/'.$filenamenew;
                $filename       = $img->move(public_path('storage/vendorGallery'.'/'.'images'),$filenamenew);
                $doc->image = $filenamenew;
                $doc->seller_id = auth()->user()->seller->id;
                $doc->save();
            }
        }
        return redirect()->route('seller.gallery');
    }
    public function myGalleryDestroy($id)
    {
        dd($id);
        $gallery = SellerGallery::find($id);
        return back();
    }
    public function bookings()
    {
        $leads = LeadsBike::where('status', '!=', 5)->with('user', 'bike')->whereHas('bike',function($query){
            $query->where('seller_id', auth()->user()->seller->id);
        })->get();
        // dd($leads->toArray());
        // dd($leads[0]->user->buyer->name);
        return view('dashboard.seller.booking.index', compact('leads'));
    }
    public function bookingsDetail($id)
    {
        $leads = LeadsBike::where('id', $id)->with('user', 'bike')->whereHas('bike',function($query){
            $query->where('seller_id', auth()->user()->seller->id);
        })->first();
        // dd($leads->toArray());
        // dd($leads[1]->bike->seller_id);
        return view('dashboard.seller.booking.details', compact('leads'));
    }
}
