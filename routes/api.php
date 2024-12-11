<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    return response() -> json([
        'starus' => true,
        'message' => 'Listar de usuários',
    ], 200);
});
