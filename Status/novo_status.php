<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <h4>Cadastrar Status</h4>
    <hr>
    <form action="?page=salvar" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="m-3">
            <label for="descricao" class="h5 mt-3">Descrição :</label>
            <input type="text" placeholder="Informe a descrição do status" name="descricao"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">
        </div>
        <button class="btn btn-info btn-lg text-center mt-3" type="submit">Cadastrar</button>
    </form>
</div>