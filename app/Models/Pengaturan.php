<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturan'; // Specify the exact table name

    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'array', // Allow storing arrays/JSON in the value field
    ];
}