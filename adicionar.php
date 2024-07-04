<?php
//Header
include_once 'includes/header.php';
?>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
        <div class="col s12">
            <h3 class="light">Adicionar carro</h3>
        </div>
        <form action="php_action/create.php" method="post">
            <div class="input-field col s12 m6">
                <input type="text" name="marca" id="marca">
                <label for="marca">Marca</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="modelo" id="modelo">
                <label for="modelo">Modelo</label>
            </div>
            <div class="input-field col s12 m8">
                <input type="text" name="descricao" id="descricao">
                <label for="descricao">Descrição</label>
            </div>
            <div class="input-field col s12 m4">
                <select name="mod_fab" id="mod_fab">
                    <option value="" disabled selected>Escolha o ano</option>
                    <?php
                    // Gerar opções de anos de 1980 a 2024
                    $ano_atual = date("Y");
                    for ($ano = 1980; $ano <= 2024; $ano++) {
                        echo "<option value='$ano'>$ano</option>";
                    }
                    ?>
                </select>
                <label for="mod_fab">Ano</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="cor" id="cor">
                <label for="cor">Cor</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="placa" id="placa">
                <label for="placa">Placa</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="kilometragem" id="kilometragem" pattern="[0-9]+" title="Apenas números são permitidos">
                <label for="kilometragem">Quilometragem (apenas números)</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="valor" id="valor" onkeyup="formatarValor(this)">
                <label for="valor">Valor (R$)</label>
            </div>
            <button type="submit" name="btn-adicionar" class="btn ciano">Adicionar</button>
        </form>
      </div>
      <br><br>

    </div>
</div>

<script>
// Função para formatar o valor como moeda brasileira (R$)
function formatarValor(elemento) {
    // Obtém o valor atual do campo
    var valor = elemento.value;

    // Remove caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Formata o valor como moeda (R$)
    valor = (parseInt(valor) / 100).toFixed(2).replace(".", ",");
    
    // Atualiza o valor no campo de entrada
    elemento.value = "R$ " + valor;
}
</script>

<?php
//Footer
include_once 'includes/footer.php';
?>
