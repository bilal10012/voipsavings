<?php

namespace App\Http\Controllers\Admin;

use App\Integration;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IntegrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = Integration::all();
        return view('admin.integration.index', compact('cities'));
    }

    public function create() {
        return view('admin.integration.create');
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
        $integration =  new Integration();
        $integration->title = $request->input('title');
        $integration->save();
        Session::flash('success','Integration Added Successfully');
        return redirect()->route('admin.integration.index');
    }

    public function edit($id)
    {
        $cities_detail = Integration::findorFail($id);
        return view('admin.integration.edit', compact('cities_detail'));
    }

    public function update(Request $request, Integration $integration)
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
        $integration->title = ($request->input('title') != null)? $request->input('title'): $integration->title;
        // if ($request->hasFile('inner_image')) {
        //     $file = $request->file('inner_image');
        //     $image = upload($file, 663, 416, 'services-inner');
        //     $service->inner_image = $image;
        // }
        $integration->save();
        Session::flash('success', "Integration Updated Successfully!");
        return redirect()->route('admin.integration.index');
    }
    public function destroy($id) {
        $integration = Integration::findorFail($id);
        $integration->delete();
        Session::flash('success','Integration Deleted Successfully');
        return redirect()->back();
    }
}
