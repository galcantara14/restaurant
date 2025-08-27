<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model{
    
    //função para pegar o cardápio de bebidas
    public function getCardapioBebidas($con){

        $table = "cardapio";
        $columns = "nome, descricao, preco";
        $where = "where tipo = 'bebida'";
        $order = "order by tipo";

        $select = "select $columns from $table $where $order";
        $from =  array("nome","descricao", "preco");
        $result = $con->query($select);

        $cardapio = $this->fetch($result, $from, $from);
        //var_dump($cardapio);

        if($cardapio){
            return $cardapio;
        } else {
            return false;
        }
    }

    //função para pegar o cardápio de comidas
    public function getCardapioComidas($con){

        $table = "cardapio";
        $columns = "nome, descricao, preco";
        $where = "where tipo = 'comida'";
        $order = "order by tipo";

        $select = "select $columns from $table $where $order";
         $from =  array("nome","descricao", "preco");
        $result = $con->query($select);

        $cardapio = $this->fetch($result, $from, $from);
        //var_dump($cardapio);

        if($cardapio){
            return $cardapio;
        } else {
            return false;
        }
    }

    //função para pegar o cardápio de sobremesas
    public function getCardapioSobremesas($con){

        $table = "cardapio";
        $columns = "nome, descricao, preco";
        $where = "where tipo = 'sobremesa'";
        $order = "order by tipo";

        $select = "select $columns from $table $where $order";
        $from =  array("nome","descricao", "preco");
        $result = $con->query($select);

        $cardapio = $this->fetch($result, $from, $from);
        //var_dump($cardapio);

        if($cardapio){
            return $cardapio;
        } else {
            return false;
        }
    }
    // Função para transformar o resultado em array
    public function fetch($result,$from,$to){
        $info = false;
        if($result && $result->num_rows > 0){
            $count = 0;
            while ($row = $result->fetch_assoc()){
                for ($i=0; $i < sizeof($from); $i++) {
                    $info[$count][$to[$i]] = $row[$from[$i]];  				
                }
                $count++;
            }
        }

        return $info;

    }

    // Função para reservar uma mesa
    public function reserva($data, $con){

        //verificação de capacidade da mesa pode ser feita aqui
        // Exemplo: se mais de 10 pessoas, retornar erro
        
        $select = "SELECT COUNT(*) as total FROM reservas WHERE data_reserva = ?";
        $stmt = $con->prepare($select);
        $stmt->bind_param("s", $data['data']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $totalReservas = $row['total'];
        $maxReservas = 10; // Defina o limite máximo de reservas por dia
        if ($totalReservas >= $maxReservas) {
            return "Desculpe, não há mais mesas disponíveis para a data selecionada.";
        }else{
            // Prepara a insert query        
            $stmt = $con->prepare("INSERT INTO reservas (nome, email, data_reserva, qtd_pessoas, telefone) VALUES (?, ?, ?, ?, ?)");

            if(!$stmt){
                // Retorna erro caso a preparação falhe
                return "Erro na preparação: " . $con->error;
            }

            // Bind dos parâmetros
            $stmt->bind_param(
                "sssds",  // tipos: s=string, d=double/integer
                $data['nome'],
                $data['email'],
                $data['data'],
                $data['pessoas'],
                $data['telefone']
            );
        // var_dump($stmt);
            // Executa
            if($stmt->execute()){
                return true; // sucesso
            } else {
                return "Erro na execução: " . $stmt->error;
            }
    
        }

    }
}
