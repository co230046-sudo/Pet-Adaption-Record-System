<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets'; //Makes sure table can only be accessed in the "Pet" class

    protected $fillable = [ //Same here with the table inputs
        'name',
        'species',
        'age',
        'status',
    ];

    public $timestamps = true; //Allow creation of timestamp (created_at & modified at)
}
