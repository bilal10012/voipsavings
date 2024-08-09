<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $gallery_images = Gallery::all();
        return view('admin.gallery.index', compact('gallery_images'));
    }
    public function create() {
        return view('admin.gallery.create');
    }
    public function store(Request $request) {
        $slider = new Gallery();

        // Handle image upload
        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'gallery_images');
            $slider->primary_image = $image;
        } else {
            Session::flash('error', 'Please Select an Image');
            return redirect()->back();
        }

        // Save the title of the image if provided
        if ($request->has('imageTitle')) {
            $slider->title = $request->input('imageTitle');
        }

        // Save the state of the art section option
        $slider->state_of_the_art = $request->input('stateOfTheArt') ? 1 : 0;

        // Save the record to the database
        $slider->save();

        // Flash success message and redirect
        Session::flash('success', 'New Image Has Been Added To The Gallery!');
        return redirect()->route('admin.gallery.index');
    }

    public function edit($id)
    {
        $image = Gallery::findorFail($id);
        return view('admin.gallery.edit', compact('image'));
    }
    public function update(Request $request, Gallery $gallery)
{
    // Validate the request (add rules as needed)
    $request->validate([
        'imageTitle' => 'nullable|string|max:255',
        'stateOfTheArt' => 'nullable|boolean',
    ]);

    // Update the title of the image if provided
    if ($request->has('imageTitle')) {
        $gallery->title = $request->input('imageTitle');
    }

    // Update the state of the art section option
    // Checkbox value is only sent if checked; otherwise, it will be null
    $gallery->state_of_the_art = $request->has('stateOfTheArt') ? 1 : 0;

    // Save the updated record to the database
    $gallery->save();

    // Flash success message and redirect
    Session::flash('success', 'Gallery Image Has Been Updated Successfully!');
    return redirect()->route('admin.gallery.index');
}


    public function uploadGallery(Request $request,Gallery $gallery ,$id) {
        if ($request->hasFile('primary_image')) {
            $file = $request->file('primary_image');
            $image = upload($file, 1420, 720, 'primary_image');
            $gallery_image = Gallery::findorFail($id);
            Storage::delete($gallery_image->primary_image);
            $gallery_image->primary_image = $image;
            $gallery_image->save();
            return response()->json(['success' => $image]);
        }
    }

    public function destroy($id) {
        $gallery = Gallery::findorFail( $id );
        $gallery->delete();
        Session::flash('success', "Gallery Image Has Been deleted Successfully!");
        return redirect()->back();
    }




}
