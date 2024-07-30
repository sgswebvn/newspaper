<?php

namespace App\Http\Controllers;

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
        $data = DB::table('news')->where('the_loai' , 1)->get();
        return view('clent.life', compact('data'));
    }
    public function travel() {
        $travel = DB::table('news')->where('the_loai' , 4)->get();
        return view('clent.life', compact('travel'));
    }
    public function xh() {
        $xh = DB::table('news')->where('the_loai' , 5)->get();
        return view('clent.life', compact('xh'));
    }
    public function sport() {
        $sport = DB::table('news')->where('the_loai' , 6)->get();
        return view('clent.life', compact('sport'));
    }
    function details(string $id) {
        $data = News::all();
        $details = News::findorFail($id);
        return view('client.details', compact('details', 'data'));
    }
    
}
