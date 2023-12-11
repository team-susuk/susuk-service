<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use App\Models\Region\Province;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class InsertMasterProvinceIntoTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-master-province';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert master province from source into table, clear table first before insert';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $request = Http::get('https://raw.githubusercontent.com/yusufsyaifudin/wilayah-indonesia/master/data/list_of_area/provinces.json');
        $result = $request->json();
        $provinces = collect($result)->map(function ($row) {
            return [
                'uuid' => Str::uuid(),
                'name' => ucwords(strtolower($row['name'])),
                'code' => $row['id'],
                'created_at' => now()
            ];
        });
        foreach ($provinces->chunk(300) as $province) {
            Province::insert($province->toArray());
        }
    }
}
