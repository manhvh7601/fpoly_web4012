<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //chỉ định tên table trong trường hợp không đặt tên theo Eloquent
    protected $table = 'products';

    //Mặc định, Eloquent coi primary key là cột id
    protected $primaryKey = 'id';

    protected $fillable  = [
        'name',
        'price',
        'quantity',
        'category_id',
        'image',
        'desc',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
