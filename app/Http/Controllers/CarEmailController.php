<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewcarproductEmail;

class CarEmailController extends Controller
{
    public function send(Car $car)
    {
        Mail::to('ipt2@lentrix-dev.com')
            ->send(new NewcarproductEmail($car));


        return back()->with('success', 'Email sent successfully!');
    }
}
