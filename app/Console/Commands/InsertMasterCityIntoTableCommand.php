<?php

namespace App\Console\Commands;

use App\Models\Region\City;
use Illuminate\Support\Str;
use App\Models\Region\Province;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class InsertMasterCityIntoTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-master-city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert master city into table, clear table first before insert';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $provinces = Province::all();
        $request = Http::get('https://raw.githubusercontent.com/yusufsyaifudin/wilayah-indonesia/master/data/list_of_area/regencies.json');
        $result = $request->json();
        $cities = collect($result)->map(function ($row) use ($provinces) {
            return [
                'uuid' => Str::uuid(),
                'name' => ucwords(strtolower($row['name'])),
                'code' => $row['id'],
                'province_id' => $provinces->filter(function ($key) use ($row) {
                    return $key->code == $row['province_id'];
                })->value('id'),
                'created_at' => now()
            ];
        });
        foreach ($cities->chunk(300) as $city) {
            City::insert($city->toArray());
        }
    }
}
