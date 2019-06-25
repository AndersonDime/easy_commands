<div class="login">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-login" style="transform: translateY(50%)">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-warning">Login</h4>
                    </div>
                    <div id="teste" class="card-body">
                        <form action="../easy_commands/index.php" method="POST">
                            <div class="form-group">
                                <label for="user">Usuário</label>
                                <input type="text" class="form-control" id="user" name="userId" aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="userPass" required minlength="6">
                                <small id="errorHint" style="color: red;"><span style="color: white">.</span></small>
                            </div>
                            <br>
                            <a href="#" class="text-left">Esqueceu a senha?</a>
                            <button type="submit" class="btn btn-warning" style="width:100px; float: right;">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>