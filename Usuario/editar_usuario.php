<?php include_once("../Login/autenticar.php"); ?>
<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <?php
        include_once("../config.php");
        $sql = "SELECT * FROM usuario WHERE CPF=".$_REQUEST["CPF"];
        $result = $connect->query($sql);
        $row = $result->fetch_object();
    ?>
    <form action="?page=salvar" method="POST">
    <p class="p-2 h4 rounded shadow">Editar Usuário</p>
    <hr>
        <input type="hidden" name="acao" value="editar">
        <input type="hidden"  name="CPF" value="<?php print $row->CPF; ?>">            
        
        <div class="m-3 w-25 mx-auto" id="nivel">
            <div class="form-check">
                <label class="h5 m-2">Admin</label>
                <input type="radio" class="form-check-input" name="nivel" value="admin" <?php print($row->nivel == "admin") ? "checked" : null; ?>>
                <label class="h5 m-2">Operador</label>
                <input type="radio" class="form-check-input" name="nivel" value="operador" <?php print($row->nivel == "operador") ? "checked" : null; ?>>
            </div>
        </div>
        <hr>
        <div class="m-3">  
            <label for="CPF" class="h5 mt-2">CPF :</label>
            <input type="text" class="form-control text-center" style="margin-left: 10%; width: 80%;" 
            name="CPF" id="CPF" value="<?php print $row->CPF;?>" readonly>
            <label for="email" class="h5 m-2">Email :</label>
            <input type="text" class="form-control text-center" style="margin-left: 10%; width: 80%;" 
            name="email" value="<?php print $row->email; ?>">
        </div>
        <button type="submit" class="btn btn-info btn-lg text-center mt-3">Editar</button>
    </form>
</div> 
<script>
    $(document).ready(function () {
        $('#CPF').inputmask({
            mask: '999.999.999-99',
        });
    });
</script>