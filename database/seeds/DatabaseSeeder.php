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
         
         $this->seedUser();
    }

    public function seedUser()
    {
                 DB::table('users')->insert([
             'name' => 'Mike Cornille',
             'cell' => '6307501718',
             'email' => 'mikecornille@gmail.com',
             'password' => bcrypt('password'),
             'remember_token' => 'SMDvF3btchRMWIHKVWcEjVKvpHrIvCr6FCtwSVsBvkQct39lY5eCibZrgqxW',
             'admin' => 1,
             'accounting' => 1
         ]);
        
        factory(App\Location::class,3)->create();

        factory(App\Customer::class,3)->create();

       

         factory(App\Equipment::class,3)->create();

        factory(App\Notes::class,3)->create();

        factory(App\Carrier::class,3)->create();

        factory(App\Loadlist::class,6)->create();

         factory(App\Load::class,6)->create();

         factory(App\Ledger::class,20)->create();

        
            }

        
    }
