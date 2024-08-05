<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRq;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.Category.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
       
        Category::create([
            'the_loai' => $request->input('the_loai'),
        ]);
        // dd()
        return redirect('/admin/category/index/')->with('success', 'Thêm thành công');
    }   

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $categories = Category::all();

        return view('main', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::findorFail($id);
        return view('admin.Category.edit', compact('categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $categories = Category::findorFail($id);

        $categories->the_loai = $request->input('the_loai');
       
    
        $categories->save();

        return redirect('/admin/category/index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/admin/category/index/')->with('success', 'Xóa thành công');
    }
}
