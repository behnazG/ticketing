<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryLanguage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data["categories"] = Category::paginate(10);
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data["category"] = new Category();
        $data["category_list"] = Category::where('valid', 1)->get();
        $data["languages"] = \App\language::all();
        return view('category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   dd($request);
        $data = Category::validate();
        $data["valid"] = isset($request->valid) ? 1 : 0;
        $category = Category::create($data);
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
                    $data_name = ["category_id" => $category->id, "language_id" => $lang->id, "column_name" => "name", "value" => $request->$name_lang];
                    CategoryLanguage::create($data_name);
                }
            }
        }
        /////////////////////////////////////////////////////////////
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [];
        $data["category"] = $category;
        $data["category_list"] = Category::where([['valid', 1], ['id', '<>', $category->id]])->get();
        $langss = \App\language::all();
        $data["languages"] = $langss;
        //////////////////////////////////////
        $names = [];
        if (!$langss->isEmpty()) {
            foreach ($langss as $langs) {
                $nm = "name_" . $langs->short_name;
                $h_n = CategoryLanguage::where('category_id', $category->id)->where('language_id', $langs->id)->where('column_name', 'name')->get();
                if (!$h_n->isEmpty()) {
                    $names[$nm] = $h_n[0]->value;
                }
            }
        }
        $data["names"] = $names;
        //////////////////////////////////
        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = Category::validate($category->id);
        $data["valid"] = isset($request->valid) ? 1 : 0;
        $category->update($data);
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
                    $ll = CategoryLanguage::where("category_id", $category->id)->where("language_id", $lang->id)->where("column_name", "name")->get();
                    $data_name = ["category_id" => $category->id, "language_id" => $lang->id, "column_name" => "name", "value" => $request->$name_lang];
                    if ($ll->isEmpty()) {
                        CategoryLanguage::create($data_name);
                    } else {
                        $ll[0]->update($data_name);
                    }
                }
            }
        }
        //////////////////////////////////////////////////
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }


}
