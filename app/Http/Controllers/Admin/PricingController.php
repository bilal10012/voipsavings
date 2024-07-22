<?php

namespace App\Http\Controllers\Admin;

use App\Pricing;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class PricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pricing = Pricing::all();
        return view('admin.pricing.index', compact('pricing'));
    }

    public function create() {
        return view('admin.pricing.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'title' => 'required|string|max:255',        
             'description'=>'required',
             'price'=>'required|integer',
            //  'inner_image' => 'required|mimes:jpeg,jpg,png|required|max:500000',


        ],
        [ 
            'title.required' => 'Please provide Title ',  
            'title.max' => 'title can not have more than :max characters.',
            'description.required'=>'Description Is Required',
            'primaryImage.required' => 'Please provide service Primary Image',
            'primaryImage.mimes' => 'Please provide service Primary Image In jpeg,png,jpg Formats',
            // 'inner_image.required' => 'Please provide service Detail Image',
            // 'inner_image.mimes' => 'Please provide service Detail Image In jpeg,png,jpg Formats',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $pricing =  new Pricing();
        $pricing->title = $request->input('title');
        $pricing->description = $request->input('description');
        $pricing->price = $request->input('price');
        $pricing->is_active = ($request->input('is_active') == 'checked') ? 1 : 0;
        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'pricing');
            $pricing->primary_image = $image;
        }
    
        $pricing->save();
        Session::flash('success','pricing Added Successfully');
        return redirect()->route('admin.pricing.index');
    }

    public function edit($id)
    {
        $pricing_detail = Pricing::findorFail($id);
        return view('admin.pricing.edit', compact('pricing_detail'));
    }

    public function update(Request $request, Pricing $pricing)
    {
        $validator = Validator::make($request->all(), [ 
            'title' => 'required|string|max:255',
            'description'=>'required',
            'primaryImage' => 'mimes:jpeg,jpg,png|max:500000',
            // 'inner_image' => 'mimes:jpeg,jpg,png|max:500000',

        ],
        [ 
            'title.required' => 'Please provide Title ',  
            'title.max' => 'title can not have more than :max characters.',
            'description.required'=>'Description Is Required',
            'primaryImage.mimes' => 'Please provide pricing Primary Image In jpeg,png,jpg Formats',
            // 'inner_image.mimes' => 'Please provide pricing Detail Image In jpeg,png,jpg Formats',

        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $pricing->title = ($request->input('title') != null)? $request->input('title'): $pricing->title;
        $pricing->description = ($request->input('description') != null)? $request->input('description'): $pricing->description;  
        $pricing->is_active = (isset($request->is_active))? 1: 0;

        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'pricing');
            $pricing->primary_image = $image;
        }
        // if ($request->hasFile('inner_image')) {
        //     $file = $request->file('inner_image');
        //     $image = upload($file, 663, 416, 'pricing$pricing-inner');
        //     $pricing->inner_image = $image;
        // }
        $pricing->save();
        Session::flash('success', "pricing Updated Successfully!");
        return redirect()->route('admin.pricing.index');
    }

    public function destroy($id) {
        $pricing = Pricing::findorFail($id);
        $pricing->delete();
        Session::flash('success','pricing$pricing Deleted Successfully');
        return redirect()->back();
    }
}
