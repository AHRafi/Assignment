<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use Validator;
use Response;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.productCrud');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productList = Product::all();

        $view = view('product.showProduct', compact('productList'))->render();
        return response()->json(['html' => $view]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // print_r(Auth::user());
        // exit;
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'subcategory_id' => 'required',
            'price' => 'required|integer',
            'thumbnail' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $validator->errors()), 400);
        }

        //file upload
        $file = $request->file('thumbnail');
        if (!empty($file)) {
            $fileName = uniqid() . "_" . Auth::user()->id . "." . $file->getClientOriginalExtension();
            $uploadSuccess = $file->move('public/uploads', $fileName);
        }

        $target = new Product();

        $target->title = $request->title;
        $target->description = $request->description;
        $target->subcategory_id = $request->subcategory_id;
        $target->price = $request->price;
        $target->thumbnail = !empty($fileName) ? $fileName : '';
        $target->created_at = date('Y-m-d H:i:s');
        $target->updated_at = date('Y-m-d H:i:s');
        $target->save();

        $message = "Product Added Successfully";
        return Response::json(['success' => true, 'heading' => 'Success', 'message' => $message], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productInfo = Product::find($id);
        return response()->json(['productInfo' => $productInfo]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|integer',
            'unit' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $validator->errors()), 400);
        }

        $target = Product::find($id);


        $target->name = $request->name;
        $target->price = $request->price;
        $target->unit = $request->unit;
        $target->created_at = date('Y-m-d H:i:s');
        $target->created_by = Auth::user()->id;
        $target->updated_at = date('Y-m-d H:i:s');
        $target->updated_by = Auth::user()->id;
        $target->update();



        $message = "Information Updated Successfully";
        return Response::json(['success' => true, 'heading' => 'Success', 'message' => $message], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Product::findOrFail($id);


        $photo_deleted_location = base_path('public/public/uploads/' . $target->thumbnail);
        unlink($photo_deleted_location);

        if (!empty($target)) {
            $target->delete();
            $message = "Product Deleted Successfully";
            return Response::json(['success' => true, 'heading' => 'Warning', 'message' => $message], 200);
        } else {
            $message = "Product Could not be Deleted";
            return Response::json(['success' => true, 'heading' => 'Success', 'message' => $message], 200);
        }
    }
}
