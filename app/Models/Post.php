<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','subcategory_id','title','slug',
         'post_date','image','description',
    ];
    // join three table using eloquent ORM
    // join with category
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    // join with subcategory
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    // join with user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
