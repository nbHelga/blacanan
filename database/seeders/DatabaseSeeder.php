<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UMKMSeeder;
use Database\Seeders\BudayaSeeder;
use Database\Seeders\SODSeeder;
use Database\Seeders\BlogSeeder;
use Database\Seeders\ContentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UMKMSeeder::class,
            BudayaSeeder::class,
            SODSeeder::class,
            BlogSeeder::class,
            ContentSeeder::class,
            UserSeeder::class,
            StatistikSeeder::class,
            MutasiSeeder::class,
            FooterSeeder::class,
        ]);
    }
}
