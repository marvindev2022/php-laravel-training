<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
    return 'Bem vindo a rota de teste da api!';
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function (Illuminate\Http\Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');
    $message = $request->input('message');

    Mail::send('emails.contact', ['name' => $name, 'email' => $email, 'message' => $message], function ($message) {
        $message->to('seu-email@exemplo.com', 'Nome do destinatário')->subject('Nova mensagem de contato');
    });

    return redirect('/contact')->with('success', 'Mensagem enviada com sucesso!');
});
