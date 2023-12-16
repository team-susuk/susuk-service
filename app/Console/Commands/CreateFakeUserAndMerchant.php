<?php

namespace App\Console\Commands;

use App\Models\User\Merchant;
use App\Models\User\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateFakeUserAndMerchant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-fake-user-and-merchant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::create([
            'name' => fake()->name,
            'nick_name' => fake()->name,
            'birthday' => fake()->date,
            'phone_number' => '0847378838928',
            'profile' => config('services.default_avatar'),
            'profession_id' => 1,
            'languages' => ['Indonesia', 'Jepang', 'Mandarin'],
            'password' => Hash::make('P@ssw0rd'),
            'status' => 'active',
            'register_at' => now(),
            'verification_at' => now(),
            'code' => 'G-' . date('md') . '001',
        ]);

        Merchant::create([
            'name' => fake()->name,
            'profile' => 'https://lh3.googleusercontent.com/p/AF1QipMMzDt7vZv6tMOqVw8ClWG41NWXwS3kjul-OtM5=w1080-h608-p-k-no-v0',
            'description' => 'Toko HD Motor Bengkel Sepeda Motor',
            'category_id' => 1,
            'province_id' => 13,
            'city_id' => 1235,
            'subdistrict_id' => 2963,
            'address' => 'Jepara',
            'pic_name' => 'Lailil Mahfud',
            'phone_number' => '088785747574',
            'whatsapp_number' => '078437847837',
            'commission' => [
                'start' => 10,
                'end' => 10
            ],
            'weekdays' => ['Senin','Selasa','Rabu','Kamis','Jumat'],
            'weekday_time' => [
                'start' => '08:00',
                'end' => '21:00'
            ],
            'weekends' => ['Sabtu','Minggu'],
            'weekend_time' => [
                'start' => '09:00',
                'end' => '17:00'
            ],
            'siup_document' => 'admin/img/sample.pdf',
            'password' => Hash::make('P@ssw0rd'),
            'code' => 'M-' . date('md') . '001',
            'register_at' => now(),
            'verification_at' => now(),
            'status' => 'active',
        ]);
    }
}
