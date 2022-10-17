<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name' => 'Emad Hibishy',
            'email' => 'emadhibishy@gmail.com',
            'password' => Hash::make('01146581234')
        ]);
    }
}
