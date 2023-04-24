<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['name'];

    public function Products(){
        return $this->belongsToMany(Product::class);
    }
}
