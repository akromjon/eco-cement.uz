<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    public static  function pay(array $data): self
    {
        return self::create([
            'client_id' => $data['client_id'],
            'sale_id' => $data['sale_id'],
            'amount' => $data['sell_amount'] * $data['kg'],
            'dept' => $data['sell_amount'] * $data['kg'],
        ]);
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
