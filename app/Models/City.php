<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable =[
        'region_id',
        'country_id',
        'city_name',
    ];

    public function country(){
        return $this->belongsTo(country::class);
    }
    public function region(){
        return $this->hasMany(region::class);
    }
}
