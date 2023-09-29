<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'cate_id',
        'title',
        'description',
        'image',
        'inclusions',
        'price',
        'created_by',
    ];
    protected $casts = [
        'inclusions' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'created_by', 'id');
    }
    

}
