<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $table = 'product_cat'; 
    public function product(){
        //satu user punya banyak post
        return $this->hasMany(Product::class);
    }
}
