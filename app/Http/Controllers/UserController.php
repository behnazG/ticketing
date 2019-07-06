<?php

namespace App\Http\Controllers;

use App\Category;
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
    public function index($is_staff)
    {
        $data = [];
        $data["is_staff"] = $is_staff;
        if ($is_staff === "staffs") {
            $data["users"] = User::where('is_staff', 1)->paginate(10);

        } else {
            $data["users"] = User::where('is_staff', 0)->paginate(10);

        }
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
        $data["hotel_id"] = isset($request->is_staff) ? 0 : $data["hotel_id"];
        $data["organizational_chart_id"] = isset($request->is_staff) ? $data["organizational_chart_id"] : 0;
        $data["password"] = Hash::make($request->password);
        try {
            unset($data["image_path"]);
            $User = User::create($data);
            upload_image($User, 'image_path', 'user_images');
            if ($User->is_staff == 1)
                return redirect('users/staffs');
            else
                return redirect('users/hotels');
        } catch (\Exception $e) {

        }
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
        $data["user_image"] = $User->get_image_url();
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
        $data["hotel_id"] = isset($request->is_staff) ? 0 : $data["hotel_id"];
        $data["organizational_chart_id"] = isset($request->is_staff) ? $data["organizational_chart_id"] : 0;
        $data["is_staff"] = isset($request->is_staff) ? 1 : 0;
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
            upload_image($User, 'image_path', 'user_images');
            if ($User->is_staff == 1)
                return redirect('users/staffs');
            else
                return redirect('users/hotels');
        } catch (\Exception $e) {

        }
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
