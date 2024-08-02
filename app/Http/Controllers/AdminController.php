<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
   public function destroy($id){
      $users = User::findorFail($id);
      $users->delete();
      return redirect('/admin/users/index/')->with('success', 'Xóa thành công');

   }
  


}
