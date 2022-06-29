<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;

class ProductsController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dataImport(Request $request)
    {
        // dd('oioiio');
       $products = ($this->productService->dataImport($request));
    }

    public function index()
    {
       $event = '';
       $products = ($this->productService->index())?: '';
       return view('products.index', compact('products', 'event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $status = $this->productService->store($request);
        return  redirect()->route('admin.register');
    }

    public function edit($id)
    {
        $type = 'edit';
        $products = $this->productService->edit($id);
        return view('products.edit', compact('products','type'));
    }

    public function destroy($id)
    {
        $products = ($this->productService->index())?: '';
        
        $event = $this->productService->destroy($id);

        return redirect()->route('admin.index');

    }

    public function update(Request $request, $id)
    {
        $products = $this->productService->update($request, $id);
        return redirect()->route('admin.index');
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
