<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'holomiadev@gmail.com',
            'password' => bcrypt('hoLo@12012021@#')
        ]);
       

        $user2 = User::create([
            'name' => '3Dcontent',
            'email' => '3dcontent@gmail.com',
            'password' => bcrypt('password'),
        ]);
 
        $user2 = User::create([
            'name' => 'subadmnin',
            'email' => 'subadmnin@gmail.com',
            'password' => bcrypt('1'),
        ]);
    
    }
}
