<?php
include_once("assets/services/products-service.php");
$select = mysql_getdata("SELECT * FROM setores");
?>
<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-4">
            <center>
            </br>   
                <div class="logo"></br></div>
            </center>
            <div class="card transparencia">
            <div class="card-header bg-dark txt-white">Cadastro de Usuário</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="user">Usuário</label>
                            <input type="text" class="form-control" id="user" name="userId" required>
                        </div>
                        <div class="form-group">
                            <label>Nivel de Permissao</label><br>
                            <div class="funkyradio">
                            <div class="funkyradio-primary">
                                <input type="radio" name="radio" id="radio1" />
                                <label  data-toggle="tooltip" data-placement="right" title="Faz alteracoes no sistema" for="radio1">Administrador</label>
                            </div>
                            <div class="funkyradio-primary">
                                <input type="radio" name="radio" id="radio2" checked/>
                                <label data-toggle="tooltip" data-placement="right" title="Apenas as tarefas" for="radio2">Padrao</label>
                            </div>                        
                        </div>
                        <div class="form-group">
                            <label for="user">Email</label>
                            <input type="email" class="form-control" id="user" name="userEmail"  required>
                        </div>
                        <div class="form-group">
                            <label for="user">Setor</label><br>
                            <div class="">
                            <select class="btn" required>
                                <?php foreach($select as $key =>$value){?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["nome"] ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="userPass" required minlength="6">
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block">Entrar</button> 
                    </form>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4"></div>
</div>