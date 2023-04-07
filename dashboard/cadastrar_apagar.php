<?php
require_once "view/topo.php";
require_once "view/lateral.php";

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div>
        <form method="POST" action="processa/proc_cadastrar_pessoas.php">
            <br>
            <label for="nome">Nome: </label><br>
            <input type="text" name="nome"><br><br>
            <label for="cpf">CPF: </label><br>
            <input type="text" name="cpf"><br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha"><br><br>
            <label for="tipo_user">Tipo de Usuario: </label><br>
            <input type="text" name="tipo_user"><br><br>
            <label for="data_nasc">Data de Nascimento: </label><br>
            <input type="date" name="data_nasc"><br><br>    
            <input type="submit" class="btn btn-success" value="Cadastrar">
        </form>

    </div>
</main>

<?php
require_once "view/rodape.php";
?>




