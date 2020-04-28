<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name'=>"rewan",
            'email'=>"rewan1208@gmail.com",
            'password'=>Hash::make('12345678'),
            'role_id'=>1,
            'reg_id_all'=>'admi_'.mt_rand()


        ]);
        DB::table('roles')->insert([
            'role'=>"SuperAdmin"
        ]);
        DB::table('roles')->insert([
            'role'=>"Teacher"
        ]);
        DB::table('roles')->insert([
            'role'=>"Student"
        ]);

    }
}
