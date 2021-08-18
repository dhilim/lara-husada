<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // protected $primaryKey = 'rm';

    protected $fillable = [
        'rm', 'name', 'gender'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->rm = str_pad($model->id, 6, '0', STR_PAD_LEFT);

            $model->update();
        });
    }
}
