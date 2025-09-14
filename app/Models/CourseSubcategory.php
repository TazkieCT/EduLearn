<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'category_id',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function courses()
    {
        return $this->hasMany(Course::class, 'subcategory_id');
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
