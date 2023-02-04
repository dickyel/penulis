<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;

use App\Models\Category;

use Yajra\DataTables\Facades\DataTables;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $sortOrder = $request->input('sort', 'desc');
        $validSortOrders = ['oldest', 'latest'];
    
        if (!in_array($sortOrder, $validSortOrders)) {
            $sortOrder = 'latest';
        }
    
        $categories = Category::orderBy('created_at', $sortOrder === 'oldest' ? 'asc' : 'desc')
            ->paginate(15);
    
        return view('pages.admin.category.index', [
            'categories' => $categories,
            'sortOrder' => $sortOrder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $data = $request->all();

        $data['slug'] = Str::slug($request->categories_name);

        Category::create($data);
        return redirect()->route('category.index');
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
        $categories = Category::findOrFail($id);

        return view('pages.admin.category.edit',[
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $data = $request->all();

        $data['slug'] = Str::slug($request->categories_name);
        
        $categories = Category::findOrFail($id);
        $categories->update($data);
        
        return redirect()->route('category.index');
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
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect()->route('category.index');
    }
}
