<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Customer;
use App\Mail\AnnouncementMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcements.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // 1. Store in DB
        $announcement = Announcement::create($request->only('title', 'description'));

        // 2. Send email to customers
        $customers = Customer::pluck('email');



        foreach ($customers as $email) {
            Mail::to($email)->send(new AnnouncementMail($announcement));
        }

        return redirect()->back()->with('success', 'Announcement sent successfully!');
    }
}

