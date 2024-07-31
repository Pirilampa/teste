<?php
// Configurações do banco de dados
$host = "localhost";
$port = "5434";
$dbname = "postgres";
$user = "postgres";
$password = "pts2024";

// Criar conexão com o PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificar conexão
if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

// Função para obter o valor de um campo de forma segura
function get_post_value($key)
{
    return isset($_POST[$key]) ? $_POST[$key] : '';
}

// Função para converter um valor para BIGINT ou NULL
function get_bigint_value($value) {
    return (is_numeric($value) && $value != '') ? (int)$value : NULL;
}

// Capturar dados do formulário
$nome = get_post_value('nome');
$cns = get_post_value('cns');
$cpf = get_post_value('cpf');
$data_nascimento = get_post_value('data_nascimento');
$raca_cor = get_post_value('raca_cor');
$telefone = get_post_value('telefone');
$email = get_post_value('email');
$cep = get_post_value('cep');
$endereco = get_post_value('endereco');
$bairro = get_post_value('bairro');

print ($data_nascimento);

// Conversão de valores que devem ser números inteiros (bigint)
//$cns = get_bigint_value($cns);
//$cpf = get_bigint_value($cpf);
//$telefone = get_bigint_value($telefone);
//$cep = get_bigint_value($cep);
//$data_nascimento = get_bigint_value($data_nascimento);
//$raca_cor = get_bigint_value($raca_cor);

// Depuração: verificar valores
var_dump($cns, $cpf, $telefone, $cep, $raca_cor, $data_nascimento);

// Inserir dados no banco de dados
$query = "INSERT INTO cadastrocidadao (nomeCidadao, cnsCidadao, cpfCidadao, datanascimentocidadao, racaCor, telefone, email, cep, nomeLogradouro, bairro)
VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)";
$result = pg_query_params($conn, $query, array($nome, $cns, $cpf, $data_nascimento, $raca_cor, $telefone, $email, $cep, $endereco, $bairro));

// Verificar se a inserção foi bem-sucedida
if ($result) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . pg_last_error($conn);
}

// Fechar conexão
pg_close($conn);
?>
