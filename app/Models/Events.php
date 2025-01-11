<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        "organisateur",
        "lieu",
        "date",
        "objet",
        "descriptions"
    ];
}
