<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;
use Carbon\Carbon;

class VisitSeeder extends Seeder
{
    public function run()
    {
        $cities = ['Moscow', 'Saint Petersburg', 'Novosibirsk', 'Ekaterinburg', 'Kazan'];
        $devices = ['desktop', 'mobile', 'tablet'];

        for ($i = 0; $i < 24; $i++) {
            $hour = Carbon::now()->subHours($i)->startOfHour();

            $count = rand(5, 20);

            for ($j = 0; $j < $count; $j++) {
                Visit::create([
                    'ip' => "192.168.1." . rand(1, 255) . "." . rand(1, 255),
                    'city' => $cities[array_rand($cities)],
                    'url' => 'http://example.com/test-page',
                    'user_agent' => 'Chrome...',
                    'device' => $devices[array_rand($devices)],
                    'hour' => $hour,
                    'created_at' => $hour,
                    'updated_at' => $hour,
                ]);
            }
        }
    }
}
