<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function all() {
      $user = User::count();
      $cate = Category::count();
      $news = News::count();

      return view ('admin.index', compact('user', 'cate', 'news'));
   }
   public function index() {
      $users = User::all();
      return view('admin.customer.index', compact('users'));
   }



}
