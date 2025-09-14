<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function subcategories()
    {
        return $this->hasMany(CourseSubcategory::class, 'category_id');
    }
    
    public function courses()
    {
        return $this->hasManyThrough(Course::class, CourseSubcategory::class, 'category_id', 'subcategory_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
