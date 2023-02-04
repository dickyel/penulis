<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Content;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = Gallery::latest()->paginate(15);
        return view('pages.admin.galery.index',compact(
            'galleries'
        ))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contents = Content::all();
        return view('pages.admin.galery.create',[
            'contents' => $contents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['photos'] = $request->file('photos')->store('assets/gallery', 'public');
        Gallery::create($data);
        return redirect()->route('galery.index');
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
        
        $galery = Gallery::findOrFail($id);
        $contents = Content::all();
        return view('pages.admin.galery.edit',[
            'galery' => $galery,
            'contents' => $contents
        ]);
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
        //
        $data = $request->all();

        
        $galery = Gallery::findOrFail($id);
        
        
        $data['photos'] = $request->file('photos')->store('assets/gallery', 'public');
        $galery->update($data);
        
        return redirect()->route('galery.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $galery = Gallery::findOrFail($id);
        $galery->delete();

        return redirect()->route('galery.index');
    }
}
