<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataBase;
use App\Models\menu;

class MainController extends Controller
{
    public function cardapioGet(){

        $db = new dataBase();
        
        // Abre a conexão com o banco de dados
        $default = $db->defaultConnection();
        $con = $db->openConnection($default);

        $menu = new menu();

        // Pega os cardápios de bebidas, sobremesas e comidas
        $bebidas = $menu->getCardapioBebidas($con);
        $sobremesas = $menu->getCardapioSobremesas($con);
        $comidas = $menu->getCardapioComidas($con);
        
        if(!$bebidas || !$sobremesas || !$comidas){
            return redirect()->back()->with('error', 'Erro ao carregar o cardápio.');
        }

        $cardapio = [
            'bebidas' => $bebidas,
            'sobremesas' => $sobremesas,
            'comidas' => $comidas
        ];

       return view("menus.cardapioGet" , compact('cardapio'));
    }

    public function reserva(Request $request){

        $db = new dataBase();
        
        $default = $db->defaultConnection();
        $con = $db->openConnection($default);

        $menu = new menu();
        // Acessar os dados do formulário
        //dd($request->all());

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'data' => 'required|date',
            'telefone' => 'required',
            'pessoas' => 'required|integer|min:1',
        ]);

        //tratamento dos dados

        $data['telefone'] = preg_replace('/[^0-9]/', '', $data['telefone']); // Remove caracteres não numéricos
        $data['telefone'] = trim(substr($data['telefone'], 0, 11)); // Limita o tamanho do telefone a 11 dígitos e remove espaços

        // Chama a função reserva do modelo menu
        $reserva = $menu->reserva($data, $con);
        // Exibe os dados da reserva para depuração
        // dd($reserva);

        if ($reserva === true) {
            echo json_encode(['success' => true, 'message' => 'Reserva realizada com sucesso!']);
        } else {
            echo json_encode(['success' => false, 'message' => $reserva]); // $reserva pode conter erro do mysqli
        }
    }
}
