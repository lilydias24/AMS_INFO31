<div class="container-sm rounded p-4 text-bg-success text-center">
    <h4>Lista de Status</h4>
    <hr>
    <?php
        $sql = "SELECT * FROM status";
        $result = $connect->query($sql);
        $qtLinhas = $result->num_rows;

        if($qtLinhas > 0){
            print "<div class='rounded table-responsive text-center m-5'>";
            print "<table class='table table-light table-hover shadow'>";
            print "<tr>";
            print "<th> ID_Status </td>";             
            print "<th> Descrição </th>";
            print "<th> Ações </th>";
            print "</tr>"; 
            while($row = $result->fetch_object()){
            print "<tr>";
            print "<td>" . $row->ID_status . "</td>";
            print "<td>" . $row->descricao . "</td>";             
            print "<td> 
                    <button onclick=\"location.href='?page=editar&ID_status=".$row->ID_status. "';\" class='btn btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem Certeza de que Deseja Excluir este Status?'))
                    {location.href='?page=salvar&acao=excluir&ID_status=".$row->ID_status. "';}
                    else{false;}\" class='btn btn-danger'>Excluir</button>
                   </td>";
            print "</tr>";  
            }
            print "</table>";
            print "</div>";
        } else {
            print "<p class='alert alert-danger'> Não Foram Encontrados Resultados!</p>";
        }
    ?>
</div>