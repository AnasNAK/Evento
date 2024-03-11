<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class evenement extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'lieu',
        'date',
        'category_id',
        'Number_places',
        'organisateur_id',
        'image',
    ];



    public function category()
    {
        return $this->hasOne(category::class, 'id', 'category_id');
    }

    public function users () {
        return $this->belongsTo(User::class);
    }

    public function reservation () {
        return $this->hasmany(reservation::class , 'event_id');
    }
}
