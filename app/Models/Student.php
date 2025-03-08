<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use SearchableTrait;
    
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'name' => 1,
        ],
    ];
}
