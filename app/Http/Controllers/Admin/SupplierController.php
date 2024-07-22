<?php



namespace App\Http\Controllers\Admin;



use App\Supplier;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;



class SupplierController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');

    }



    public function index()

    {

        $suppliers = Supplier::all();

        return view('admin.supplier.index', compact('suppliers'));

    }



    public function create() {

        return view('admin.supplier.create');

    }



    public function store(Request $request) {

        $supplier =  new Supplier();

        $supplier->name = $request->input('name');

        $supplier->designation = $request->input('designation');

        $supplier->is_active = (isset($request->is_active))? 1: 0;
        if ($request->hasFile('primaryImage')) {

            $file = $request->file('primaryImage');

            $image = upload($file, 1280, 426, 'supplier');

            $supplier->primary_image = $image;

        }
        else{
            Session::flash('error', 'Please Provide An Image!');
            return redirect()->back();
        }

        $supplier->save();

        Session::flash('success', 'New Supplier Has Been Added Successfully!');

        return redirect()->route('admin.supplier.index');

    }



    public function edit($id)

    {

        $supplier = Supplier::findorFail($id);

        return view('admin.supplier.edit', compact('supplier'));

    }



    public function update(Request $request,  $id)
    {
        $supplier = Supplier::findorFail($id);
        $supplier->name = ($request->input('name') != null)? $request->input('name'): $supplier->name;
        $supplier->designation = ($request->input('designation') != null)? $request->input('designation'): $supplier->designation;
        $supplier->is_active = (isset($request->is_active))? 1: 0;
        if ($request->hasFile('primaryImage')) {
            $file = $request->file('primaryImage');
            $image = upload($file, 1280, 426, 'supplier');
            $supplier->primary_image = $image;
            }
        $supplier->save();
        Session::flash('success', 'Supplier Details Has Been Updated Successfully!');
        return redirect()->route('admin.supplier.index');
    }



    public function destroy($id) {
        Supplier::destroy($id);
        Session::flash('success', 'Supplier Has Been Deleted Successfully!');
        return redirect()->route('admin.supplier.index');
    }

}

