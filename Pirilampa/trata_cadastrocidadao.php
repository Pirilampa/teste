<?php

require __DIR__."/conexao-db.php";
require __DIR__."/src/CadastroCidadao.php";

$cadastroCidadao = new CadastroCidadao($conn);

if (isset($_POST['dataNascimentoCidadao']) && !empty($_POST['dataNascimentoCidadao'])) {
    $dataNascimento = DateTime::createFromFormat('Y-m-d', $_POST['dataNascimentoCidadao']);
    if ($dataNascimento !== false) {
        $cadastroCidadao->dataNascimentoCidadao = $dataNascimento->format('Y-m-d');
    } else {
        die('Erro: Data de nascimento inválida.');
    }
} else {
    die('Erro: Data de nascimento não pode ser nula.');
}

$cadastroCidadao->cpfCidadao = isset($_POST['cpfCidadao']) ? $_POST['cpfCidadao'] : '';
$cadastroCidadao->nomeCidadao = isset($_POST['nomeCidadao']) ? $_POST['nomeCidadao'] : '';
$cadastroCidadao->cnsCidadao = isset($_POST['cnsCidadao']) ? $_POST['cnsCidadao'] : '';
$cadastroCidadao->racaCor = isset($_POST['racaCor']) ? intval($_POST['racaCor']) : null; // Converte para inteiro
$cadastroCidadao->fone = isset($_POST['fone']) ? $_POST['fone'] : '';
$cadastroCidadao->email = isset($_POST['email']) ? $_POST['email'] : '';
$cadastroCidadao->bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cadastroCidadao->cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$cadastroCidadao->codigoIbgeMunicipio = isset($_POST['codigoIbgeMunicipio']) ? $_POST['codigoIbgeMunicipio'] : '';
$cadastroCidadao->complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
$cadastroCidadao->nomeLogradouro = isset($_POST['nomeLogradouro']) ? $_POST['nomeLogradouro'] : '';
$cadastroCidadao->numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$cadastroCidadao->numeroDneUf = isset($_POST['numeroDneUf']) ? $_POST['numeroDneUf'] : '';


$resultado = $cadastroCidadao->criar_cadastroCidadao ();
?>