<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <h4>Editar Turma</h4>
    <hr>
    <?php
        include_once("../config.php");
        $sql = "SELECT * FROM turma WHERE ID_turma=".$_REQUEST["ID_turma"];
        $result = $connect->query($sql);
        $row = $result->fetch_object();
    ?>
    <form action="?page=salvar" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="ID_turma" value="<?php print $row->ID_turma; ?>">
        <div class="m-3">
            <label for="descricao" class="h5 m-3">Descrição :</label>
            <span class="badge bg-info">3 letras e 2 números</span>
            <input type="text" placeholder="Informe o código da turma" name="descricao" 
            id="descricao" value="<?php print $row->descricao; ?>"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">
        </div>
        <button type="submit" class="btn btn-info btn-lg text-center mt-3">Editar</button>
    </form>
</div>
<script>
    $(document).ready(function () {
      $('#descricao').inputmask({
        mask: 'AAA99', // 3 letras + 2 números
        definitions: {
          'A': {
            validator: '[A-Za-z]',
            casing: 'upper'
          }
        }
      });
    });
</script>