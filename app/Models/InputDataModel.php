<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputDataModel extends Model
{
    use HasFactory;

    public   $timestamps = false;
    protected $table = 'tb_sop';
    protected $fillable = ['menu', 'url', 'menu_id', 'jenis_menu', 'icon', 'path_pdf', 'sort_menu', 'is_active'];
}
