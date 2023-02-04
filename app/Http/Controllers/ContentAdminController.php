<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ContentRequest;
use Illuminate\Support\Str;

use App\Models\Content;
use App\Models\User;
use App\Models\Category;

use Yajra\DataTables\Facades\DataTables;

class ContentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $contents = Content::latest()->paginate(15);
        return view('pages.admin.content.index',compact(
            'contents'
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
        $users = User::all();
        
        $categories = Category::all();
        return view('pages.admin.content.create',[
            
            'categories' => $categories,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        //
        $data = $request->all();

        Content::create($data);
        return redirect()->route('content.index');
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
        $content = Content::with(['category','user'])->findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.content.edit',[
            'categories' => $categories,
            'users' => $users,
            'content' => $content
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        //
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);
        
        $contents = Content::findOrFail($id);
        $contents->update($data);
        
        return redirect()->route('content.index');
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
        $contents = Content::findOrFail($id);
        $contents->delete();

        return redirect()->route('content.index');
    }
}
