<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\PHPStan\AbstractMacro;
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


    public static function getCurrentMonthExpenses()
    {
        $currentMonth = date('Y-m');

        return self::whereYear('created_at', '=', date('Y'))
            ->whereMonth('created_at', '=', date('m'))
            ->get();
    }





}
