<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Content;
class DashboardAdminController extends Controller
{
    //

    public function index(Request $request)
    {
        $categories = Category::get();
        
        $contents = Content::when(request()->keyword, function($contents) {
            $contents = $contents->where('title', 'like', "%". request()->keyword . '%');
            
        })->with('category')->latest()->paginate(15);
        
        return view('pages.admin.dashboard',[
            'categories' => $categories,
            'contents' => $contents
        ]);
    }
}
