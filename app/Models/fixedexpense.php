<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class fixedexpense extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'is_paid',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
