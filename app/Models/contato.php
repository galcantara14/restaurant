<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contato extends Model{
// Verifica se o formulário foi submetido

   public function enviarEmail($data){
    $destinatario = "gabriela.alcantara.trabalho@gmail.com"; 
    $assunto = "Nova mensagem do formulário de contato";

    $nome = $data['name'];
    $email = $data['email'];
    $mensagem = $data['message'];

    if (empty($nome) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($mensagem)) {
        return "Por favor, preencha todos os campos corretamente.";
    }

    $conteudo = "Nome: $nome\n";
    $conteudo .= "Email: $email\n\n";
    $conteudo .= "Mensagem:\n$mensagem\n";

    $headers = "From: $nome <$email>";

    if (mail($destinatario, $assunto, $conteudo, $headers)) {
        return true;
    } else {
        return "Erro ao enviar e-mail.";
    }
}

}
