<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        App\User::create([
            'name'=>'Badman',
            'email'=>'badman@gmail.com',
            'password'=> bcrypt(12345678)
        ]);
    }
}
