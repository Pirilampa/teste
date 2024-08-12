<?php

class CadastroCidadao
{
    public string $cpfCidadao;
    public string $nomeCidadao;
    public string $cnsCidadao;
    public string $dataNascimentoCidadao;
    public int $racaCor;
    public string $fone;
    public string $email;
    public string $bairro;
    public string $cep;
    public string $codigoIbgeMunicipio;
    public string $complemento;
    public string $nomeLogradouro;
    public string $numero;
    public string $numeroDneUf;
}

function criar_cadastroCidadao($cadastroCidadao): array
{
    global $conn;
    // Preparando a query de inserção

    $query = "INSERT INTO cadastro_cidadao (
        cpfcidadao, 
        nomeCidadao, 
        cnsCidadao, 
        dataNascimentoCidadao, 
        racaCor, 
        fone, 
        email, 
        bairro, 
        cep, 
        codigoIbgeMunicipio, 
        complemento, 
        nomeLogradouro, 
        numero, 
        numeroDneUf
    ) VALUES (
       :cpfCidadao, :nomeCidadao, :cnsCidadao, :dataNascimentoCidadao, :racaCor, :fone, :email, :bairro, :cep, :codigoIbgeMunicipio, :complemento, :nomeLogradouro, :numero, :numeroDneUf
     )";

    try {
        // Preparar a query
       $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        // Vincular os parâmetros
        $stmt->bindParam(':cpfCidadao', $cadastroCidadao->cpfCidadao);
        $stmt->bindParam(':nomeCidadao', $cadastroCidadao->nomeCidadao);
        $stmt->bindParam(':cnsCidadao', $cadastroCidadao->cnsCidadao);
        $stmt->bindParam(':dataNascimentoCidadao', $cadastroCidadao->dataNascimentoCidadao);
        $stmt->bindParam(':racaCor', $cadastroCidadao->racaCor);
        $stmt->bindParam(':fone', $cadastroCidadao->fone);
        $stmt->bindParam(':email', $cadastroCidadao->email);
        $stmt->bindParam(':bairro', $cadastroCidadao->bairro);
        $stmt->bindParam(':cep', $cadastroCidadao->cep);
        $stmt->bindParam(':codigoIbgeMunicipio', $cadastroCidadao->codigoIbgeMunicipio);
        $stmt->bindParam(':complemento', $cadastroCidadao->complemento);
        $stmt->bindParam(':nomeLogradouro', $cadastroCidadao->nomeLogradouro);
        $stmt->bindParam(':numero', $cadastroCidadao->numero);
        $stmt->bindParam(':numeroDneUf', $cadastroCidadao->numeroDneUf);


      // Executar a query
       $stmt->execute();

     echo "Dados inseridos com sucesso!";

        return ['success' => true, 'message' => 'Dados inseridos com sucesso!'];
    } catch (PDOException $e) {
        // Tratar erros de execução da query
        die('Erro ao inserir dados: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Erro ao inserir dados: ' . $e->getMessage()];
    }

    // Caso a execução chegue aqui por algum motivo, retornamos um array padrão
    return ['success' => false, 'message' => 'Função chegou ao fim inesperadamente.'];

    // Fechar a conexão
    $conn = null;

}