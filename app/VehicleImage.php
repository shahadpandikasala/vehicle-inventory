<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $fillable = ['image_path', 'vehicle_model_id'];

    public function vehicle()
    {
        return $this->belongsTo('App\VehicleModel');
    }
}
