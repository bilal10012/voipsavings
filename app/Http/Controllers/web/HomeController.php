<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\UserNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\validateCaptcha;
use Illuminate\Support\Facades\Session;
use App\Content;
use App\Banner;
use App\Product;
use App\Gallery;
use App\Supplier;
use App\Pricing;
use App\Testimonial;
use App\Fulfilment;
use App\CouponCode;

use App\NewsLetter;
use App\Service;
use App\Inquiry;
use App\FreeInquiry;
use App\Work;
use App\faq;
use App\Slider;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Stripe;
use Illuminate\Support\Facades\Mail;

// use Artisan;

class HomeController extends Controller

{
    public function index(Request $request,$column='id',$direction="asc")
    {
        $banner    = Banner::where("page","Index Page")->first();
        $our_work      = Work::get();

        $experience  = Content::where('page','Home Page')->where('section','experience_section')->first();
        $about  = Content::where('page','Home Page')->where('section','ABOUT US')->first();
        $services_content	  = Content::where('page','Home Page')->where('section','Services')->first();
        $materials  = Content::where('page','Home Page')->where('section','Materials & Workmanship')->first();
        $services      = Service::where('is_active',1)->where('is_featured',1)->get();
        $why_choose_us  = Content::where('page','Home Page')->where('section','Why Choose Us')->first();
        $free_estimate  = Content::where('page','Home Page')->where('section','Free Estimate')->first();
        $work  = Content::where('page','Home Page')->where('section','Work We Have Done')->first();
        $fulfilment= Fulfilment::all();
        $section3  = Content::where('page','Home Page')->where('section','section3')->first();
        $delivery  = Content::where('page','Home Page')->where('section','delivery')->first();
        $exp = Content::where('page','Home Page')->where('section','Years Of Experience')->first();
        $revenue = Content::where('page','Home Page')->where('section','topline Revenues')->first();
        $employees = Content::where('page','Home Page')->where('section','Employees')->first();
        $about = Content::where('page','Home Page')->where('section','About Us')->first();
        $distic_offer = Content::where('page','Home Page')->where('section','Distinctive Offering')->first();
        $simplified_tech = Content::where('page','Home Page')->where('section','Simplified Tech')->first();
        $unlimited_exp = Content::where('page','Home Page')->where('section','Unlimited Experience')->first();
        $why_section=Content::where('page','Home Page')->where('section','Why Spectrum VoIP')->first();
        $stratus_portal=Content::where('page','Home Page')->where('section','Stratus Portal')->first();
        $keyfeatures  = Content::where('page','Home Page')->where('section','Key Features')->first(); //keyfeatures
        $flyover  = Content::where('page','Home Page')->where('section','LTE Failover')->first(); //keyfeatures
        $slider_1= Gallery::where('state_of_the_art',0)->get();
        $slider_2= Gallery::where('state_of_the_art',1)->get();
        $testimonial= Testimonial::all();

        $faq  = faq::get();






        $section3  = Content::where('page','Home Page')->where('section','section3')->first();

            return view('front.index',compact('testimonial','about', 'employees','revenue','exp',
            'materials','services','services_content','our_work','work','banner','about',
            'distic_offer','simplified_tech','unlimited_exp','why_section','stratus_portal', 'keyfeatures','flyover',
            'why_choose_us','free_estimate','faq','fulfilment','experience','section3','delivery','slider_1','slider_2'

        ));


    }


    public function customer(Request $request,$column='id',$direction="asc")
    {
        $banner    = Banner::take(3)->get();


        $testimonial=Testimonial::all();



            return view('front.customer',compact('banner','testimonial'));


    }



    public function gallery(){
        $banner    = Banner::where('page','GALLERY')->first();

        $galleryItems  = Gallery::get();

        return view('front.gallery',compact('galleryItems','banner'));
    }
    public function service()
    {

        $banner= Banner::where('page','Services Page')->first();
        $services= Service::where('is_featured',1)->get();



       return view('front.service',compact('banner','services'));
    }
    public function ShowService($slug)
{
    $banner= Banner::where('page','Services Page')->first();
    $service_detail = Service::where('slug', $slug)->firstOrFail();
    return view('front.service-detail', compact('service_detail','banner'));
}

    public function pricing()
    {

        $banner= Banner::where('page','Services Page')->first();
        $pricing=Pricing::all();
        // dd($fulfilment);
       return view('front.pricing',compact('banner','pricing'));
    }

    public function supplier()
    {
        $suuplier_content  = Content::where('page','Suppliers Page')->where('section','Suppliers')->first();

        $banner= Banner::where('page','Suppliers Page')->first();
        $suppliers= Supplier::where('is_active',1)->get();
        return view('front.supplier',compact('banner','suuplier_content','suppliers'));
    }
    public function generateCode(Request $request)
    {

        if ($request->method() == 'POST') {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email|regex:(^[a-z0-9]+@[a-z]+\.[a-z]{2,3})',


            ],
            [
                'name.required' => 'Please provide your first name',
                'name.max' => 'First name can not exceed :max characters',
                'name.regex' => 'Name can only contain alphabets',
                'email.required' => 'Please provide an Email',
                'email.email' => 'Email format is not correct',
                'email.regex'=>'Email format should be complete.',
            ]);

            if ($validator->fails()){
                Session::flash('error', $validator->errors()->first());
                return redirect()->back()->withErrors($validator )->withInput();
            }

        $data = [
            'first_name' => $request->input('name'),
            'email' => $request->input('email'),
            'type' => $request->input('type'),
            'code' => $request->input('code'),
        ];
        // Save the data to the database
        if (CouponCode::where('code',$data['code'])->exists()) {
            do{
                $code = mt_rand(100000, 999999);
                $data['code'] = $code;
                $dd = new CouponCode;
                $dd->email = $data['email'];
                $dd->type  = $data['type'];
                $dd->first_name  = $data['first_name'];
                $dd->code  = $data['code'];
                $dd->save();
                $admin = User::where('role', 0)->first();
                \Notification::send($admin, new UserNotification($dd));
                Session::flash('message', 'Form Submit Successfully!');

                return redirect()->back();
            }
            while (CouponCode::where('code','!=',$data['code'])->first());


        }else{
            $dd = new CouponCode;
            $dd->email = $data['email'];
            $dd->type  = $data['type'];
            $dd->first_name  = $data['first_name'];
            $dd->code  = $data['code'];
            $dd->save();
            $admin = User::where('role', 0)->first();
            \Notification::send($admin, new UserNotification($dd));
            Session::flash('message', 'Form Submit Successfully!');
            return redirect()->back();
        }

    }
}

    public function generateRandomCode()
    {
        // Replace this with your code generation logic

        do{
            $code = mt_rand(100000, 999999);
            return  response()->json(["code"=>$code,"status"=>"success"]);
        }
        while (CouponCode::where('code','!=',$code)->first());

    }
    public function contactUsPage(Request $request){
        if ($request->method() == 'POST') {

            $validator = Validator::make($request->all(), [
                'inquiry_first_name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'inquiry_last_name' => 'string|max:255|regex:/^[\pL\s\-]+$/u',
                // 'subject'=> 'required|max:255',
                'inquiry_email' => 'required|email|regex:(^[a-z0-9]+@[a-z]+\.[a-z]{2,3})',
                'message'=> 'required|max:1000',
                // 'primaryImage' => [ 'mimes:jpeg,png,jpg,gif','max:2048'],
            ],
            [
                'inquiry_first_name.required' => '* Please provide your  name',
                'inquiry_first_name.max' => ' name can not exceed :max characters',
                'inquiry_first_name.regex' => 'Name can only contain alphabets',

                'inquiry_last_name.required' => '* Please provide your last name',
                'inquiry_last_name.max' => 'last name can not exceed :max characters',
                'inquiry_last_name.regex' => 'last name can only contain alphabets',

                'inquiry_email.required' => '* Please provide an Email',
                'inquiry_email.email' => 'Email format is not correct',
                'inquiry_email.regex'=>' Email format should be complete.',
                'message.required' => '* Please Provide message',
                ]);
            if ($validator->fails()) {
                // If it's an AJAX request, return JSON response
                if ($request->ajax()) {
                    return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
                }
                // If it's a regular form submission, redirect back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $inquiry = new Inquiry();
            $inquiry->first_name = $request->inquiry_first_name;
            $inquiry->last_name = $request->inquiry_last_name;
            $inquiry->message = $request->message;
            $inquiry->type = $request->type;
            $inquiry->email = $request->inquiry_email;
            if ($request->hasFile('primaryImage')) {
                $file = $request->file('primaryImage');
                $image = upload($file, 100, 100, 'inquiries');
                $inquiry->image = $image;
            }
            $inquiry->save();
            if ($inquiry->save()) {
                $admin = User::where('role', 0)->first();
                \Notification::send($admin, new UserNotification($inquiry));

                return response()->json(['success' => true]);
            }
        }
        $content  = Content::where('page','Contact Us Page')->where('section','Contact')->first();

        $banner = Banner::where('page','Contact Us')->first();


            return view('front.contact-us',compact('banner','content'));


    }
    public function freeInquiry(Request $request){
        if ($request->method() == 'POST') {

            $validator = Validator::make($request->all(), [
                'inquiry_first_name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'inquiry_last_name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'address' => 'required|string|max:255',

                'inquiry_email' => 'required|email',
                'contact'=> 'required|max:55',
                'message'=> 'required|max:255',
            ],
            [
                'inquiry_first_name.required' => '* Please provide your  name',
                'inquiry_first_name.max' => ' name can not exceed :max characters',
                'inquiry_first_name.regex' => 'Name can only contain alphabets',
                'inquiry_email.required' => '* Please provide an Email',
                'inquiry_email.email' => 'Email format is not correct',
                'contact.required' => '* Please Provide Phone Number',
                'message.required' => '* Please Provide message',
                ]);
            if ($validator->fails()) {
                // If it's an AJAX request, return JSON response
                if ($request->ajax()) {
                    return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
                }
                // If it's a regular form submission, redirect back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $inquiry = new FreeInquiry();
            $inquiry->first_name = $request->inquiry_first_name;
            $inquiry->last_name = $request->inquiry_last_name;
            $inquiry->address = $request->address;

            $inquiry->contact = $request->contact;
            $inquiry->type = $request->type;
            $inquiry->message = $request->message;
            $inquiry->email = $request->inquiry_email;

            $inquiry->save();
            if ($inquiry->save()) {
                $admin = User::where('role', 0)->first();
                \Notification::send($admin, new UserNotification($inquiry));

                return response()->json(['success' => true]);
            }
        }
        // $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
        $leave_in = Content::where('page','Contact Us')->where('section','LEAVE YOUR MESSAGE')->first();

        $contact = Content::where('page','Contact Us')->where('section','Contact')->first();
        $banner = Banner::where('page','Contact Us')->first();

        if (Auth::check()) {
            $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);

        }
        else{
            $cartData = \Cart::getContent();

        }
        $lastIndex = '';
        foreach ($cartData as $key => $value) {
            $lastIndex = $value;
        }




        if($lastIndex != null){
        return view('front.contact-us',compact('banner','leave_in','contact','lastIndex','cartData'));
        }else{
            return view('front.contact-us',compact('banner','leave_in','contact'));

        }
    }

    public function  about(){
        $banner        = Banner::where('page','About Us')->first();
        $about      = Content::where('page','About Us')->where('section','About Us')->first();
        $work_content     = Content::where('page','About Us')->where('section','Work We Done')->first();
        $our_work      = Work::get();

        $about_2     = Content::where('page','About Us')->where('section','Material & Workmanship')->first();
        $about_3      = Content::where('page','About Us')->where('section','Why Choose')->first();




            return view('front.about',compact('banner','our_work','work_content','about_2','about_3','about'));


    }
    public function newsletter(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'newsletter_email' => 'required|email|unique:newsletters,newsletter_email|regex:(^[a-z0-9]+@[a-z]+\.[a-z]{2,3})'

        ],
        [
            'newsletter_email.unique' => 'This Email Address is already in our Subscribers List',
            'newsletter_email.required' => 'Enter Your Email Address.',
            'newsletter_email.regex'=>'Invalid Email Address',
        ]);

        if($validator->fails())
            return response()->json(['error' => $validator->errors()->first()]);

        $NewsLetter = new NewsLetter;
        $NewsLetter->newsletter_email = $request->newsletter_email;


        $NewsLetter->save();
        if ($NewsLetter->save()) {
            Cookie::queue('user_first_name', 'John', 10);

            return response()->json(['success' => true,]);

        }
    }

}
