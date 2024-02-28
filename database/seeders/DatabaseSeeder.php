<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Compartment;
use App\Models\Retailer;
use App\Models\Truck;
use App\Models\Wholesaler;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        Model::unguard();

        $this->cleanup();
        $faker = Factory::create();

        $wholesaler = Wholesaler::factory()->create(['name' => 'KM Petroleum Ltd']);

        Retailer::factory()->create(['name' => 'BP Petroleum Ltd Rosebank']);

         Truck::factory(10)->create()->each(function ($truck) use ($faker, $wholesaler) {

             $truck->wholesaler_id = $wholesaler->id;
             Compartment::factory(7)->create(['truck_id' => $truck->id]);
         });
    }

    private function cleanup()
    {
        $this->turnOffFKCheck();

        $tables = DB::select('SHOW TABLES');
        $keyName = 'Tables_in_' . (app()->environment() === 'testing' ? env('DB_DATABASE') . '_test' : env('DB_DATABASE'));

        foreach ($tables as $table) {
            DB::table($table->$keyName)->truncate();
        }

        $this->turnOnFKCheck();
    }

    private function turnOnFKCheck()
    {
        switch (DB::getDriverName()) {
            case 'mysql':
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
                break;
            case 'sqlite':
                DB::statement('PRAGMA foreign_keys = ON');
                break;
        }
    }

    private function turnOffFKCheck()
    {
        switch (DB::getDriverName()) {
            case 'mysql':
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                break;
            case 'sqlite':
                DB::statement('PRAGMA foreign_keys = OFF');
                break;
        }
    }
}
