<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategorysController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categorys = $this->categoryService->index();
        return view('categorys.index', compact('categorys'));
    }

    public function create()
    {
        return view('categorys.register');
    }

    public function store(Request $request)
    {
        $status = $this->categoryService->store($request);
        return  redirect()->route('admin.category.create');
    }

    public function edit($id)
    {
        $type = 'edit';
        $categorys = $this->categoryService->edit($id);
        return view('categorys.register', compact('categorys','type'));
    }

    public function update(Request $request, $id)
    {
        // dd('oi');
        $categorys = $this->categoryService->update($request, $id);
        return redirect(route('admin.category.edit', compact('categorys','id')));
    }

    public function destroy($id)
    {
        // $categorys = ($this->categoryservice->index())?: '';
        $event = $this->categoryService->destroy($id);

        return redirect()->route('admin.category.index');

    }
}
