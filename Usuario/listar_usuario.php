<?php include_once("../Login/autenticar.php"); ?>
<div class="container-sm rounded p-4 text-bg-success text-center">
    <h4>Lista de Usuários</h4>
    <hr>
    <?php
        $sql = "SELECT * FROM usuario";
        $result = $connect->query($sql);
        $qtLinhas = $result->num_rows;

        if($qtLinhas > 0){
            print "<div class='rounded table-responsive text-center m-5'>";
            print "<table class='table table-light table-hover shadow'>";
            print "<tr>";
            print "<th> Nível </td>";             
            print "<th> CPF </td>";             
            print "<th> Email </th>";
            print "<th> Senha </th>";
            print "<th> Ações </th>";
            print "</tr>"; 
            while($row = $result->fetch_object()){
                print "<tr>";
                print "<td>" . $row->nivel . "</td>";             
                print "<td>" . $row->CPF . "</td>";             
                print "<td>" . $row->email . "</td>";
                print "<td>" . $row->senha . "</td>";
                print "<td> 
                        <button onclick=\"location.href='?page=editar&CPF=".$row->CPF. "';\" class='btn btn-success'>Editar</button>
                        <button onclick=\"if(confirm('Tem Certeza de que Deseja Excluir este Usuário?'))
                        {location.href='?page=salvar&acao=excluir&CPF=".$row->CPF. "';}
                        else{false;}\" class='btn btn-danger'>Excluir</button>
                        </td>";
                print "</tr>";  
            }
            print "</table>";
            print "</div>";
        } else {
            print "<p class='alert alert-danger'>Não Foram Encontrados Resultados!</p>";
        }
    ?>
</div>
<!-- não está editando -->