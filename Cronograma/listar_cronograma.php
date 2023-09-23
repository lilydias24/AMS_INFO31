<div class="container-sm rounded p-4 text-bg-success text-center">
    <h4>Cronogramas de Turmas</h4>
    <hr>
    <?php
        $sql = "SELECT * FROM cronograma AS cronos INNER JOIN turma AS tur
        ON cronos.ID_turma = tur.ID_turma ORDER BY ID_cronos ASC";
        $result = $connect->query($sql);
        $qtLinhas = $result->num_rows;

        if($qtLinhas > 0){
            print "<div class='rounded table-responsive text-center m-5'>";
            print "<table class='table table-light table-hover shadow'>";
            print "<tr>";
            print "<th> ID_cronos </td>";    
            print "<th> Dia da Semana</td>";                      
            print "<th> Entrada </th>";
            print "<th> Saída </th>";            
            print "<th> Turma </td>";    
            print "<th> Ações </td>";    
            print "</tr>"; 
            while($row = $result->fetch_object()){
                print "<tr>";
                print "<td>" . $row->ID_cronos . "</td>";
                print "<td>" . $row->dia_semana . "</td>";
                print "<td>" . $row->hr_entrada . "</td>";
                print "<td>" . $row->hr_saida . "</td>";                
                print "<td>" . $row->descricao . "</td>";      
                print "<td> 
                <button onclick=\"location.href='?page=editar&ID_cronos=".$row->ID_cronos. "';\"  class='btn btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem Certeza de que Deseja Excluir este Cronograma?'))
                {location.href='?page=salvar&acao=excluir&ID_cronos=".$row->ID_cronos. "';}
                else{false;}\" class='btn btn-danger'>Excluir</button></td>";
                print "</tr>";  
            }
            print "</table>";
            print "</div>";
        } else {
            print "<p class='alert alert-danger'>Não Foram Encontrados Resultados!</p>";
        }
    ?>
</div>
<!-- editar -->