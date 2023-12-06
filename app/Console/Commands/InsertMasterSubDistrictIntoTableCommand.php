<?php

namespace App\Console\Commands;

use App\Models\Region\City;
use App\Models\Region\Subdistrict;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class InsertMasterSubDistrictIntoTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-master-sub-district';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'inset subdistrict into table, delete table first before run';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cities = City::all();
        $request = Http::get('https://raw.githubusercontent.com/yusufsyaifudin/wilayah-indonesia/master/data/list_of_area/districts.json');
        $result = $request->json();
        $subdistricts = collect($result)->map(function ($row) use ($cities) {
            $city = $cities->filter(function ($key) use ($row) {
                return $key->code == $row['regency_id'];
            })->first();
            return [
                'uuid' => Str::uuid(),
                'name' => ucwords(strtolower($row['name'])),
                'code' => $row['id'],
                'province_id' => $city->province_id,
                'city_id' => $city->id,
                'created_at' => now()
            ];
        });
        foreach ($subdistricts->chunk(300) as $subdistrict) {
            SubDistrict::insert($subdistrict->toArray());
        }
    }
}
