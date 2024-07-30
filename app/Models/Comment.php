<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $primaryKey = 'id';
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'news_id',
        'comment',
        'status'
    ];

    public static function getcmt($id)  {
        return DB::table('comments')
        ->leftJoin('users' , 'comments.user_id','=','users.id')
        ->select('comments.*' , 'users.name as name')
        ->where('news_id',$id)
        ->get();
    }
}
