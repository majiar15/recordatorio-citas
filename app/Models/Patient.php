<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'cc',
        'name',
        'last_name',
        'email',
        'number',
        'proxima_cita'
    ];
    public $table = "patient";
}
