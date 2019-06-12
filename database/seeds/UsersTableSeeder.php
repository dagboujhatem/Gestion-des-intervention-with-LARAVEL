<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //test if table is empty
        if(DB::table('users')->get()->count()==0)
        {    
            // insert a default administrator 
            User::create([
            'name' => 'Dagbouj Hatem' ,  
            'email' => 'dagboujhatem@gmail.com', 
            'password' => bcrypt('password'),
            'photo' => 'https://cdn4.iconfinder.com/data/icons/avatars-21/512/avatar-circle-human-male-3-512.png',
            'type_account' => '0' ,
            'remember_token' => str_random(10),
            ]);
            // insert a default utilisateur        
            User::create([
            'name' => 'Dagbouj Hatem' ,  
            'email' => 'dagboujhatem2017@gmail.com', 
            'password' => bcrypt('password'),
            'photo' => 'https://cdn4.iconfinder.com/data/icons/avatars-21/512/avatar-circle-human-male-3-512.png',
            'type_account' => '1' ,
            'remember_token' => str_random(10),
            ]);

        }else
        {
            echo "Table USERS not empty ! \n";
        }
    }
}
