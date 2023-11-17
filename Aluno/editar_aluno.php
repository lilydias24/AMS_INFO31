<?php include_once("../Login/autenticar.php"); ?>
<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <?php
        include_once("../config.php");
        $sql = "SELECT * FROM aluno WHERE matricula=".$_REQUEST["matricula"];
        $result = $connect->query($sql);
        $row = $result->fetch_object();
    ?>
    <form action="?page=salvar" method="POST"> 
        <p class="p-2 h4 rounded shadow">Editar Aluno</p>
    <hr>
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="matricula" value="<?php print $row->matricula; ?>" readonly>
        <div class="m-3 text-center">
            <label for="matricula" class="h5 m-2">Matrícula :</label>
            <span class="badge bg-info">10 dígitos</span>
            <input type="text" class="form-control w-75 mx-auto" id="matricula" name="matricula" value="<?php print $row->matricula; ?>">
            
            <label for="nome" class="h5 m-3">Nome :</label>
            <input type="text" class="form-control w-75 mx-auto" name="nome" value="<?php print $row->nome; ?>">
            
            <label for="email" class="h5 m-3">Email :</label>
            <input type="text" class="form-control w-75 mx-auto" name="email" value="<?php print $row->email; ?>">
            
            <label for="num_responsavel" class="h5 m-3">Contato Responsável :</label>
            <input type="text" class="form-control w-75 mx-auto" id="num_responsavel" name="num_responsavel" value="<?php print $row->num_responsavel; ?>">
            
            <label for="foto" class="h5 m-3">Foto :</label>
            <input type="file" class="form-control w-75 mx-auto" name="foto" value="<?php print $row->foto; ?>">
        </div>
        <hr>
        <div class="m-3">
            <label for="turma" class="h4">Turma</label>
            <select class="form-select text-center w-75 mx-auto" name="ID_turma">
                <?php
                $sql = "SELECT * FROM aluno as al INNER JOIN turma as tur WHERE al.ID_turma = tur.ID_turma AND al.matricula=" . $_REQUEST["matricula"];
                $result = $connect->query($sql);
                while ($row = $result->fetch_object()) {
                    print "<option value='" . $row->ID_turma . "'>" . $row->nome_turma;
                    print "</option>";
                }
                ?>
                <?php 
                    $sql = "SELECT * FROM turma";
                    $result = $connect->query($sql);
                    while($row = $result->fetch_object()){
                        print "<option value='". $row->ID_turma ."'>".$row->nome_turma;
                        print "</option>";
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-info btn-lg text-center mt-3">Editar</button>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#num_responsavel').inputmask({
            mask: ['(99) 9999-9999', '(99) 9-9999-9999']
        });
        $('#matricula').inputmask({
            mask: '9999999999' 
        });
    });
</script>