<?php

namespace App\Http\Controllers\Admin;

use App\faq;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Session;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $faqs = faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create() {
        return view('admin.faq.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ],
        [ 
            'question.required' => 'Please provide Title ',  
            'question.max' => 'title can not have more than :max characters.',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $faq =  new faq();
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();
        Session::flash('success','faq Added Successfully');
        return redirect()->route('admin.faq.index');
    }

    public function edit($id)
    {
        $faq_detail = faq::findorFail($id);
        return view('admin.faq.edit', compact('faq_detail'));
    }

    public function update(Request $request, faq $faq)
    {
        $validator = Validator::make($request->all(), [ 
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ],
        [ 
            'question.required' => 'Please provide Title ',  
            'question.max' => 'title can not have more than :max characters.',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $faq->question = ($request->input('question') != null)? $request->input('question'): $faq->question;
        $faq->answer = ($request->input('answer') != null)? $request->input('answer'): $faq->answer;
        // if ($request->hasFile('inner_image')) {
        //     $file = $request->file('inner_image');
        //     $image = upload($file, 663, 416, 'services-inner');
        //     $service->inner_image = $image;
        // }
        $faq->save();
        Session::flash('success', "faq Updated Successfully!");
        return redirect()->route('admin.faq.index');
    }
    public function destroy($id) {
        $faq = faq::findorFail($id);
        $faq->delete();
        Session::flash('success','faq Deleted Successfully');
        return redirect()->back();
    }
}
