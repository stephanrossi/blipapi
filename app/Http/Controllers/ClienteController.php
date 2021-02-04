<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['listAll']]);
    }

    public function listAll($cnpj)
    {

        $cliente = Cliente::select(['NOME', 'STATUSEMPRESA'])
            ->where('CNPJ', $cnpj)
            ->get();

        // print_r($cliente);

        if (!$cliente) {
            return response()->json([
                'error' => true,
                'msg' => 'Nenhum cliente encontrado.'
            ]);
        }

        return response()->json([
            'error' => false,
            'data' => $cliente
        ]);
    }
}