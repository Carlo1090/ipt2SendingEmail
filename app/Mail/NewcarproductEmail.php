<?php

namespace App\Mail;

use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewcarproductEmail extends Mailable
{
    use Queueable, SerializesModels;

    public Car $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Car Product',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-car',
            with: [
                'car' => $this->car,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
