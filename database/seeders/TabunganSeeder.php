<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tabungan;
use App\Models\User;

class TabunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tabungan::create([
            'nis' => '12108773',
            'name' => 'eli',
            'rayon' => 'cisarua 1', 
            'money' => '121212',
            'user_id' => 1
        ]);

        
        Tabungan::create([
            'nis' => '12108773',
            'name' => 'ASti',
            'rayon' => 'sukasari 1', 
            'money' => '121212',
            'user_id' => 2
        ]);

        User::create([
            'name' => 'username',
            'email' => 'username@gmail.com',
            'username' => 'username',
            'password' => 'username'
        ]);
    }
}
