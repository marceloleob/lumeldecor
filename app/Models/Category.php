<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'is_active',
        'order',
        'image',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Categoria pai
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Subcategorias
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
