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
     
            'customer_name' => "United Rentals",
            'customer_address' => $faker->streetAddress(),
            'customer_city' => $faker->city(),
            'customer_state' => $faker->state(),
            'customer_zip' => $faker->postcode(),
            'customer_contact' => "John Stevens",
            'customer_email' => "mikecornille@gmail.com",
            'customer_phone' => "877-663-2200",
            'customer_fax' => $faker->phoneNumber(),
            'carrier_name' => "Awesome Road Hauling, Inc.",
            'carrier_address' => $faker->streetAddress(),
            'carrier_city' => $faker->city(),
            'carrier_state' => $faker->state(),
            'carrier_zip' => $faker->postcode(),
            'carrier_contact' => "Liberty Bell",
            'carrier_email' => "mikec@itransys.com",
            'carrier_phone' => "630-750-1718",
            'carrier_fax' => $faker->phoneNumber(),
            'carrier_driver_name' => "Steven Jacoby",
            'carrier_driver_cell' => "630-750-1718",
            'pick_company' => "Herc Rentals",
            'pick_address' => $faker->streetAddress(),
            'pick_city' => $faker->city(),
            'pick_state' => $faker->state(),
            'pick_zip' => $faker->postcode(),
            'pick_contact' => "Neerly Uptownton",
            'pick_phone' => "877-663-2200",
            'pick_email' => "mikecornille@gmail.com",
            'pick_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'pick_time' => $faker->word(),
            'pick_status' => "Booked",
            'delivery_company' => "Blueline Rentals",
            'delivery_address' => $faker->streetAddress(),
            'delivery_city' => $faker->city(),
            'delivery_state' => $faker->state(),
            'delivery_zip' => $faker->postcode(),
            'delivery_contact' => $faker->name(),
            'delivery_phone' => "877-663-2200",
            'delivery_email' => "mikecornille@gmail.com",
            'delivery_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'delivery_time' => $faker->word(),
            'delivery_status' => "En Route",
            'po_number' => $faker->word(),
            'ref_number' => $faker->word(),
            'bol_number' => $faker->word(),
            'created_by' => $faker->email(),
            'its_group' => $faker->word(),
            'amount_due' => 950,
            'carrier_rate' => 850,
            'billed_date' => "03/12/2018",
            'approved_carrier_invoice' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'commodity' => "5 Forklifts and 6 scissor lifts",
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
            'carrier_message' => "Hey, what time will you pick up today?",
            'internal_email_address' => "mikec@itransys.com",
            'internal_message' => $faker->sentence(),
            'creation_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'routing_number' => $faker->numberBetween($min = 100000000, $max = 800000000),
            'account_number' => $faker->numberBetween($min = 100000, $max = 800000),
            'account_type' => "Checking",
            'account_name' => "First Third National Trust",
            'payment_method' => "ACH",
            'paid_amount_from_customer' => "950",
            'payment_method_from_customer' => "CHECK",
            'ref_or_check_num_from_customer' => NULL,
            'carrierPayStatus' => "PAID",
            'customerPayStatus' => "PAID",
            'carrier_id' => 36000,
            'customer_id' => "2500",
            'totalCheckAmountFromCustomer' => "950",
            'deposit_date' => "03/15/2018",
            
            
            
            // 'vendor_check_number' => NULL,

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
            'remit_name' => $faker->word(),
            'remit_address' => $faker->streetAddress(),
            'remit_city' => $faker->city(),
            'remit_state' => $faker->state(),
            'remit_zip' => $faker->postcode(),
            'load_info' => $faker->sentence(),
            'permanent_notes' => $faker->sentence(),
            'ach_token' => str_random(60),
        
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
            'handler' => $faker->name(),
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





