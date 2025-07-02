<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    protected $table="formulir";
    protected $guarded=['id'];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
