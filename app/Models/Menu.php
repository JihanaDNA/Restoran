<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'foto',
        'id_category'
    ];

    public function category() {
        return $this->belongsTo(category::class, 'id_category');
    }
}
