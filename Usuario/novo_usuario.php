<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <form action="?page=salvar" method="POST">
    <p class="p-2 h4 rounded shadow">Cadastrar Operador</p>
    <hr>
        <input type="hidden" name="acao" value="cadastrar">
        <div class="m-3 w-25 mx-auto" id="nivel">
            <div class="form-check">
                <label for="n1" class="h5 m-2">Admin</label>
                <input type="radio" class="form-check-input" id="n1" name="nivel" value="admin">
            </div>  
            <div class="form-check">
                <label for="n2" class="h5 m-2">Operador</label>
                <input type="radio" class="form-check-input" id="n2" name="nivel" value="operador">
            </div>
        </div>
        <hr>
        <div class="m-3">
            <label for="CPF" class="h5 mt-2">CPF :</label>
            <input type="text" placeholder="Informe o CPF do operador" name="CPF" id="CPF"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">

            <label for="email" class="h5 mt-3">Email :</label>
            <input type="text" placeholder="Informe o email do operador" name="email"
            class="form-control text-center" style="margin-left: 10%; width: 80%;">

            <label for="senha" class="h5 mt-3">Senha :</label>
            <input type="password" placeholder="Informe a senha do operador" name="senha" 
            class="form-control text-center" style="margin-left: 10%; width: 80%;">    
        </div>
        <button class="btn btn-info btn-lg text-center mt-3" type="submit">Cadastrar</button>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#CPF').inputmask({
            mask: '999.999.999-99',
        });
    });
</script>
