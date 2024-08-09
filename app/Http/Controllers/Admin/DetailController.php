<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $detail = Detail::all();
        return view('admin.detail.index', compact('detail'));
    }

    public function create() {
        return view('admin.detail.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'business' => 'required|integer',
            'experience' => 'required|integer',
            'shipments' => 'required|integer',
        ],
        [
            // 'title.required' => 'Please provide Title ',
            'title.max' => 'title can not have more than :max characters.',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $detail =  new Detail();
        $detail->busines = $request->input('business');
        $detail->experience = $request->input('experience');
        $detail->shipments = $request->input('shipments');
        $detail->save();
        Session::flash('success','Detail Added Successfully');
        return redirect()->route('admin.detail.index');
    }

    public function edit($id)
    {
        $section_details = Detail::findorFail($id);
        return view('admin.detail.edit', compact('section_details'));
    }

    public function update(Request $request, Detail $detail)
    {
        $validator = Validator::make($request->all(), [
            'business' => 'required|integer',
            'experience' => 'required|integer',
            'shipments' => 'required|integer',
        ],
        [
            'title.required' => 'Please provide Title ',
            // 'title.max' => 'title can not have more than :max characters.',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $detail->title = ($request->input('title') != null)? $request->input('title'): $detail->title;
        // if ($request->hasFile('inner_image')) {
        //     $file = $request->file('inner_image');
        //     $image = upload($file, 663, 416, 'services-inner');
        //     $service->inner_image = $image;
        // }
        $detail->save();
        Session::flash('success', "Detail Updated Successfully!");
        return redirect()->route('admin.detail.index');
    }
    public function destroy($id) {
        $detail = Detail::findorFail($id);
        $detail->delete();
        Session::flash('success','Detail Deleted Successfully');
        return redirect()->back();
    }
}
