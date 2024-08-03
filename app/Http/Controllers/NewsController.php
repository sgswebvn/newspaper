<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidateRq;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.News.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.News.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateRq $request)
    {

        $fileName = null;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $fileName = $file->store('images', 'public'); // Store file in 'images' directory within 'public' disk
        }

        News::create([
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'hinh_anh' => $fileName,
            'tac_gia' => $request->input('tac_gia'),
            'the_loai' => $request->input('the_loai'),
        ]);

        return redirect('/admin/news/index')->with('success', 'Thêm thành công');
    }

    

   

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.News.edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $news = News::findOrFail($id);
        return view('admin.News.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateRq $request, string $id)
    {

        $news = News::findOrFail($id);
        $news->tieu_de = $request->input('tieu_de');
        $news->noi_dung = $request->input('noi_dung');
        $news->tac_gia = $request->input('tac_gia');
        $news->the_loai = $request->input('the_loai');

        if ($request->hasFile('hinh_anh')) {
            // Delete old image if exists
            if ($news->hinh_anh) {
                Storage::disk('public')->delete($news->hinh_anh);
            }

            $file = $request->file('hinh_anh');
            $fileName = $file->store('images', 'public');
            $news->hinh_anh = $fileName;
        }

        $news->save();
        return redirect('/admin/news/index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        // Delete image file from storage
        if ($news->hinh_anh) {
            Storage::disk('public')->delete($news->hinh_anh);
        }

        $news->delete();
        return redirect('/admin/news/index')->with('success', 'Xóa thành công');
    }
    function search(Request $request) {
        $news = News::all();
        $query = $request->input('query');
        $items = News::where('tieu_de', 'LIKE', '%' . $query .'%')->get();
        return view('admin.News.search', compact('items', 'news'));
    }
}
