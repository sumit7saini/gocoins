<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendors = Vendor::select()->get();
        return view('vendor.index', ['vendors' => $vendors]);
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendorName'=>'required',
            'vendorLogo'=>'required',
            'vendorDescription'=>'required',
            'vendorEmail'=>'required'
        ]);

        $vendor = new Vendor([
            'vendorName' => $request->get('vendorName'),
            'vendorLogo' => $request->get('vendorLogo'),
            'vendorDescription' => $request->get('vendorDescription'),
            'vendorEmail' => $request->get('vendorEmail')
        ]);
        $vendor->save();
        return redirect('/vendors')->with('success', 'Vendor saved!');
        // $vendors = Vendor::select()->get();
        // return view('vendor.index', ['vendors' => $vendors]);
    }

    public function edit(Request $request, $id)
    {
        $vendor = Vendor::where('vendorId', $id)->get();
        return view('vendor.edit', ['vendor' => $vendor]);        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vendorName'=>'required',
            'vendorLogo'=>'required',
            'vendorDescription'=>'required',
            'vendorEmail'=>'required'
        ]);

        $contact = Vendor::where('vendorId', $id)->update([
            'vendorName' => $request->vendorName,
            'vendorLogo' => $request->vendorLogo,
            'vendorDescription' => $request->vendorDescription,
            'vendorEmail' => $request->vendorEmail,
        ]);

        return redirect('/vendors')->with('success', 'Vendor updated!');
    }

    public function destroy(Request $request, $id)
    {
        $vendor = Vendor::where('vendorId', $id)->delete();

        return redirect('/vendors')->with('success', 'Vendor deleted!');
    }

}
