<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = City::all();
        return view('admin.city.index', compact('cities'));
    }

    public function create() {
        return view('admin.city.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'title' => 'required|string|max:255',
        ],
        [ 
            'title.required' => 'Please provide Title ',  
            'title.max' => 'title can not have more than :max characters.',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $city =  new City();
        $city->title = $request->input('title');
        $city->save();
        Session::flash('success','City Added Successfully');
        return redirect()->route('admin.city.index');
    }

    public function edit($id)
    {
        $cities_detail = City::findorFail($id);
        return view('admin.city.edit', compact('cities_detail'));
    }

    public function update(Request $request, City $city)
    {
        $validator = Validator::make($request->all(), [ 
            'title' => 'required|string|max:255',
        ],
        [ 
            'title.required' => 'Please provide Title ',  
            'title.max' => 'title can not have more than :max characters.',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $city->title = ($request->input('title') != null)? $request->input('title'): $city->title;
        // if ($request->hasFile('inner_image')) {
        //     $file = $request->file('inner_image');
        //     $image = upload($file, 663, 416, 'services-inner');
        //     $service->inner_image = $image;
        // }
        $city->save();
        Session::flash('success', "City Updated Successfully!");
        return redirect()->route('admin.city.index');
    }
    public function destroy($id) {
        $city = City::findorFail($id);
        $city->delete();
        Session::flash('success','City Deleted Successfully');
        return redirect()->back();
    }
}
