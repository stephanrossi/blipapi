<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['listOne', 'listAll', 'ping']]);
    }

    public function ping()
    {
        return response()->json(['msg' => 'Pong!']);
    }

    public function listOne($cnpj)
    {

        $cliente = Cliente::select(['NOME', 'STATUSEMPRESA as STATUS'])
            ->where('CNPJ', $cnpj)
            ->first();

        // echo $cliente->STATUS;

        if (!$cliente) {
            return response()->json([
                'error' => true,
                'msg' => 'Nenhum cliente encontrado com este CNPJ.'
            ], 200);
        }

        return response()->json([
            'error' => false,
            'data' => $cliente
        ], 200);
    }

    public function listAll()
    {

        // $offset = 10;
        $cliente = Cliente::select(['NOME', 'STATUSEMPRESA as STATUS'])
            // ->skip(10)
            // ->where('STATUSEMPRESA', 1)
            ->take(10)
            ->get();

        // print_r($cliente);

        return response()->json([
            'error' => false,
            'data' => $cliente
        ], 200);
    }
}
