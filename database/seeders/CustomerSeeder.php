<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'first_name' => 'John Carlo',
            'last_name'  => 'Mar',
            'email'      => 'johncarlomar160@gmail.com',
            'phone'      => '09703856815'
        ]);

        Customer::create([
            'first_name' => 'Carlo',
            'last_name'  => 'Gwapo',
            'email'      => 'carlogwapo160@gmail.com',
            'phone'      => '09703856814'
        ]);


    }
}
