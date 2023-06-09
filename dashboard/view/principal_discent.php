<?php
     require_once "../adm/conexao.php";
     $sql = "SELECT * FROM pessoas WHERE status=1 and tipo_user=2";
     $comando = $pdo ->  prepare($sql);
     $comando -> execute();

?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1> 
        <?php
        echo("usuario logado.: ".strtoupper($_SESSION['nome']));
      ?>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">PDF</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">XLS</button>
          </div>
          <!--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>-->
        </div>
      </div>

     <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

      
      <div>
        <h2>
            Manutenção Discentes
            <a class="btn btn-success" href="cadastrar_apagar.php">Cadastrar Pessoas</a>
        </h2>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">CPF</th>
              <th scope="col">NOME</th>
              <th scope="col">Tipo_User</th>
              <th scope="col">Data Nasc</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
              <th scope="col">Status</th>

            </tr>
          </thead>
          <tbody>
            <?php while($pessoas = $comando -> fetch(PDO::FETCH_ASSOC)){
              ?>
                  <tr>
                      <td><?php echo $pessoas["id"];?></td>
                      <td><?php echo $pessoas["cpf"];?></td>
                      <td><?php echo $pessoas["nome"];?></td>
                      <td>
                        <?php echo $pessoas["tipo_user"];
                        if($pessoas["tipo_user"]==1){
                          echo " (Professor)";
                        }else if($pessoas["tipo_user"]==2){
                          echo " (Discente)";
                        }else{
                          echo " (Visitante)";
                        }
                        ?>
                      </td>
                      <td><?php echo(date('d/m/y',strtotime($pessoas["data_nasc"])));?></td>
                      <td>
                        <a class="btn btn-sm btn-primary" href="editar_pessoas.php?id=<?php echo $pessoas["id"];?>">Editar</a>
                      </td>
                      <td>
                        <a class="btn btn-sm btn-danger" href="processa\excluir_pessoas.php?id=<?php echo $pessoas["id"];?>">Excluir</a>
                      </td>
                      <td>
                        <a href="processa\status_pessoas.php?id=<?php echo $pessoas["id"];?>&
                        status=<?php echo $pessoas["status"];?>">
                          <?php
                          if($pessoas["status"]==1){
                            ?>
                            <p class="btn btn-sm btn-success">
                              <?php
                                echo "Ativo"; 
                              ?>

                            </p>
                            <?php
                          }else{
                            ?>
                            <p class="btn btn-sm btn-dark">
                              <?php
                                echo "Desativo";
                              ?>
                            </p>
                            <?php
                          };
                          ?>
                        
                        </a>
                      </td>
                    </tr>
              <?php } ?>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
