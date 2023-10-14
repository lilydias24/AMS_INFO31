<?php include_once("../Login/autenticar.php"); ?>
<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <h4>Editar Status</h4>
    <hr>
    <?php
        include_once("../config.php");
        $sql = "SELECT * FROM status WHERE ID_status=".$_REQUEST['ID_status'];
        $result = $connect->query($sql);
        $row = $result->fetch_object();
    ?>
    <form action="?page=salvar" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="ID_status" value="<?php print $row->ID_status; ?>">

        <label for="ID_status" class="h5 m-2 "><u>ID_status: <?php print $row->ID_status;?></u></label>
        <div class="m-2">
            <label for="descricao" class="h5 m-3">Descrição :</label>
            <input type="text" placeholder="Informe o código da turma" name="descricao" 
            value="<?php print $row->descricao; ?>"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">
        </div>
        <button type="submit" class="btn btn-info btn-lg text-center mt-3">Editar</button>
    </form>
</div>