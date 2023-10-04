<div class="container-sm rounded p-4 text-bg-success text-center" style="width: 70%;">
    <h4>Cadastrar Turma</h4>
    <hr>
    <form action="?page=salvar" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="m-3">
            <label for="descricao" class="h5 m-3">Descrição :</label>
            <span class="badge bg-info">3 letras e 2 números</span>
            <input type="text" placeholder="Informe o código da turma" name="descricao" id="descricao"
            class="form-control text-center" style="margin-left: 10%; width: 80%;" />
        </div>            
        <button class="btn btn-info btn-lg text-center mt-3" type="submit">Cadastrar</button>
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
