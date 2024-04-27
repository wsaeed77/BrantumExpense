<?php

namespace Database\Seeders;

use App\Models\expense;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('expenses')->insert([
            'user_id' => 1,
            'team_id' => 4,
            'type' => 'other',
            'price' => 6900,
            'description' => 'protocol',
            'created_by' => 2, // Replace with actual user ID
            'created_at' => Carbon::create(2025, 1, 15, 12, 0, 0),
            'updated_at' => Carbon::create(2023, 1, 15, 12, 0, 0),
        ]);
    }




}

