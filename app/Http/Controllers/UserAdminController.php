<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\UserRequests;
use Illuminate\Support\Str;

use App\Models\User;

use Yajra\DataTables\Facades\DataTables;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users = User::latest()->paginate(15);
        return view('pages.admin.user.index',compact(
            'users'
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
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequests $request)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['image'] = $request->file('image')->store('assets/user', 'public');
        User::create($data);
        return redirect()->route('user.index');
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
        $users = User::findOrFail($id);

        return view('pages.admin.user.edit',[
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequests $request, $id)
    {
        //
        $data = $request->all();

        
        $users = User::findOrFail($id);
        
        if($request->password)
        {
            $data['password'] =  bcrypt($request->password);
        }
        else 
        {
            unset($data['password']);
        }

        $data['image'] = $request->file('image')->store('assets/user', 'public');
        $users->update($data);
        
        return redirect()->route('user.index');
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
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('user.index');
    }
}
