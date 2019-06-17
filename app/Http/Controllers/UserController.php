<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\OrganizationChart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data["users"] = User::paginate(10);
        return view('user.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data["user"] = new User();
        $data["hotels"] = Hotel::where('valid', 1)->get();
        $data["organizationCharts"] = OrganizationChart::where('valid', 1)->get();

        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = User::validate();
        $data["valid"] = isset($request->valid) ? 1 : 0;
        $data["password"] = Hash::make($request->password);
        try
        {
            unset($data["image_path"]);
            $User=User::create($data);
            upload_image($User,'image_path','user_images');
        }catch (\Exception $e)
        {

        }
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        $data = [];
        $data["user"] = $User;
        $data["hotels"] = Hotel::where('valid', 1)->get();
        $data["organizationCharts"] = OrganizationChart::where('valid', 1)->get();
        $data["user_image"]=asset('storage/'.$User->image_path);
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $data = User::validate($User->id);
        $data["valid"] = isset($request->valid) ? 1 : 0;
        //////////////////////////////
        if (!is_null($request->password) && trim($request->password) != "") {
            $data["password"] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        ///////////////////////////////
        try {
            unset($data["image_path"]);
            $User->update($data);
            upload_image($User,'image_path','user_images');
        } catch (\Exception $e) {

        }
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }

}
