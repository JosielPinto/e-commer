<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;

class MailController extends Controller
{
    public function sendEmail(){
        $details=[
            'title' => 'Correo De Aviso de Compra',
            'body' => 'Este Es un ejemplo para enviar correos'
        ];
        Mail::to('josielpinto16@gmail.com')->send(new ContactanosMailable($details));
        return "Correo Enviado";
    }
}
