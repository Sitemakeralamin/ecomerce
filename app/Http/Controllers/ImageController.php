<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::where('is_delete',0)->get();
        return view('admin.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
        
        foreach ($request->file('image') as $key => $image) {

            $title = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = '.' . $image->extension();
            $hash_title = time() . '_' . $key . $extension;
            $image->move(public_path('images/upload'), $hash_title);
            $file_path = 'images/upload/' . $hash_title;
            $file_size = humanReadableFilesize(filesize($file_path));
            
            Image::create([
                'title' => $title,
                'hash_title' => $hash_title,
                'created_by' => Auth::user()->id,
                'file_path' => $file_path,
                'file_size' => $file_size,
            ]);

        }
    
        return redirect()->route('image.upload.index')->with('success', 'Image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    $request->validate([
        'title' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    $image = Image::findOrFail($id);
    $image->title = $request->title;
    if (!is_null($image) && $request->hasFile('image')) {
        
        if(!empty($image->file_path) && file_exists(public_path($image->file_path))){
            unlink(public_path($image->file_path));
        }
        
        $extension = $request->image->getClientOriginalExtension();
        $hash_title = time() . '.' . $extension;
        $request->image->move(public_path('images/upload'), $hash_title);
        $image->file_path = 'images/upload/' . $hash_title;
        $image->file_size = humanReadableFilesize(filesize($image->file_path));
        $image->hash_title = $hash_title;
        $image->updated_by = Auth::user()->id;
    }
    $image->save();

    return redirect()->route('image.upload.index')->with('success', 'Image updated successfully.');

}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Image::find($id);
        if (!is_null($res)) {
            if(!empty($res->file_path) && file_exists(public_path($res->file_path))){
                unlink(public_path($res->file_path));
            }
            $res->delete();
            //Alert::toast('Image has been deleted', 'success');
            return redirect()->route('image.upload.index')->with('success', 'Image has been deleted !');
        }
        else {
            session()->flash('error','Something went wrong!');
            return back();
        }
    }
}
