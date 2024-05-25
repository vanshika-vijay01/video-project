<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Category;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
