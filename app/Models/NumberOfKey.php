<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NumberOfKey extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'number_of_key'
    ];
}
