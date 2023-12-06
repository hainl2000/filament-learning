<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $table = 'fee';

    protected $appends = [
        'totalFee'
    ];

    public function getTotalFeeAttribute()
    {
        return $this->fee1 + $this->fee2 + $this->fee3 + $this->fee4;
    }
}
