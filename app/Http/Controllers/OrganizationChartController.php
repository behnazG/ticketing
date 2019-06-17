<?php

namespace App\Http\Controllers;

use App\OrganizationChart;
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
        $data=OrganizationChart::validate();
        $data['valid']=isset($request->valid)?1:0;
        $organizationChart=OrganizationChart::create($data);
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
        $data=[];
        $data["organizationChart"]=$organizationChart;
        $data["organizationChart_list"] = OrganizationChart::where('valid', 1)->get();
        return view('organizationChart.edit',$data);
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
        $data=OrganizationChart::validate();
        $data["valid"]=isset($request->valid)?1:0;
        $organizationChart->update($data);
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
