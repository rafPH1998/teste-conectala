<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected User $user)
    { }

    public function index(): JsonResponse
    {
        $users = $this->user->getAll();
        return response()->json(['data' => $users]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'     => 'required|string|min:2|max:150',
            'email'    => 'required|email',
            'password' => 'required|min:4|max:100',
        ]);

        $users = $this->user->createNewUser($data);
        return response()->json(['data' => $users]);
    }

    
}
