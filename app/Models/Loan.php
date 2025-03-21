<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['user_id', 'occupation', 'amount', 'message', 'reference', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
