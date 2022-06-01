<?php

use App\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicle_types = [
            'Motor Cycle',
            'Truck',
            'Bus',
            'Minibus',
            'Jeep',
            'Microbus',
            'Taxicab',
            'Truck',
            'Covered Van',
            'Others',
         ];
    
         foreach ($vehicle_types as $vehicle_type) {
              VehicleType::create(['name' => $vehicle_type]);
         }
    }
}
