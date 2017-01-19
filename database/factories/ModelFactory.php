<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'cell' => $faker->phoneNumber
    ];
});

$factory->define(App\Notes::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'time_name_stamp' => $faker->name(),
        'notes' => $faker->sentence(),
        
        ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'location_name' => $faker->word(),
        'location_number' => $faker->randomNumber(),
        'address' => $faker->streetAddress(),
        'city' => $faker->city(),
        'state' => $faker->state(),
        'zip' => $faker->postcode(),
        'contact' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'cell' => $faker->phoneNumber(),
        'location_notes' => $faker->sentence(),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->word(),
        'location_number' => $faker->randomNumber(),
        'address' => $faker->streetAddress(),
        'city' => $faker->city(),
        'state' => $faker->state(),
        'zip' => $faker->postcode(),
        'fax' => $faker->phoneNumber(),
        'contact' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
		'internal_notes' => $faker->sentence(),
        'customer_ambassador' => $faker->email(),
    ];
});

$factory->define(App\Load::class, function (Faker\Generator $faker) {
    static $password;

    return [
     
            'customer_name' => $faker->word(),
            'customer_address' => $faker->streetAddress(),
            'customer_city' => $faker->city(),
            'customer_state' => $faker->state(),
            'customer_zip' => $faker->postcode(),
            'customer_contact' => $faker->name(),
            'customer_email' => $faker->email(),
            'customer_phone' => $faker->phoneNumber(),
            'customer_fax' => $faker->phoneNumber(),
            'carrier_name' => $faker->word(),
            'carrier_address' => $faker->streetAddress(),
            'carrier_city' => $faker->city(),
            'carrier_state' => $faker->state(),
            'carrier_zip' => $faker->postcode(),
            'carrier_contact' => $faker->name(),
            'carrier_email' => $faker->email(),
            'carrier_phone' => $faker->phoneNumber(),
            'carrier_fax' => $faker->phoneNumber(),
            'carrier_driver_name' => $faker->name(),
            'carrier_driver_cell' => $faker->word(),
            'pick_company' => $faker->word(),
            'pick_address' => $faker->streetAddress(),
            'pick_city' => $faker->city(),
            'pick_state' => $faker->state(),
            'pick_zip' => $faker->postcode(),
            'pick_contact' => $faker->name(),
            'pick_phone' => $faker->phoneNumber(),
            'pick_email' => $faker->email(),
            'pick_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'pick_time' => $faker->word(),
            'pick_status' => $faker->word(),
            'delivery_company' => $faker->word(),
            'delivery_address' => $faker->streetAddress(),
            'delivery_city' => $faker->city(),
            'delivery_state' => $faker->state(),
            'delivery_zip' => $faker->postcode(),
            'delivery_contact' => $faker->name(),
            'delivery_phone' => $faker->phoneNumber(),
            'delivery_email' => $faker->email(),
            'delivery_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'delivery_time' => $faker->word(),
            'delivery_status' => $faker->word(),
            'po_number' => $faker->word(),
            'ref_number' => $faker->word(),
            'bol_number' => $faker->word(),
            'created_by' => $faker->email(),
            'its_group' => $faker->word(),
            'amount_due' => $faker->numberBetween($min = 1000, $max = 9000),
            'carrier_rate' => $faker->numberBetween($min = 1000, $max = 9000),
            'billed_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'approved_carrier_invoice' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'commodity' => $faker->word(),
            'special_ins' => $faker->word(),
            'trailer_type' => $faker->word(),
            'internal_notes' => $faker->sentence(),
            'add_stops' => $faker->sentence(),
            'invoice_notes' => $faker->sentence(),
            'update_customer_message' => $faker->sentence(),
            'rate_con_creator' => $faker->name(),
            'rate_con_creation_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'signed_rate_con' => $faker->word(),
            'quick_status_notes' => $faker->word(),
            'vendor_invoice_number' => $faker->word(),
            'vendor_invoice_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'remit_name' => $faker->word(),
            'remit_address' => $faker->streetAddress(),
            'remit_city' => $faker->city(),
            'remit_state' => $faker->state(),
            'remit_zip' => $faker->postcode(),
            'carrier_message' => $faker->sentence(),
            'internal_email_address' => $faker->email(),
            'internal_message' => $faker->sentence(),
            'creation_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
    ];
});

$factory->define(App\Equipment::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'make' => $faker->word(),
        'model' => $faker->randomNumber(),
        'commodity' => $faker->word(),
        'length' => $faker->randomNumber(),
        'width' => $faker->randomNumber(),
        'height' => $faker->randomNumber(),
        'weight' => $faker->randomNumber(),
        'loading_instructions' => $faker->sentence(),
        
    ];
});


$factory->define(App\Carrier::class, function (Faker\Generator $faker) {
    static $password;

    return [
            
            'company' => $faker->word(),            
            'contact' => $faker->name(),
            'mc_number' => $faker->randomNumber(),
            'dot_number' => $faker->randomNumber(),
            'address' => $faker->streetAddress(),
            'city' => $faker->city(),
            'state' => $faker->state(),
            'zip' => $faker->postcode(),
            'phone' => $faker->phoneNumber(),
            'fax' => $faker->phoneNumber(),
            'email' => $faker->email(),
            'driver_name' => $faker->name(),
            'driver_phone' => $faker->phoneNumber(),
            'cargo_exp' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'cargo_amount' => $faker->randomNumber(),
            'bc_contract' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'flatbed' => $faker->numberBetween($min = 0 , $max = 1),  
            'stepdeck' => $faker->numberBetween($min = 0 , $max = 1),
            'conestoga' => $faker->numberBetween($min = 0 , $max = 1),
            'hot_shot' => $faker->numberBetween($min = 0 , $max = 1),
            'van' => $faker->numberBetween($min = 0 , $max = 1),
            'power' => $faker->numberBetween($min = 0 , $max = 1),
            'lowboy' => $faker->numberBetween($min = 0 , $max = 1),
            'landoll' => $faker->numberBetween($min = 0 , $max = 1),
            'towing' => $faker->numberBetween($min = 0 , $max = 1),
            'auto_carrier' => $faker->numberBetween($min = 0 , $max = 1),
            'straight_truck' => $faker->numberBetween($min = 0 , $max = 1),
            'remit_name' => $faker->word(),
            'remit_address' => $faker->streetAddress(),
            'remit_city' => $faker->city(),
            'remit_state' => $faker->state(),
            'remit_zip' => $faker->postcode(),
            'load_info' => $faker->sentence(),
            'permanent_notes' => $faker->sentence(),
        
    ];
});

$factory->define(App\Loadlist::class, function (Faker\Generator $faker) {
    static $password;

    return [
            'created_by' => $faker->name(),
            'customer' => $faker->name(),
            'urgency' => $faker->word(),
            'load_type' => $faker->word(),
            'trailer_type' => $faker->word(),
            'pick_city' => $faker->city(),
            'pick_state' => $faker->state(),
            'pick_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'pick_time' => $faker->time(),
            'delivery_city' => $faker->city(),
            'delivery_state' => $faker->state(),
            'delivery_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'delivery_time' => $faker->time(),
            'commodity' => $faker->sentence(),
            'special_instructions' => $faker->sentence(),
            'length' => $faker->numberBetween($min = 5, $max = 40),
            'width' => $faker->numberBetween($min = 4, $max = 9),
            'height' => $faker->numberBetween($min = 4, $max = 11),
            'weight' => $faker->numberBetween($min = 1000, $max = 40000),
            'miles' => $faker->numberBetween($min = 200, $max = 2000),
            'billing_money' => $faker->numberBetween($min = 200, $max = 2000),
            'offer_money' => $faker->numberBetween($min = 200, $max = 2000),
            'post_money' => $faker->numberBetween($min = 200, $max = 2000),
        
    ];
});




