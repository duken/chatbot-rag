<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'uploader_id'];

    public function uploader()
    {
        return $this->belongsTo(\App\Models\User::class, 'uploader_id');
    }
}
