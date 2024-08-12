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

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    function criar_cadastroCidadao(): array
    {
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
            $stmt = $this->conn->prepare($query);

            if (!$stmt) {
                die("Erro na preparação da consulta: " . $conn->error);
            }

            // Vincular os parâmetros
            $stmt->bindParam(':cpfCidadao', $this->cpfCidadao);
            $stmt->bindParam(':nomeCidadao', $this->nomeCidadao);
            $stmt->bindParam(':cnsCidadao', $this->cnsCidadao);
            $stmt->bindParam(':dataNascimentoCidadao', $this->dataNascimentoCidadao);
            $stmt->bindParam(':racaCor', $this->racaCor);
            $stmt->bindParam(':fone', $this->fone);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':bairro', $this->bairro);
            $stmt->bindParam(':cep', $this->cep);
            $stmt->bindParam(':codigoIbgeMunicipio', $this->codigoIbgeMunicipio);
            $stmt->bindParam(':complemento', $this->complemento);
            $stmt->bindParam(':nomeLogradouro', $this->nomeLogradouro);
            $stmt->bindParam(':numero', $this->numero);
            $stmt->bindParam(':numeroDneUf', $this->numeroDneUf);


            // Executar a query
            $stmt->execute();

            echo "Dados inseridos com sucesso!";

            return ['success' => true, 'message' => 'Dados inseridos com sucesso!'];
        } catch (PDOException $e) {
        // Tratar erros de execução da query
            die('Erro ao inserir dados: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Erro ao inserir dados: ' . $e->getMessage()];
        }
    }
}