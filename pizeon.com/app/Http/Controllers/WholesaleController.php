<?php

namespace App\Http\Controllers;

use App\Models\Wholesale;
use Illuminate\Http\Request;
use Alert;
use Auth;
use GrahamCampbell\ResultType\Success;

class WholesaleController extends Controller
{
    
    public function wholesaleQuery(){

        if (Auth::user()->type == 1) {
            $orders = Wholesale::orderBy('id', 'DESC')->get();
            // dd($orders);
            return view('admin.wholesale.index', compact('orders'));
        }

        else{
            //Alert::toast('Access Denied !', 'error');
            return back()->with('error', 'Access Denied !');
        }
    }

    public function wholesaleEdit($id){
        // dd($id);
        $wholesale = Wholesale::find($id);
        return view('admin.wholesale.edit', compact('wholesale'));
    }

    public function change_wholesale_status(Request $request, $id){
     
        $wholesale = Wholesale::find($id);
        $wholesale->status = $request->status;
        $wholesale->update();
        //Alert::toast('Status updated successfully !', 'success');
        return back()->with('success', 'Status updated successfully !');

    }

    public function index()
    {
        return view("wholesale.index");
    }
    public function store(Request $request)
    {
        //  return ($request)->all();
        $wholesale = new Wholesale;
        $wholesale->name = $request->name;
        $wholesale->phone = $request->phone;
        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $img = time() . rand() . '.' . $image->getClientOriginalExtension();
        //     $location = public_path('images/product/' . $img);
        //     Image::make($image)->save($location);
        //     $wholesale->image = $img;
        // }
        if ($request->image) {
            $file = $request->file('image');
            $filename = time() . rand() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/product/');
            $file->move($path, $filename);
            $wholesale->image = $filename;
        }

        $wholesale->save();
        //Alert::toast('Submition success');
        // Alert::toast('Payment Saved');

        // return back();
        return redirect()->route('index')->with('success', 'Submition success');

    }
        public function view(){
            $products=Wholesale::all();
            return view("admin.wholesale.all",compact('products'));
        }
public function destroy($id){
    if (Auth::user()->type == 1) {
        $order = Wholesale::find($id);
        if (!is_null($order)) {
                $order->delete();
            //Alert::toast('Order deleted successfully!', 'success');
            return back()->with('success', 'Order deleted successfully!');
        }
        else{
            //Alert::toast('Something went wrong !', 'error');
            return back()->with('error', 'Something went wrong !');
        }
    }
    else{
        //Alert::toast('Access Denied !', 'error');
        return back()->with('error', 'Access Denied !');
    }
}
}
