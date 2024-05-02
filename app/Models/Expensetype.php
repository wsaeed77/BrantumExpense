<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expensetype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_monthly',
    ];

    public function expenses()
    {

        return $this->hasMany(Expense::class);
    }


}
