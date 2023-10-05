<div class="container-sm rounded p-4 text-bg-success text-center">
    <p class="p-3 h4 rounded shadow">Lista de Alunos</p>
    <hr>
    <?php
        $sql = "SELECT * FROM aluno AS al INNER JOIN turma AS tur
        ON al.ID_turma = tur.ID_turma";
        $result = $connect->query($sql);
        $qtLinhas = $result->num_rows;

        if($qtLinhas > 0){
            print "<div class='rounded table-responsive text-center m-5'>";
            print "<table class='table table-light table-hover shadow'>";            
            print "<tr>";
            print "<th> Matrícula </td>";   
            print "<th> Nome </td>";             
            print "<th> Email </td>";             
            print "<th> Responsável </td>";    
           // print "<th> Foto </td>";                      
            print "<th> Turma </th>";
            print "<th> Ações </th>";
            print "</tr>"; 
            while($row = $result->fetch_object()){
            print "<tr>";
            print "<td>" . $row->matricula . "</td>";
            print "<td>" . $row->nome . "</td>"; 
            print "<td>" . $row->email . "</td>"; 
            print "<td>" . $row->num_responsavel . "</td>"; 
          //  print "<td>" . $row->foto . "</td>"; 
            print "<td>" . $row->nome_turma . "</td>";
            print "<td> 
                    <button onclick=\"location.href='?page=editar&matricula=".$row->matricula. "';\" class='btn btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem Certeza de que Deseja Excluir este Aluno?'))
                    {location.href='?page=salvar&acao=excluir&matricula=".$row->matricula. "';}
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
<!-- ver como deletar imagem do diretório  -->