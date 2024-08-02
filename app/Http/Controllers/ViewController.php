<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function index() {
        $news_home = DB::table('news')->select('*')->get();
        $home = DB::table('news')->select('*')->get();
        return view('index', compact('home', 'news_home'));
    }
    public function life() {
        $news_life= DB::table('news')->select('*')->where('the_loai', 1)->get();
        $life = DB::table('news')->where('the_loai' , 1)->get();
        return view('client.life', compact('life', 'news_life'));
    }
    public function travel() {
        $news_travel= DB::table('news')->select('*')->where('the_loai', 3)->get();
        $travel = DB::table('news')->where('the_loai' , 3)->get();
        return view('client.travel', compact('travel', 'news_travel'));
    }
    public function xh() {
        $news_society = DB::table('news')->select('*')->where('the_loai', 2)->get();
        $society = DB::table('news')->where('the_loai' , 2)->get();
        return view('client.society', compact('society', 'news_society'));
    }
    public function sport() {
        $news_sport= DB::table('news')->select('*')->where('the_loai', 4)->get();
        $sport = DB::table('news')->where('the_loai' , 4)->get();
        return view('client.sport', compact('sport', 'news_sport'));
    }
    function details(string $id) {
        $cmt= Comment::getcmt($id);
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
}
