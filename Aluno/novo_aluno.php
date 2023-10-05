<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <form action="?page=salvar" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="cadastrar">
        <p class="p-2 h4 rounded shadow">Cadastrar Aluno</p>
    <hr>
        <div class="m-3">
            <label for="matricula" class="h5 m-2">Matrícula :</label>
            <span class="badge bg-info">10 dígitos</span>
            <input type="text" placeholder="Informe a matrícula do aluno" id="matricula" name="matricula"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">

            <label for="nome" class="h5 m-3">Nome :</label>
            <input type="text" placeholder="Informe o nome do aluno" name="nome"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">

            <label for="email" class="h5 m-3">Email :</label>
            <input type="text" placeholder="Informe o email do aluno" name="email"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">

            <label for="num_responsavel" class="h5 m-3">Contato Responsável :</label>
            <input type="text" placeholder="Informe o contato do responsável do aluno" id="num_responsavel" name="num_responsavel"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">

            <label for="foto" class="h5 m-3">Foto :</label>
            <input type="file" name="foto" accept="image/png, image/jpeg"
            class="form-control text-center" style="margin-left: 10%; width: 80%;" >
        </div>
        <hr>
        <div class="m-3">
            <label for="turma" class="h4">Turma</label>
            <select name="ID_turma" class="form-select text-center" style="margin-left: 10%; width: 80%;">
                <option> -> Escolha a Turma <- </option>
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
        <button class="btn btn-info btn-lg text-center mt-3" type="submit">Cadastrar</button>
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