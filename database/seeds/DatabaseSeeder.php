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
         $this->call(LocationSeeder::class);
         $this->seedUser();
    }

    public function seedUser()
    {
                DB::table('users')->insert([
            'name' => 'Mike Cornille',
            'email' => 'mikecornille@gmail.com',
            'cell' => 6307501718,
            'password' => bcrypt('password'),
        ]);
        
        factory(App\Location::class,3)->create();

        factory(App\Customer::class,3)->create();

        factory(App\Load::class,3)->create();

        factory(App\Equipment::class,3)->create();

        factory(App\Carrier::class,3)->create();
            }

        
    }
