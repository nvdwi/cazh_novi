<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndonesiaVillage extends Model
{
    use HasFactory;

    public function district():BelongsTo
    {
        return $this->belongsTo(IndonesiaDistrict::class,"district_code", "code");
    }

    public function area_lokasi():HasMany
    {
        return $this->hasMany(AreaLocation::class, "village_code", "code");
    }
}
