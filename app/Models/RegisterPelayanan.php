<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterPelayanan extends Model
{
    use HasFactory;

    protected $dates = [
        'date_in', 'date_out'
    ];

    protected $fillable = [
        'date_in', 'date_out', 'pasien_rm', 'unit_id', 'dr_id'
    ];
}
