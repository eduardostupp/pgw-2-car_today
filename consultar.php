<?php
// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';
?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center">
            <div class="col s12">
                <h3 class="light">Estoque de carros</h3>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Descrição</th>
                            <th>Mod/Fab</th>
                            <th>Cor</th>
                            <th>Placa</th>
                            <th>Valor (R$)</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM estoque";
                            $resultado = mysqli_query($connect, $sql);
                            while ($dados = mysqli_fetch_array($resultado)):
                        ?>
                        <tr>
                            <td><?php echo $dados['marca'] ?></td>
                            <td><?php echo $dados['modelo'] ?></td>
                            <td><?php echo $dados['descricao'] ?></td>
                            <td><?php echo $dados['mod_fab'] ?></td>
                            <td><?php echo $dados['cor'] ?></td>
                            <td><?php echo $dados['placa'] ?></td>
                            <td><?php echo $dados['valor'] ?></td>
                            <td>
                                <a href="comprar.php?id=<?php echo $dados['id']; ?>" class="btn-large waves-effect waves-light ciano">
                                    Comprar
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>
