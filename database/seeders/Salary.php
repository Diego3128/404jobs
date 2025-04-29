<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Salary extends Seeder
{
    public function run(): void
    {
        DB::table('salaries')->insert(
            ['salary' => '$100 - $499', 'created_at' => now(), 'updated_at' => now()]
        );
        DB::table('salaries')->insert(
            ['salary' => '$500 - $999', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('salaries')->insert(
            ['salary' => '$1000 - $1499', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('salaries')->insert(
            ['salary' => '$1500 - $1999', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('salaries')->insert(
            ['salary' => '$2000 - $2499', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('salaries')->insert(
            ['salary' => '$2500 - $2999', 'created_at' => now(), 'updated_at' => now()]
        );
    }
}
