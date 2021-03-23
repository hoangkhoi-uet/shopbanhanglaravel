<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_status',
    ];

    protected $primaryKey = 'product_id';

    protected $table = 'tbl_product';

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
