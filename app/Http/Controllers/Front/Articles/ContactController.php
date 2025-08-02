<?php

namespace App\Http\Controllers\Front\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('front.web.articles.contact.contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:15',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:25|max:5000',
        ]);

        try {
            // Send email
            Mail::to('industrialgrupo.emi@gmail.com')->send(new ContactMail($validated));

            return back()->with('message', '¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente. Nos pondremos en contacto contigo lo antes posible.');
        } catch (\Exception $e) {
            return back()->with('error', '¡Lo sentimos! Hubo un error. Por favor, inténtalo nuevamente más tarde.');
        }
    }
}
