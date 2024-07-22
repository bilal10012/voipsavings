<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create() {
        return view('admin.slider.create');
    }
    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [ 
            
            'heading' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255|url',
            'featured_image' => 'required|mimes:jpeg,jpg,png|required|max:500000',
            'background_image' => 'required|mimes:jpeg,jpg,png|required|max:500000',

            'description' => 'required',
        ],
        [
            
            'heading.required' => 'Please provide heading text',
            'heading.max' => 'Name can not exceed :max characters',
            'button_text.required' => 'Please provide button text',
            'button_text.max' => 'Button can not exceed :max characters',
            'button_link.required' => 'Please provide button Link',

            'button_text_1.required' => 'Please provide Second button text',
            'button_text_1.max' => 'Second Button can not exceed :max characters',
            'button_link_1.required' => 'Please provide Second button Link',
            
            'background_image.required' => 'Please provide slider Background Image',

            'primary_image.required' => 'Please provide slider Image',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider =  new Slider();
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        $slider->button_text = $request->input('button_text');
        $slider->button_link = ($request->input('button_link')) ? $request->input('button_link') : null;

        $slider->button_text_1 = $request->input('button_text_1');
        $slider->button_link_1 = ($request->input('button_link_1')) ? $request->input('button_link_1') : null;

        $slider->is_active = ($request->is_active == 'checked') ? 1 : 0;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $image = upload($file, 1500, 800, 'slider');
            $slider->primary_image = $image;
        }
        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $image = upload($file, 1500, 800, 'slider-background');
            $slider->background_image = $image;
        }
        $slider->save();
        Session::flash('success',"New Slider Info has Been Added Successfully!");
        return redirect()->route('admin.slider.index');
    }
    public function edit($id)
    {
        $slider = Slider::findorFail($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [ 
            
            'heading' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255|url',
          
            'description' => 'required',
        ],
        [
            
            'heading.required' => 'Please provide heading text',
            'heading.max' => 'Name can not exceed :max characters',
            'button_text.required' => 'Please provide button text',
            'button_text.max' => 'Name can not exceed :max characters',
            'button_link.required' => 'Please provide button Link',

            'button_text_1.required' => 'Please provide Second button text',
            'button_text_1.max' => 'Second Button can not exceed :max characters',
            'button_link_1.required' => 'Please provide Second button Link',
            'button_link_1.url' => 'Please provide Second button Link is invalid',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider->heading = ($request->input('heading') != null)? $request->input('heading'): $slider->heading;
        $slider->description = ($request->input('description') != null)? $request->input('description'): $slider->description;
        $slider->button_text = ($request->input('button_text') != null)? $request->input('button_text'): $slider->button_text;
        $slider->button_link = ($request->input('button_link') != null)? $request->input('button_link'): $slider->button_link;
        $slider->button_text_1 = ($request->input('button_text_1') != null)? $request->input('button_text_1'): $slider->button_text_1;
        $slider->button_link_1 = ($request->input('button_link_1') != null)? $request->input('button_link_1'): $slider->button_link_1;
        $slider->is_active = ($request->is_active == 'checked') ? 1 : 0;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $image = upload($file, 1500, 800, 'slider');
            $slider->primary_image = $image;
        }
        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $image = upload($file, 1500, 800, 'slider');
            $slider->background_image = $image;
        }
        $slider->save();
        Session::flash('success',"Slider Detail has Been Updated Successfully!");
        return redirect()->route('admin.slider.index');
    }
    public function destroy($id) {
        $slider = Slider::findorFail($id);
        $slider->delete();
        Session::flash('success', "Slider deleted Successfully!");
        return redirect()->back();
    }
}