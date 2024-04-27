<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_by',
        'team_id',
        'type',
        'price',
        'description',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function team(){

        return$this->belongsTo(Team::class);


        }
}
