<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '26042023001',
            'name' => 'Bintang Tobing',
            'address' => 'Jl Pelita IV Gg Aman No 7',
            'phone_number' => '081262845980',
        ]);
        DB::table('users')->insert([
            'id' => '26042023002',
            'name' => 'John Doe',
            'address' => 'Jl Pelita B No 7',
            'phone_number' => '081262845980',
        ]);
        DB::table('users')->insert([
            'id' => '26042023003',
            'name' => 'Bastian Kevin Valen',
            'address' => 'Jl Yos Sudarso No. 99B',
            'phone_number' => '081262845980',
        ]);
    }
}
