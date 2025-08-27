<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataBase;
use App\Models\menu;
use App\Models\contato;

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
        try {
           $db = new dataBase();
        
            $default = $db->defaultConnection();
            $con = $db->openConnection($default);

            $menu = new menu();
            // Acessar os dados do formulário
           // dd($request->all());

            $data = $request->validate([
                'nomeReserva' => 'required|string|max:255',
                'emailReserva' => 'required|email|max:255',
                'datepicker' => 'required',
                'phone' => 'required',
                'numPessoasReserva' => 'required|integer|min:1',
            ]);                 
            
            //tratamento dos dados            
            $data['phone'] = preg_replace('/[^0-9]/', '', $data['phone']); // Remove caracteres não numéricos
            $data['phone'] = trim(substr($data['phone'], 0, 11)); // Limita o tamanho do telefone a 11 dígitos e remove espaços

            // Mapeia para os nomes esperados no banco
            $data = [
                'nome' => $data['nomeReserva'],
                'email' => $data['emailReserva'],
                'data' => $data['datepicker'],
                'telefone' => $data['phone'],
                'pessoas' => $data['numPessoasReserva'],
            ];

            // Chama a função reserva do modelo menu
            $reserva = $menu->reserva($data, $con);

            // Exibe os dados da reserva para depuração
            //dd($reserva);

            if ($reserva === true) {
                echo json_encode(['success' => true, 'message' => 'Reserva realizada com sucesso!']);
            } else {
                echo json_encode(['success' => false, 'message' => $reserva]); // $reserva pode conter erro do mysqli
            }
            
        } catch (\Illuminate\Validation\ValidationException $e) {
          
            return response()->json([
                'success' => false,
                'message' => 'Erro na validação.',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro no servidor.',
                'error' => $e->getMessage()
            ], 500);
        }   
    }

    public function contato(Request $request) {

        $contato = new contato();
        //Validação dos dados 
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensagem' => 'required|string|min:10',
        ]);

        //tratar os dados se necessário
        $validated['nome'] = htmlspecialchars(strip_tags(trim($validated['nome'])));
        $validated['mensagem'] = htmlspecialchars(strip_tags(trim($validated['mensagem'])));

        // Lógica para enviar o e-mail
        // (Certifique-se que seu arquivo .env está configurado para envio de e-mail)
        
        $envio = $contato->enviarEmail($validated);
        if ($envio === true) {
            return response()->json(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
        } else {
            return response()->json(['success' => false, 'message' => $envio]); // $envio pode conter erro do mail
        }
    }
}
