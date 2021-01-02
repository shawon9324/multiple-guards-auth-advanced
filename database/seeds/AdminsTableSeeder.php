<?php

use App\Model\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name'=> 'Shawon',
            'email'=>'shawon9324@gmail.com',
            'password'=>bcrypt('12345678'),
            'mobile' =>'01774339279',
            'address'=>'Dhaka,Bangladesh',
            'gender'=>'Male'
        ];
        Admin::insert($data);
    }
}
