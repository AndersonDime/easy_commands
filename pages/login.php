<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-4">
            <center>
                <div class="logo"></div>
            </center>
            <div class="card transparencia">
                <div class="card-body">
                    <form action="../easy_commands/index.php" method="POST">
                        <div class="form-group">
                            <label for="user">Usuário</label>
                            <input type="text" class="form-control" id="user" name="userId" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="userPass" required minlength="6">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                Lembrar Senha
                            </label>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block">Entrar</button>
                        <center class="forgot-password" ><a href="#">Esqueceu a senha?</a></center>
                    </form>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4"></div>
    </div>
</div>