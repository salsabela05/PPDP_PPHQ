<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table="pembayaran";
    protected $guarded=['id'];

    function formulir() {
        return $this->belongsTo(Formulir::class,'user_id','user_id');
    }
}
