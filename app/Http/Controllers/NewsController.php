<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
    
            $request->validate($this->rules(), $this->message());
            
            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'images/'; // Update this to your desired path
            $file->move($destinationPath, $fileName);

            News::create([
                'tieu_de' => $request->input('tieu_de'),
                'noi_dung' => $request->input('noi_dung'),
                'hinh_anh' => $destinationPath . $fileName,
                'tac_gia' => $request->input('tac_gia'),
                'the_loai' => $request->input('the_loai'),
            ]);
            // dd($request);
            return redirect('/admin/news/index')->with('success', 'Thêm thành công');
    }
    public function rules () {
        return [
            'tieu_de' => ['required', 'string' , 'min:10'],
            'the_loai' => ['required', ],
            'noi_dung' => ['required', 'string' ],
            'hinh_anh' => ['required', 'image', 'mimes:png,jpeg,jpg,gif,svg, jgp.webp, webp', 'max:2048'],
            'tac_gia' => ['required'],
        ];
    }
    public function message() {
        return [
            'tieu_de.required' => 'Vui lòng nhập tiêu đề ',
            'tieu_de.min' => 'Tối thiểu 10 chữ',
            'noi_dung.required' => 'Không để trống nội dung',
            'noi_dung.min' => 'Tối thiểu 30 chữ',
            'hinh_anh.required' => 'Phải nhập hình ảnh',
        ];
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
        $news = News::findorFail($id);
        return view('admin.News.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    $request->validate($this->rules(), $this->message());

    $news = News::findOrFail($id);
    $news->tieu_de = $request->input('tieu_de');
    $news->noi_dung = $request->input('noi_dung');
    $news->tac_gia = $request->input('tac_gia');
    $news->the_loai = $request->input('the_loai');

    if ($request->hasFile('hinh_anh')) {
        $file = $request->file('hinh_anh');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $destinationPath = 'images/';
        $file->move($destinationPath, $fileName);
        $news->hinh_anh = $destinationPath . $fileName;
    }

    $news->save();
    return redirect('/admin/news/index')->with('success', 'Cập nhật thành công');

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findorFail($id);
        $news->delete();
        return redirect('admin/news/index')->with('Xóa thành công');
    }
}
