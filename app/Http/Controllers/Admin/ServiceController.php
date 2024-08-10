<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ServiceController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create() {
        return view('admin.service.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
             'description'=>'required',
             'primaryImage' => 'required|mimes:jpeg,jpg,png|required|max:500000',
             'inner_image' => 'required|mimes:jpeg,jpg,png|required|max:500000',
            //  'inner_image' => 'required|mimes:jpeg,jpg,png|required|max:500000',


        ],
        [
            'title.required' => 'Please provide Title ',
            'title.max' => 'title can not have more than :max characters.',
            'description.required'=>'Description Is Required',
            'primaryImage.required' => 'Please provide service Primary Image',
            'primaryImage.mimes' => 'Please provide service Primary Image In jpeg,png,jpg Formats',
            'inner_image.required' => 'Please provide service Detail Image',
            'inner_image.mimes' => 'Please provide service Detail Image In jpeg,png,jpg Formats',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $service =  new Service();
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->is_featured = ($request->input('is_featured') == 'checked') ? 1 : 0;
        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'services');
            $service->primary_image = $image;
        }
        if ($request->hasFile('inner_image')) {
            $file = $request->file('inner_image');
            $image_1 = upload($file, 1280, 426, 'services');
            $service->inner_image = $image_1;
        }

        $service->save();
        Session::flash('success','Service Added Successfully');
        return redirect()->route('admin.service.index');
    }

    public function edit($id)
    {
        $services_detail = Service::findorFail($id);
        return view('admin.service.edit', compact('services_detail'));
    }

    public function update(Request $request, Service $service)
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
            'primaryImage.mimes' => 'Please provide Service Primary Image In jpeg,png,jpg Formats',
            // 'inner_image.mimes' => 'Please provide Service Detail Image In jpeg,png,jpg Formats',

        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $service->title = ($request->input('title') != null)? $request->input('title'): $service->title;
        $service->slug = Str::slug($request->input('title'), '-');
        $service->description = ($request->input('description') != null)? $request->input('description'): $service->description;
        $service->is_active = (isset($request->is_active))? 1: 0;

        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'services');
            $service->primary_image = $image;
        }
        // if ($request->hasFile('inner_image')) {
        //     $file = $request->file('inner_image');
        //     $image = upload($file, 663, 416, 'services-inner');
        //     $service->inner_image = $image;
        // }
        $service->save();
        Session::flash('success', "Service Updated Successfully!");
        return redirect()->route('admin.service.index');
    }
    public function feature($id) {
        $service = Service::findorFail($id);
        $service->is_featured = !$service->is_featured;
        $service->save();
        if($service->is_featured)
            Session::flash('success', "Service is marked as featured successfully!");
        else
            Session::flash('success', "Service is unmarked from featured inventory!");
        return redirect()->back();
    }
    public function destroy($id) {
        $service = Service::findorFail($id);
        $service->delete();
        Session::flash('success','Service Deleted Successfully');
        return redirect()->back();
    }
}
