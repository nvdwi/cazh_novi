<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ManagerHasSales extends Model
{
    use HasFactory;

    //fillable

    public function manager():BelongsTo
    {
        return $this->belongsTo(User::class, "manager_id");
    }
    public function sales():BelongsTo
    {
        return $this->belongsTo(User::class, "sales_id");
    }
}
