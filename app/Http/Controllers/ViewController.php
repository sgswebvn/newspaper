<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
    
class ViewController extends Controller
{
    public function index() {
        $news_home = DB::table('news')->select('*')->get();
        $home = DB::table('news')->select('*')->get();
        return view('index', compact('home', 'news_home'));
    }
    public function life() {
        $categories = Category::all();
        $news_life= DB::table('news')->select('*')->where('the_loai', 1)->get();
        $life = DB::table('news')->where('the_loai' , 1)->get();
        return view('client.life', compact('life', 'news_life', 'categories'));
    }
    public function travel() {
        $categories = Category::all();
        $news_travel= DB::table('news')->select('*')->where('the_loai', 3)->get();
        $travel = DB::table('news')->where('the_loai' , 3)->get();
        return view('client.travel', compact('travel', 'news_travel', 'categories'));
    }
    public function xh() {
        $categories = Category::all();
        $news_society = DB::table('news')->select('*')->where('the_loai', 2)->get();
        $society = DB::table('news')->where('the_loai' , 2)->get();
        return view('client.society', compact('society', 'news_society', 'categories'));
    }
    public function sport() {
        $categories = Category::all();
        $news_sport= DB::table('news')->select('*')->where('the_loai', 4)->get();
        $sport = DB::table('news')->where('the_loai' , 4)->get();
        return view('client.sport', compact('sport', 'news_sport', 'categories'));
    }
    function details(string $id) {
        $cmt = Comment::where('news_id', $id)->with('user')->get();
        $news_home = DB::table('news')->select('*')->get();
        $data = News::all();
        $details = News::findorFail($id);
        return view('client.details', compact('details', 'data', 'news_home','cmt'));
    }
    function search(Request $request) {
        $news_home = DB::table('news')->select('*')->get();
        $query = $request->input('query');
        $items = News::where('tieu_de', 'LIKE', '%' . $query .'%')->get();
        return view('client.search', compact('items', 'news_home'));
    }
    public function abouts() {
        return view('client.abouts');
    }
    public function contact() {
        $user = DB::table('users')->select('name', 'email')->where('id', auth()->id())->first();
        
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Người dùng không tìm thấy']);
        }
        
        return view('client.contact', compact('user'));
    }
    
  
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        $data = $request->only('name', 'email', 'subject', 'message');
    
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMessage($data));
    
        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi thành công!');
    }
    
  
}
