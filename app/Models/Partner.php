<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partner extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function activity(): HasMany
    {
        return $this->hasMany(Activity::class, "partner_id");
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
