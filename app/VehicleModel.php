<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_models';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['model', 'note', 'color', 'manufacturing_year', 'registration_number', 'manufacturer_id'];

    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    protected function vehicle_model_color()
    {
        return [
            [
                "id" => "0",
                "name" => "red",
            ],
            [
                "id" => "1",
                "name" => "yellow",
            ],
            [
                "id" => "2",
                "name" => "green",
            ],
            [
                "id" => "3",
                "name" => "blue",
            ],
            [
                "id" => "4",
                "name" => "black",
            ],
            [
                "id" => "5",
                "name" => "white",
            ],

        ];
    }

    public function images()
    {
        return $this->hasMany('App\VehicleImage');
    }
    
}
