<?php
// Dados de conexão ao banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancoDados = 'etec';

// Criar conexão
$conexao = new mysqli($host, $usuario, $senha, $bancoDados);

// Verificar se a conexão foi estabelecida com sucesso
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Executar uma consulta SELECT na tabela "produto"
$sql = "SELECT NomeProd, PrecoUnit, CodProduto FROM produto";
$resultado = $conexao->query($sql);

// Verificar se ocorreu um erro na consulta
if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

// Verificar se a consulta retornou resultados
if ($resultado->num_rows > 0) {
    // Iterar sobre os resultados e exibi-los
    while ($row = $resultado->fetch_assoc()) {
        echo "<br><table><b>Fruta: </b>" . $row['NomeProd'] . "<br><b>Preço Unitário: </b> " . $row['PrecoUnit'] . "<br><b>Codigo Produto: </b> " . $row['CodProduto'] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechar a conexão
$conexao->close();
?>