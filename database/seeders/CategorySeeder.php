<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                'category' => 'backend developer',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('categories')->insert(
            [
                'category' => 'fronted developer',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('categories')->insert(
            [
                'category' => 'mobile developer',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('categories')->insert(
            [
                'category' => 'UX/UI design',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('categories')->insert(
            [
                'category' => 'devops',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('categories')->insert(
            [
                'category' => 'software architecture',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('categories')->insert(
            [
                'category' => 'techlead',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
