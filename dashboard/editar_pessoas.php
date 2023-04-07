<?php
require_once "view/topo.php";
require_once "view/lateral.php";
require_once "../adm/conexao.php";

if(isset($_GET['id'])){
    $sql =" SELECT * FROM pessoas WHERE id = :id";
    $comando = $pdo -> prepare($sql);
    $comando -> bindValue(":id",$_GET["id"]);
    $comando -> execute();
    $pessoas = $comando -> fetch();
}else{
    header("Location: index_dash.php");
}

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div>
        <form method="POST" action="processa/proc_editar_pessoas.php">
            <br>
            <label for="nome">Nome: </label><br>
            <input type="text" name="nome" size="40" value="<?php echo $pessoas["nome"];?>"/><br><br>
            <label for="cpf">CPF: </label><br>
            <input type="text" name="cpf" value="<?php echo $pessoas["cpf"];?>"/><br><br>
            <label for="senha">Senha:</label><br>
            <input type="text" name="senha" value="<?php echo"**SENHA**";?>"/><br><br>
            <label for="tipo_user">Tipo de Usuario: </label><br>
            <input type="text" name="tipo_user" value="<?php echo $pessoas["tipo_user"];?>"/><br><br>
            <label for="data_nasc">Data de Nascimento: </label><br>
            <input type="date" name="data_nasc" value="<?php echo $pessoas["data_nasc"];?>"/><br><br>    
            <input type="hidden" name="id" value="<?php echo $pessoas["id"];?>"/>
            <input type="submit" class="btn btn-success" value="Salvar"> <a href="./index_dash.php" class="btn btn-danger"> cancelar</a>
        </form>

    </div>
    
</main>

<?php
require_once "view/rodape.php";
?>




