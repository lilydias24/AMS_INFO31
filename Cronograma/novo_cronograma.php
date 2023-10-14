<?php include_once("../Login/autenticar.php"); ?>
<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <form action="?page=salvar" method="POST">
    <p class="p-2 h4 rounded shadow">Cadastrar Cronograma</p>
    <hr>
        <input type="hidden" name="acao" value="cadastrar">
        <div class="m-5">
            <label class="h4">Segunda-feira</label><input type="hidden" name="seg" value="Mon">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada1">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida1">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Terça-feira</label><input type="hidden" name="ter" value="Tue">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada2">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida2">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Quarta-feira</label><input type="hidden" name="qua" value="Wed">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada3">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida3">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Quinta-feira</label><input type="hidden" name="qui" value="Thu">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada4">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida4">
                </div>  
            </div>
        </div>
        <div class="m-5">
            <label class="h4">Sexta-feira</label><input type="hidden" name="sex" value="Fri">
            <div class="row"> 
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada5">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida5">
                </div>  
            </div>
        </div>
        <hr>
        <div class="m-5">
            <label for="turma" class="h4">Turma :</label>
            <select class="form-select text-center" name="ID_turma">
                <option> -> Escolha a Turma <- </option>
                <?php 
                    $sql = "SELECT * FROM turma";
                    $result = $connect->query($sql);
                    while($row = $result->fetch_object()){
                        print "<option value='". $row->ID_turma ."'>" .$row->nome_turma;
                        print "</option>";
                    }
                ?>
            </select>
        </div>
        <button class="btn btn-info btn-lg text-center mt-3" type="submit">Cadastrar</button>
    </form>
</div>
