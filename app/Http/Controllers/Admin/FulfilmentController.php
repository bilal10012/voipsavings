<?php

namespace App\Http\Controllers\Admin;

use App\Fulfilment;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class FulfilmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fulfilment = Fulfilment::all();
        return view('admin.fulfilment.index', compact('fulfilment'));
    }

    public function create() {
        return view('admin.fulfilment.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'title' => 'required|string|max:255',        
             'description'=>'required',
             'primaryImage' => 'required|mimes:jpeg,jpg,png|required|max:500000',
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
        $fulfilment =  new Fulfilment();
        $fulfilment->title = $request->input('title');
        $fulfilment->description = $request->input('description');
        $fulfilment->is_active = ($request->input('is_active') == 'checked') ? 1 : 0;
        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'fulfilment');
            $fulfilment->primary_image = $image;
        }
    
        $fulfilment->save();
        Session::flash('success','Fulfilment Added Successfully');
        return redirect()->route('admin.fulfilment.index');
    }

    public function edit($id)
    {
        $fulfilment_detail = Fulfilment::findorFail($id);
        return view('admin.fulfilment.edit', compact('fulfilment_detail'));
    }

    public function update(Request $request, Fulfilment $fulfilment)
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
            'primaryImage.mimes' => 'Please provide Fulfilment Primary Image In jpeg,png,jpg Formats',
            // 'inner_image.mimes' => 'Please provide Fulfilment Detail Image In jpeg,png,jpg Formats',

        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $fulfilment->title = ($request->input('title') != null)? $request->input('title'): $fulfilment->title;
        $fulfilment->description = ($request->input('description') != null)? $request->input('description'): $fulfilment->description;  
        $fulfilment->is_active = (isset($request->is_active))? 1: 0;

        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'fulfilment$fulfilment');
            $fulfilment->primary_image = $image;
        }
        // if ($request->hasFile('inner_image')) {
        //     $file = $request->file('inner_image');
        //     $image = upload($file, 663, 416, 'fulfilment$fulfilment-inner');
        //     $fulfilment->inner_image = $image;
        // }
        $fulfilment->save();
        Session::flash('success', "Fulfilment Updated Successfully!");
        return redirect()->route('admin.fulfilment.index');
    }
    public function feature($id) {
        $fulfilment = Fulfilment::findorFail($id);
        $fulfilment->is_featured = !$fulfilment->is_featured;
        $fulfilment->save();
        if($fulfilment->is_featured)
            Session::flash('success', "Fulfilment is marked as featured successfully!");
        else
            Session::flash('success', "Fulfilment is unmarked from featured inventory!");
        return redirect()->back();
    }
    public function destroy($id) {
        $fulfilment = Fulfilment::findorFail($id);
        $fulfilment->delete();
        Session::flash('success','Fulfilment Deleted Successfully');
        return redirect()->back();
    }
}
