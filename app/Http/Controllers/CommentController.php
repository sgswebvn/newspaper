<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::all();
        return view('client.details',compact( 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $vali = $request->validate([
        'user_id' => 'required|integer|',
        'news_id' => 'required',
        'comment' => 'required|string',
        'status' => 'required',

      ]);
      $query = DB::table('comments')->insert([
        'user_id' =>$vali['user_id'],
        'news_id' =>$vali['news_id'],
        'comment' =>$vali['comment'],
        'status' =>$vali['status'],
        'created_at' => NOW(),
        'updated_at' => NOW(),
      ]);
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $details = News::findOrFail($id);
        $comments = Comment::where('news_id', $id)->get();
        return view('client.details', compact('article', 'comments'));
    }
}
