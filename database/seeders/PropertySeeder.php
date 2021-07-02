<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {

            $property = Property::create([
                'title' => 'LAVANYA HILLS RESIDENCES',
                'address' => 'Jl. Raya Bukit Cinere Rt.011 Rw.005 Gandul Cinere, Depok, Jawa Barat',
                'price' => sprintf('%d000000', $i + 1),
                'description' => 'Lavanya Hills Residences merupakan hunian dengan lingkungan yang indah,hijau,asri dan sangat strategis di Selatan Jakarta, dengan luas tanah + 9 hektar & konsep Beautiful Green Smart Living mewujudkan hunian untuk kehidupan yang berkualitas bagi pasangan dan keluarga.',
                'type' => 'Rumah',
                'developer' => 'JO PT GRAHA CIPTA SUKSESTAMA – PT NIMAN INTERNUSA',
                'size' => '',
            ]);

            $property->images()->insert([
                [
                    'property_id' => $property->id,
                    'name' => 'https://via.placeholder.com/350x250'
                ],
                [
                    'property_id' => $property->id,
                    'name' => 'https://via.placeholder.com/350x250'
                ]
            ]);
        }
    }
}
