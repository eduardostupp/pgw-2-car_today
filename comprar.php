<?php
// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';

// Verifica se o parâmetro ID foi passado
if (isset($_GET['id'])) {
    $carro_id = $_GET['id'];
    // Consulta para buscar os detalhes do carro pelo ID
    $sql = "SELECT * FROM estoque WHERE id = $carro_id";
    $resultado = mysqli_query($connect, $sql);
    $carro = mysqli_fetch_assoc($resultado);

    // Exemplo de exibição dos detalhes do carro
    if ($carro) {
        ?>
        <div class="section">
            <div class="container">
                <h3><?php echo $carro['marca'] . ' ' . $carro['modelo']; ?></h3>
                <p><strong>Descrição:</strong> <?php echo $carro['descricao']; ?></p>
                <p><strong>Ano de Fabricação/Modelo:</strong> <?php echo $carro['mod_fab']; ?></p>
                <p><strong>Cor:</strong> <?php echo $carro['cor']; ?></p>
                <p><strong>Placa:</strong> <?php echo $carro['placa']; ?></p>
                <p><strong>Valor:</strong> R$ <?php echo $carro['valor']; ?></p>
                <!-- Formulário para finalizar a compra -->
                <form action="finalizar_compra.php" method="post">
                    <!-- Campos ocultos para enviar o ID do carro -->
                    <input type="hidden" name="carro_id" value="<?php echo $carro['id']; ?>">
                    <input type="hidden" name="valor" value="<?php echo $carro['valor']; ?>">
                    <!-- Outros campos e botões para finalizar a compra -->
                    <button type="submit" class="btn-large waves-effect waves-light ciano">
                        Finalizar Compra
                    </button>
                </form>
            </div>
        </div>
        <?php
    } else {
        echo '<p>Carro não encontrado.</p>';
    }
} else {
    echo '<p>ID do carro não especificado.</p>';
}

// Footer
include_once 'includes/footer.php';
?>
