<?php

use App\IncidentType;
use Illuminate\Database\Seeder;

class IncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incident_types = [
            'Reckless Driving',
            'Unwanted Turn',
            'Overtaking',
            'Lane Changing',
            'Creating Obstacle',
            'Others',
         ];
    
         foreach ($incident_types as $incident_type) {
              IncidentType::create(['name' => $incident_type]);
         }
    }
}
