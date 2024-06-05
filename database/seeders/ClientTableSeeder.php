<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use Database\Factories\ClientFactory;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Client::factory(10)->create();

        Client::factory()->create([
            'clientName' => 'madiha arafa',
            'phone' => '01243216533',
            'email' => 'test12@example.com',
            'website' => 'www.madiha.com',
            'city' => 'Alex',
        ]);
    }
}
