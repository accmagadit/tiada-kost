<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kamar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tipeKamar(): BelongsTo
    {
        return $this->BelongsTo(TipeKamar::class,'tipe_kamar_id');
    }
    public function penghuni(): BelongsTo
    {
        return $this->BelongsTo(Penghuni::class,'penghuni_id');
    }
}
