<?php

namespace App\Http\Controllers;

use App\OrganizationChart;
use App\OrganizationChartLanguage;
use Illuminate\Http\Request;

class OrganizationChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data["organizationCharts"] = OrganizationChart::paginate(10);
        return view('organizationChart.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $organizationChart = new OrganizationChart();
        $data["organizationChart"] = $organizationChart;
        $data["organizationChart_list"] = OrganizationChart::where('valid', 1)->get();
        $data["languages"] = \App\language::all();
        return view('organizationChart.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = OrganizationChart::validate();
        $data['valid'] = isset($request->valid) ? 1 : 0;
        $organizationChart = OrganizationChart::create($data);
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
                    ]
                );
                if ($request->$name_lang != "") {
                    $data_name = ["organization_chart_id" => $organizationChart->id, "language_id" => $lang->id, "column_name" => "name", "value" => $request->$name_lang];
                    OrganizationChartLanguage::create($data_name);
                }
            }
        }
        /////////////////////////////////////////////////////////////
        return redirect('organizationCharts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrganizationChart $organizationChart
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationChart $organizationChart)
    {
        return 5456;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrganizationChart $organizationChart
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationChart $organizationChart)
    {
        $data = [];
        $data["organizationChart"] = $organizationChart;
        $data["organizationChart_list"] = OrganizationChart::where('valid', 1)->get();
        $langss = \App\language::all();
        $data["languages"] = $langss;
        //////////////////////////////////////
        $names = [];
        if (!$langss->isEmpty()) {
            foreach ($langss as $langs) {
                $nm = "name_" . $langs->short_name;
                $h_n = OrganizationChartLanguage::where('organization_chart_id', $organizationChart->id)->where('language_id', $langs->id)->where('column_name', 'name')->get();
                if (!$h_n->isEmpty()) {
                    $names[$nm] = $h_n[0]->value;
                }
            }
        }
        $data["names"] = $names;
        //////////////////////////////////
        return view('organizationChart.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\OrganizationChart $organizationChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationChart $organizationChart)
    {
        $data = OrganizationChart::validate();
        $data["valid"] = isset($request->valid) ? 1 : 0;
        $organizationChart->update($data);
        /////////////////////////////////////////////////////
        $langs = \App\language::all();
        foreach ($langs as $lang) {
            $name_lang = "name_" . $lang->short_name;
            if (isset($request->$name_lang)) {
                $data = [];
                $data = $request->validate(
                    [
                        $name_lang => "nullable|string",
                    ]
                );
                if ($request->$name_lang != "") {
                    $ll = OrganizationChartLanguage::where("organization_chart_id", $organizationChart->id)->where("language_id", $lang->id)->where("column_name", "name")->get();
                    $data_name = ["organization_chart_id" => $organizationChart->id, "language_id" => $lang->id, "column_name" => "name", "value" => $request->$name_lang];
                    if ($ll->isEmpty()) {
                        OrganizationChartLanguage::create($data_name);
                    } else {
                        $ll[0]->update($data_name);
                    }
                }
            }
        }
        //////////////////////////////////////////////////
        return redirect('organizationCharts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganizationChart $organizationChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationChart $organizationChart)
    {
        $organizationChart->delete();

    }
}
