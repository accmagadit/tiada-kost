<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UangBulanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function penghuni(): BelongsTo
    {
        return $this->belongsTo(Penghuni::class, 'penghuni_id');
    }

    public function tipePembayaran(): BelongsTo
    {
        return $this->belongsTo(TipePembayaran::class, 'id_tipe_pembayaran');
    }
}
