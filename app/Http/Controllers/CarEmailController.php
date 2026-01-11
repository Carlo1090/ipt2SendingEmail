<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewcarproductEmail;

class CarEmailController extends Controller
{
    public function send(Car $car)
    {
        foreach ($car->customers as $customer) {
            Mail::to($customer->email)
                ->send(new NewcarproductEmail($car));
        }

        return back()->with('success', 'Emails sent successfully!');
    }
}
