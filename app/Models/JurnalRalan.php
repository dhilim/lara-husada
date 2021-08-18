<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalRalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_date', 'register_id', 'pasien_rm', 'unit_id', 'dr_id', 'queue'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxQueue = JurnalRalan::where([
                'register_date' => $model->register_date,
                'unit_id' => $model->unit_id,
                'dr_id' => $model->dr_id,
            ])->orderBy('queue', 'desc')
                ->limit(1)
                ->lockForUpdate()
                ->first();

            $model->queue = $maxQueue ? $maxQueue->queue + 1 : 1;
        });
    }
}
