<?php
// Conexão com o banco de dados
include_once 'php_action/db_connect.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados necessários foram recebidos
    if (isset($_POST['carro_id']) && isset($_POST['valor'])) {
        // Sanitiza os dados recebidos
        $carro_id = mysqli_real_escape_string($connect, $_POST['carro_id']);
        $valor = mysqli_real_escape_string($connect, $_POST['valor']);

        // Inicia uma transação SQL para garantir integridade dos dados
        mysqli_begin_transaction($connect);

        // 1. Insere a compra na tabela compras
        $sql_compra = "INSERT INTO compras (carro_id, valor) VALUES ('$carro_id', '$valor')";
        
        // Executa a consulta de inserção
        if (mysqli_query($connect, $sql_compra)) {
            // 2. Remove o carro da tabela estoque
            $sql_remove_carro = "DELETE FROM estoque WHERE id = '$carro_id'";
            
            // Executa a consulta de remoção
            if (mysqli_query($connect, $sql_remove_carro)) {
                // Confirma a transação
                mysqli_commit($connect);
                // Mensagem de sucesso
                $mensagem = "Compra finalizada com sucesso! O carro foi removido do estoque.";
                $mensagem_class = "msg-success";
            } else {
                // Rollback em caso de erro na remoção
                mysqli_rollback($connect);
                // Mensagem de erro na remoção
                $mensagem = "Erro ao remover o carro do estoque: " . mysqli_error($connect);
                $mensagem_class = "msg-error";
            }
        } else {
            // Rollback em caso de erro na inserção da compra
            mysqli_rollback($connect);
            // Mensagem de erro na compra
            $mensagem = "Erro ao finalizar a compra: " . mysqli_error($connect);
            $mensagem_class = "msg-error";
        }

        // Fechamento da conexão
        mysqli_close($connect);
    } else {
        // Dados não recebidos corretamente
        $mensagem = "Dados incompletos para finalizar a compra.";
        $mensagem_class = "msg-error";
    }
} else {
    // Página acessada diretamente sem submissão de formulário
    $mensagem = "Acesso inválido.";
    $mensagem_class = "msg-error";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .msg-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .msg-success {
            color: #4CAF50;
        }

        .msg-error {
            color: #FF5733;
        }
    </style>
</head>
<body>
    <div class="msg-box <?php echo $mensagem_class; ?>">
        <h2><?php echo $mensagem; ?></h2>
        <p>Redirecionando de volta...</p>
    </div>
    <script>
        // Redireciona de volta após 3 segundos
        setTimeout(function() {
            window.location.href = 'consultar.php';
        }, 3000);
    </script>
</body>
</html>
