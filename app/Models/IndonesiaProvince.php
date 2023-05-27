<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndonesiaProvince extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "meta"
    ];

    public function city():HasMany
    {
        return $this->hasMany(IndonesiaCity::class, "city_code", "code");
    }

    public function area_lokasi():HasMany
    {
        return $this->hasMany(AreaLocation::class, "province_code", "code");
    }

}
