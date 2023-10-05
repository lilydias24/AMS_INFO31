<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <?php
        include_once("../config.php");
        $sql = "SELECT * FROM cronograma WHERE ID_cronos=".$_REQUEST["ID_cronos"];
        $result = $connect->query($sql);
        $row = $result->fetch_object();
    ?>
    <form action="?page=salvar" method="POST">
    <p class="p-2 h4 rounded shadow">Editar Cronograma</p>
    <hr>
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="ID_cronos" value="<?php print $row->ID_cronos; ?>">
        <div class="m-5">
            <label class="h4">Segunda-feira</label><input type="hidden" name="seg" value="Mon">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada1" value="<?php print $row->hr_entrada[0]; ?>">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida1" value="<?php print $row->hr_saida[0]; ?>">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Terça-feira</label><input type="hidden" name="ter" value="Tue">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada2" value="<?php print $row->hr_entrada[1]; ?>">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida2" value="<?php print $row->hr_saida[1]; ?>">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Quarta-feira</label><input type="hidden" name="qua" value="Wed">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada3" value="<?php print $row->hr_entrada[2]; ?>">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida3" value="<?php print $row->hr_saida[2]; ?>">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Quinta-feira</label><input type="hidden" name="qui" value="Thu">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada4" value="<?php print $row->hr_entrada[3]; ?>">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida4" value="<?php print $row->hr_saida[3]; ?>">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Sexta-feira</label><input type="hidden" name="sex" value="Fri">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada5" value="<?php print $row->hr_entrada[4]; ?>">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida5" value="<?php print $row->hr_saida[4]; ?>">
                </div>  
            </div>
        </div>
        <hr>
        <div class="m-5">
            <label for="turma" class="h4">Turma :</label>
            <select class="form-select text-center" name="ID_turma">
                <?php 
                    $sql = "SELECT * FROM turma";
                    $result = $connect->query($sql);
                    while($row = $result->fetch_object()){
                        print "<option selected='". $row->ID_turma ."'>".$row->nome_turma;
                        print "</option>";
                    }
                ?>
            </select>
        </div>
        <button class="btn btn-info btn-lg text-center mt-3" type="submit">Editar</button>
    </form>
</div>