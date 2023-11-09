<?php include_once("../Login/autenticar.php"); ?>
<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <?php
    include_once("../config.php");
    $sql = "SELECT * FROM cronograma WHERE ID_cronos=" . $_REQUEST["ID_cronos"];
    $result = $connect->query($sql);
    $row = $result->fetch_object();


    $data = $row->dia_semana;
    $semana = array(
        'Sun' => 'Domingo',
        'Mon' => 'Segunda-feira',
        'Tue' => 'Terça-feira',
        'Wed' => 'Quarta-feira',
        'Thu' => 'Quinta-feira',
        'Fri' => 'Sexta-feira',
        'Sat' => 'Sábado'
    );
    $dia_semana = $semana["$data"]; ?>



    <form action="?page=salvar" method="POST">
        <p class="p-2 h4 rounded shadow">Editar Cronograma</p>
        <hr>
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="ID_cronos" value="<?php print $row->ID_cronos; ?>">
        <div class="m-5">
            <label class="h4"><?php print $dia_semana; ?></label><input type="hidden" name="dia_semana" value="<?php print $row->dia_semana; ?>">
            <div class="row">
                <div class="col">
                    Horário de Entrada : <input type="time" class="form-control" name="hr_entrada" value="<?php print $row->hr_entrada; ?>">
                </div>
                <div class="col">
                    Horário de Saída : <input type="time" class="form-control" name="hr_saida" value="<?php print $row->hr_saida; ?>">
                </div>
            </div>
        </div>


        <hr>
        <div class="m-5">
            <label for="turma" class="h4">Turma :</label>
            <select class="form-select text-center" name="ID_turma">
                <?php
                $sql = "SELECT * FROM cronograma as C INNER JOIN turma as T WHERE C.ID_turma = T.ID_turma AND C.ID_cronos=" . $_REQUEST["ID_cronos"];
                $result = $connect->query($sql);
                while ($row = $result->fetch_object()) {
                    print "<option value='" . $row->ID_turma . "'>" . $row->nome_turma;
                    print "</option>";
                }
                ?>
            </select>
        </div>
        <button class="btn btn-info btn-lg text-center mt-3" type="submit">Editar</button>
    </form>
</div>