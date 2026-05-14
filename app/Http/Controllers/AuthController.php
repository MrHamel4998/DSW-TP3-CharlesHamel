<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * AuthController
 *
 * NOTE :
 * Ce contrôleur a été entièrement refactorisé avec l'aide d'une intelligence artificielle (ChatGPT)
 * dans un objectif de gain de temps.
 * L'objectif de ce TP n'étant pas de développer un système d'auth complet from scratch,
 * une version simplifiée et fonctionnelle a été mise en place.
 *
 * L'implémentation précédente ne correspondait pas correctement aux conventions et contraintes
 * du modèle User Laravel utilisé dans ce projet (mismatch avec les champs, validation et hashing).
 *
 * Ce refactoring a été réalisé uniquement pour corriger l'intégration et assurer la compatibilité
 * avec la structure de la base de données et les règles Laravel standards.
 *
 * Le but du travail pratique reste l'apprentissage des concepts, pas l'optimisation de l'authentification.
 */

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->input('roleId', 1),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User created successfully',
            'user' => new UserResource($user),
            'token' => $token,
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'user' => new UserResource(auth()->user()),
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out',
        ]);
    }
}