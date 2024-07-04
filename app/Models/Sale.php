<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected function casts(): array
{
    return [
        'given_date' => 'datetime',
        'date_of_return' => 'datetime',
    ];
}

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function cement(): BelongsTo
    {
        return $this->belongsTo(Cement::class);
    }
}
