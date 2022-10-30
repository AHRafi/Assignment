<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(app());
        $subCategoryList = array('0' => __('Select Subactegory')) + Subcategory::pluck('name','id')->toArray();
        return view('product.productCrud',compact('subCategoryList'));
    }
}
