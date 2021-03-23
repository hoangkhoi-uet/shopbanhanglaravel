<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name',
        'category_desc',
        'category_status',
    ];

    protected $primaryKey = 'category_id';

    protected $table = 'tbl_category_product';

    public function brands() {
        return $this->hasMany('App\Models\Brand');
    }
}
