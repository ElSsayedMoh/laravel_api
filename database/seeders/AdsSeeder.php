<?php

namespace Database\Seeders;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1 ; $i <= 15 ; $i++){
            DB::table('ads')->insert([
                'title' => fake()->name(),
                'slug' => fake()->name(),
                'text' => fake()->paragraph(),
                'phone' => fake()->phoneNumber(),
                'user_id' => 1,
                'domain_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
