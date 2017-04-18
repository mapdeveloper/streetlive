<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([

            ['title' => 'Administrator', 'slug' => 'admin'],
            ['title' => 'NGO', 'slug' => 'ngo'],
            ['title' => 'Volunteer', 'slug' => 'volunteer'],
            ['title' => 'Donor', 'slug' => 'donor']

        ]);

        DB::table('users')->insert(
            [
            'name' => 'admin',
            'email' => 'admin@dev.com',
            'password' => bcrypt('admin'),
            'role_id'=> '1'
        ] 
        
        
        );
    }

     
}
