<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded =  [];

    public function penghuni(): BelongsTo
    {
        return $this->BelongsTo(Penghuni::class,'penghuni_id');
    }
}
