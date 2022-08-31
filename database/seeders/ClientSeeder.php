<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->truncate();
        Client::create([
            'title' => 'We always strive to gain customer satisfaction',
            'header_image' => asset('assets/images/kisspng-logistics-cargo-packaging-and-labeling-intermodal-ОПТ-amp-quot-avers-5b695c3a25efd62.png'),
            'images' => [
                asset('assets/images/netflix-logo-0.png'),
                asset('assets/images/netflix-logo-0.png'),
                asset('assets/images/netflix-logo-0.png'),
                asset('assets/images/netflix-logo-0.png'),
                asset('assets/images/netflix-logo-0.png'),
                asset('assets/images/netflix-logo-0.png'),
                asset('assets/images/netflix-logo-0.png'),
                asset('assets/images/netflix-logo-0.png'),
            ],
        ]);
    }
}
