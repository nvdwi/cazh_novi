<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndonesiaDistrict extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "meta"
    ];

    public function city():BelongsTo
    {
        return $this->belongsTo(IndonesiaCity::class,"city_code", "code");
    }

    public function village():HasMany
    {
        return $this->hasMany(IndonesiaVillage::class, "village_code", "code");
    }

    public function area_lokasi():HasMany
    {
        return $this->hasMany(AreaLocation::class, "district_code", "code");
    }
}
