<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'tieu_de', 'noi_dung',
        'hinh_anh', 'tac_gia',
        'the_loai'
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}