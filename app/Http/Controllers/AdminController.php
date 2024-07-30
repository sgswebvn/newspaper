<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show_admin() {
        $user = Auth::user();
        return view('admin.index', ['roles' => $user->roles]);
  }
}
