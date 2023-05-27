<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndonesiaCity extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "meta"
    ];

    public function province():BelongsTo
    {
        return $this->belongsTo(IndonesiaProvince::class,"province_code", "code");
    }

    public function district():HasMany
    {
        return $this->hasMany(IndonesiaCity::class, "district_code", "code");
    }

    public function area_lokasi():HasMany
    {
        return $this->hasMany(AreaLocation::class, "city_code", "code");
    }
}
