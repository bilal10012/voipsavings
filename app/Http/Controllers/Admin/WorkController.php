<?php

namespace App\Http\Controllers\Admin;

use App\Work;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $work_images = Work::all();
        return view('admin.work.index', compact('work_images'));
    }
    public function create() {
        return view('admin.work.create');
    }
    public function store(Request $request) {
        $slider =  new Work();
        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'work_images');
            $slider->primary_image = $image;
        }else{
            Session::flash('error','Please Select an Image');
            return redirect()->back();
        }
        $slider->save();
        Session::flash('success','New Image Has Been Added To The Work!');
        return redirect()->route('admin.our-work.index');
    }
    public function edit($id)
    {
        $image = Work::findorFail($id);
        return view('admin.work.edit', compact('image'));
    }
    public function update(Request $request, Work $id)
    {
        // $work_image = Work::where('id',$id)->first();

        // $work_image->save();
        Session::flash('success', 'Work Image Has Been Updated Successfully!');
        return redirect()->route('admin.our-work.index');
    }
    public function uploadWork(Request $request,Work $work_image ,$id) {
        if ($request->hasFile('primary_image')) {
            $file = $request->file('primary_image');
            $image = upload($file, 1420, 720, 'primary_image');
            $work_image = Work::findorFail($id);
            Storage::delete($work_image->primary_image);
            $work_image->primary_image = $image;
            $work_image->save();
            return response()->json(['success' => $image]);
        }
    }

    public function destroy($id) {
        $work = Work::findorFail( $id );
        $work->delete();
        Session::flash('success', "Work Image Has Been deleted Successfully!");
        return redirect()->back();
    }
}
