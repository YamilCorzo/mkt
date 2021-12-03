<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'productos';
    protected $fillable = ['name', 'description', 'img', 'video', 'price', 'status', 'created_at', 'updated_at'];
}
