<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'subcategory_id',
        'price',
        'thumbnail',
        'promo_video',
        'status',
        'created_by',
    ];

    // Relationship: Course belongs to a subcategory
    public function subcategory()
    {
        return $this->belongsTo(CourseSubcategory::class, 'subcategory_id');
    }

    // Relationship: Course created by a user
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
