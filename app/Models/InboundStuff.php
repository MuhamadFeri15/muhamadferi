<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InboundStuff extends Model
{
    use SoftDeletes;
    protected $fillable = ["stuff_id", "total", "date", "proof_file"];

    public function stuff($id)
    {
      return $this->belongsTo(Stuff::class);    }
}
