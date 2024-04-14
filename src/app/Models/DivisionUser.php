<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionUser extends Model
{
    use HasFactory;

    protected $table = 'division_users';

    protected $fillable = [
        'id',
        'user_id',
        'division_id',
        'created_at',
        'updated_at'
    ];
}
