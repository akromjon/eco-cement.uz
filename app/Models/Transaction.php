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
            'income_amount'=>($data['sell_amount'] * $data['kg'])-$data['get_amount'] * $data['kg'],
            'client_id' => $data['client_id'],
            'sale_id' => $data['sale_id'],
            'amount' => $data['sell_amount'] * $data['kg'],
            'dept' => $data['sell_amount'] * $data['kg'],
        ]);
    }

    public static function editPay(array $data)
    {
        $transaction = self::where('sale_id', $data['sale_id'])->first();

        $transaction->update([
            'income_amount'=>($data['sell_amount'] * $data['kg'])-$data['get_amount'] * $data['kg'],
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
