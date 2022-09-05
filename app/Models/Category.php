<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
class Category extends Model
{
    use HasFactory;
    // join two table using eloquent ORM
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function setCategoryAttribute($value){
        $this->attributes['category_name'] = ucfirst($value);
    }
}
