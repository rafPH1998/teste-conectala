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
        try {
            $users = $this->user->getAll();
            return response()->json(['data' => $users], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao obter a lista de usuários.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'name'     => 'required|string|min:2|max:150',
                'email'    => 'required|email',
                'password' => 'required|min:4|max:100',
            ]);

            $users = $this->user->createNewUser($data);
            return response()->json(['data' => $users], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Erro de validação dos dados.',
                'message' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar um novo usuário.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $user = User::find($id);

            if (! $user) {
                abort(404);
            }
            return response()->json(['user' => $user]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Usuário não encontrado.'], 500);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
  
            $data = $request->validate([
                'name'     => 'nullable|string|min:2|max:150',
                'email'    => "nullable|email|unique:users,email,{$id}",
                'password' => 'nullable|min:4|max:100',
            ]);

            $user = User::find($id);

            if (! $user) {
                abort(404);
            }

            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            return response()->json(['data' => $user], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Erro de validação dos dados.',
                'message' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar o usuário. Usuário não encontrado.'], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $user = $this->user->deleteUser($id);
            
            if (!$user) {
                return response()->json([
                    'error' => 'Usuário não encontrado.',
                    'message' => 'O ID do usuário fornecido não existe.'
                ], 404);
            }
    
            $user->delete($id);
    
            return response()->json([
                'message' => 'Usuário deletado com sucesso.',
                'data' => []
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao deletar o usuário.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    
}
