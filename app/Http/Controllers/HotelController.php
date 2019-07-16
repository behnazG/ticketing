<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use App\HotelLanguage;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data["hotels"] = Hotel::paginate(10);
        return view('hotel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data["hotel"] = new Hotel();
        $data["provinces"] = Province::all();
        $data["cities"] = City::all();
        $data["languages"] = \App\language::all();
        return view('hotel.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Hotel::validate();
        $data["valid"] = isset($request->valid) ? 1 : 0;
        $hotel = Hotel::create($data);
        ///////////////////////////////////////////////////////////
        $langs = \App\language::all();
        foreach ($langs as $lang) {
            $address_lang = "address_" . $lang->short_name;
            $name_lang = "name_" . $lang->short_name;
            if (isset($request->$name_lang)) {
                $data = [];
                $data = $request->validate(
                    [
                        $name_lang => "nullable|string",
                        $address_lang => "nullable|string"
                    ]
                );
                if ($request->$name_lang != "") {
                    $data_name = ["hotel_id" => $hotel->id, "language_id" => $lang->id, "column_name" => "name", "value" => $request->$name_lang];
                    HotelLanguage::create($data_name);
                }
                if ($request->$address_lang != "") {
                    $data_address = ["hotel_id" => $hotel->id, "language_id" => $lang->id, "column_name" => "address", "value" => $request->$address_lang];
                    HotelLanguage::create($data_address);
                }
            }
        }
        ///////////////////////////////////////////////////////////
        return redirect('hotels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $data = [];
        $data["hotel"] = $hotel;
        $data["provinces"] = Province::all();
        $data["cities"] = City::all();
        $langss = \App\language::all();
        $data["languages"] = $langss;
        //////////////////////////////////////
        $names = [];
        $address = [];
        if (!$langss->isEmpty()) {
            foreach ($langss as $langs) {
                $nm = "name_" . $langs->short_name;
                $ad = "address_" . $langs->short_name;
                $h_n = HotelLanguage::where('hotel_id', $hotel->id)->where('language_id', $langs->id)->where('column_name', 'name')->get();
                $h_l = HotelLanguage::where('hotel_id', $hotel->id)->where('language_id', $langs->id)->where('column_name', 'address')->get();
                if (!$h_n->isEmpty()) {
                    $names[$nm] = $h_n[0]->value;
                }
                if (!$h_l->isEmpty()) {
                    $address[$ad] = $h_l[0]->value;
                }
            }
        }
        $data["names"] = $names;
        $data["address"] = $address;
        //////////////////////////////////
        return view('hotel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $data = Hotel::validate($hotel->id);
        $data["valid"] = isset($request->valid) ? 1 : 0;
        $hotel->update($data);
        /////////////////////////////////////////////////////
        $langs = \App\language::all();
        foreach ($langs as $lang) {
            $address_lang = "address_" . $lang->short_name;
            $name_lang = "name_" . $lang->short_name;
            if (isset($request->$name_lang)) {
                $data = [];
                $data = $request->validate(
                    [
                        $name_lang => "nullable|string",
                        $address_lang => "nullable|string"
                    ]
                );
                if ($request->$name_lang != "") {
                    $ll = HotelLanguage::where("hotel_id", $hotel->id)->where("language_id", $lang->id)->where("column_name", "name")->get();
                    $data_name = ["hotel_id" => $hotel->id, "language_id" => $lang->id, "column_name" => "name", "value" => $request->$name_lang];
                    if ($ll->isEmpty()) {
                        HotelLanguage::create($data_name);
                    } else {
                        $ll[0]->update($data_name);
                    }
                }
                if ($request->$address_lang != "") {
                    $ll = HotelLanguage::where("hotel_id", $hotel->id)->where("language_id", $lang->id)->where("column_name", "address")->get();
                    $data_address = ["hotel_id" => $hotel->id, "language_id" => $lang->id, "column_name" => "address", "value" => $request->$address_lang];
                    if ($ll->isEmpty()) {
                        HotelLanguage::create($data_address);
                    } else {
                        $ll[0]->update($data_address);
                    }
                }
            }
        }
        //////////////////////////////////////////////////
        return redirect('hotels');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
    }


}
