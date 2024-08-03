<?php
// Configurações do banco de dados
/*
$host = 'localhost';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'P1r1l@mp@';
*/

include 'db.php';

// Conexão com o banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro na conexão com o banco de dados.");
}

// Verificando se os dados foram enviados pelo formulário
if (!empty($_POST)) {
    // Recebendo dados do formulário
    $cpfCidadao = $_POST['cpfCidadao'];
    $nomeCidadao = $_POST['nomeCidadao'];
    $cnsCidadao = $_POST['cnsCidadao'] ?? null; // CNS pode ser null
    $dataNascimentoCidadao = ($_POST['dataNascimentoCidadao']);
    $racaCor = $_POST['racaCor'];
    $fone = $_POST['fone'] ?? null; // Telefone pode ser null
    $email = $_POST['email'] ?? null; // Email pode ser null
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $codigoIbgeMunicipio = $_POST['codigoIbgeMunicipio'];
    $complemento = $_POST['complemento'] ?? null; // Complemento pode ser null
    $nomeLogradouro = $_POST['nomeLogradouro'];
    $numero = $_POST['numero'];
    $numeroDneUf = $_POST['numeroDneUf'];

 /*
   $dataNascimentoCidadao = strtotime($_POST['dataNascimentoCidadao']);
    if ($dataNascimentoCidadao === false) {
        echo "Data inválida fornecida.";
    } else {
        echo "Data formatada: " . date('d/m/Y', $dataNascimentoCidadao); // ou o formato desejado
    }
*/

    // Depuração: Exibindo os valores recebidos
    echo "<pre>";
    echo "CPF: $cpfCidadao\n";
    echo "Nome: $nomeCidadao\n";
    echo "CNS: $cnsCidadao\n";
    echo "Data de Nascimento: $dataNascimentoCidadao\n";
    echo "Raça/Cor: $racaCor\n";
    echo "Telefone: $fone\n";
    echo "Email: $email\n";
    echo "Bairro: $bairro\n";
    echo "CEP: $cep\n";
    echo "Código IBGE Município: $codigoIbgeMunicipio\n";
    echo "Complemento: $complemento\n";
    echo "Nome Logradouro: $nomeLogradouro\n";
    echo "Número: $numero\n";
    echo "Número DNE UF: $numeroDneUf\n";
    echo "</pre>";




    // Preparando a query de inserção
    $query = "INSERT INTO cadastro_cidadao (
        cpfCidadao, 
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
        $1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14
    )";

    $params = array(
        $cpfCidadao,
        $nomeCidadao,
        $cnsCidadao,
        $dataNascimentoCidadao,
        $racaCor,
        $fone,
        $email,
        $bairro,
        $cep,
        $codigoIbgeMunicipio,
        $complemento,
        $nomeLogradouro,
        $numero,
        $numeroDneUf
    );

    // Executando a query
    $result = pg_query_params($conn, $query, $params);

    if ($result) {
        echo "Cadastro realizado com sucesso.";
    } else {
        echo "Erro ao realizar o cadastro: " . pg_last_error($conn);
    }
} else {
    echo "Erro: dados do formulário não foram recebidos.";
}

// Fechando a conexão
pg_close($conn);
?>
