<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserPostRequest;

class RegisterController extends Controller
{
    /**
     * Creacíón de un nuevo usuario.
     */
    public function store(UserPostRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);

        $user = new User();
        $request->password = Hash::make($request->password);

        $user->fill($request->all())->save();

        return response()->json([
            'message' => 'Usuario creado con éxito',
            'usuario' => $user
        ], 201);
    }
}
