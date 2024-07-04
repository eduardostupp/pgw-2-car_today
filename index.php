<?php
// Header
include_once 'includes/header.php';
?>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center">
            <div class="col s12 m6 l6 xl6">
                <h1 class="header center">
                    Sistema de compra e venda de veículos
                </h1>
                <!-- Opção para comprar veículos -->
                <a href="consultar.php" id="buy-button" class="btn-large waves-effect waves-light ciano">
                    Comprar Veículos
                </a>
                <br><br>
                <!-- Opção para vender veículos -->
                <a href="adicionar.php" id="sell-button" class="btn-large waves-effect waves-light ciano">
                    Vender Veículos
                </a>
            </div>
            <div class="col s12 m6 l6 xl6">
                <img src="assets/imagens/padrão_vertical.svg" alt="Logo padrão de Car Today em um fundo azul claro">
            </div>
        </div>
        <br><br>

    </div>
</div>
<?php
// Footer
include_once 'includes/footer.php';
?>
