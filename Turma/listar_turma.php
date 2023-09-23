<div class="container-sm rounded p-4 text-bg-success text-center">
    <h4>Lista de Turmas</h4>
    <hr>
    <?php
        $sql = "SELECT * FROM turma";
        $result = $connect->query($sql);
        $qtLinhas = $result->num_rows;

        if($qtLinhas > 0){
            print "<div class='rounded table-responsive text-center m-5'>";
            print "<table class='table table-light table-hover shadow'>";
            print "<tr>";
            print "<th> ID_turma </td>";             
            print "<th> Descrição </th>";
            print "<th> Ações </th>";
            print "</tr>"; 
            while($row = $result->fetch_object()){
            print "<tr>";
            print "<td>" . $row->ID_turma . "</td>";
            print "<td>" . $row->descricao . "</td>";
            print "<td> 
                    <button onclick=\"location.href='?page=editar&ID_turma=".$row->ID_turma. "';\" class='btn btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem Certeza de que Deseja Excluir esta Turma?'))
                    {location.href='?page=salvar&acao=excluir&ID_turma=".$row->ID_turma. "';}
                    else{false;}\" class='btn btn-danger'>Excluir</button>
                    </td>";
            print "</tr>";  
            }
            print "</table>";
            print "</div>";
        } else {
            print "<p class='alert alert-danger'>Não Foraram Encontrados Resultados!</p>";
        }
    ?>
</div>