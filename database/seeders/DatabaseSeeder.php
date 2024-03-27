<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\TipeKamar;
use App\Models\Penghuni;
use App\Models\Kamar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TipeKamar::factory(25)->create();
        // \App\Models\Penghuni::factory(25)->create();
        // \App\Models\Kamar::factory(25)->create();
        $this->call([UsersTableSeeder::class]);
    }
}
