<?php

namespace App\Models;

use App\Models\Concerns\ScopedByUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory, ScopedByUser;

    protected $table = 'pengaturan'; // Specify the exact table name

    protected $fillable = [
        'key',
        'value',
        'id_user',
    ];
}
