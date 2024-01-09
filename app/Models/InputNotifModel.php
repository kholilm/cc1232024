<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputNotifModel extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'tb_notif';
    protected $fillable = ['title', 'descriptions'];

    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('descriptions', 'like', '%' . request('search') . '%');
        }
    }
}
