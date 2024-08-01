
<form method="post" class="container w-75 border bg-white p-4 rounded rounded-4 mt-4 d-flex flex-column shadow">
    <h1 class="text-center fs-2" >Novo Contato 📞</h1>
    <div class="form-group mb-4">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" minlength="3" required>
    </div>
    <div class="form-group mb-4">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" autocomplete="on" class="form-control" minlength="3" required>
    </div>
    <div class="form-group mb-4">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="phone" id="telefone" name="telefone" class="form-control" minlength="8" required>
    </div>
    <button type="submit" class="btn btn-dark mt-2 align-self-center">Adicionar</button>
</form>