<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;


    protected $fillable = [
        'Category_Name',
    ];



    public function events()
    {
        return $this->belongsTo(evenement::class, 'category_id', 'id');
    }


}

