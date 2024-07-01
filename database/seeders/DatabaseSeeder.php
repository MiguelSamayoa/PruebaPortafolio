<?php

namespace Database\Seeders;

use App\Models\PersonalData;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalData::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '(+123) 4567 8961',
            'address' => '123 Street, City',
            'presentation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
    }
}
