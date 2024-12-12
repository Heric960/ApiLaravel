<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    /**
     * Retorna uma lista paginada de usuários.
     * 
     * Este método recupera uma lista paginada de usuários do banco de dados
     * e a retorna como uma resposta JSON
     * 
     * @return \illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        // Recupera os usuários do banco de dados, ordenados pelo id em ordem decrescente, paginados
        $users = User::orderBy('id', 'DESC')->paginate(2);

        // Retorna os usuários recuperados como uma resposta JSON
        return response() -> json([
            'starus' => true,
            'users' => $users,
        ], 200);

    }

    /**
     * Exibe os detalhes de um usuário específico.
     * 
     * Este método retorna os detalhes de um usuários especifíco em formato JSON.
     * 
     * @param \App\Models\User $user O objeto do usuário a ser exibido
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        // Retorna os detalhes do usuário em fomato JSON
        return response() -> json([
            'starus' => true,
            'user' => $user,
        ], 200);

    }

    public function store(Request $request)
    {
        // Iniciar a transação
        DB::beginTransaction();

        try
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password

            ]);

            // Operação é concluida 
            DB::commit();

            return response() -> json([
                'starus' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso!",
            ], 201);
        }
        catch(Exception $e)
        {

            // Operação não é cnocluida com êxito
            DB::rollBack();

            // Retorna uma mensagem de erro com statua 400
            return response() -> json([
                'starus' => false,
                'message' => "Usuário não cadastrado!",
            ], 400);

        }
    }
}
