<?php
    $get = isset($_GET['page'])? $_GET['page']:'';
    if(isset($_SESSION["userUsername"])){
        $username = $_SESSION["userUsername"];
    }
?>
    <!-- nova navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" style="display: inline-block" href="?page=home-page">Easy Commands</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?page=home-page">Salão <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=list-production">Produção</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=cashier">Caixa</a>
                </li>

                <li class="nav-item ">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="configDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrativo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="configDropdown">
                            <a class="dropdown-item" href="?page=user-register">Usuarios</a>
                            <a class="dropdown-item" href="?page=list-products">Produtos</a>
                            <a class="dropdown-item" href="?page=list-categories">Categorias</a>
                            <a class="dropdown-item" href="?page=list-sectors">Setores</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"<button onclick = "functionConfirm();">Sair</button></a>
                </li>
            </ul>
        </div>
    </nav>
<script>
 $(document).ready(function(){
    $('nav > li').find('a').not(".dropdown-toggle").parents(".nav-item").removeClass('active');
    
    $('nav > li').find('a').not(".dropdown-toggle").each(function() {
        if($(this).attr('href') == loc)
            $(this).parents(".nav-item").addClass('active');
    });
});
</script>
    <div id="vaiFikaTudoPreto" class="vaiFikaTudoPreto"></div>
    <div id="confirm" class="card transparencia">
        <div class="message"></div>
        <button class="yes btn-info">Sim</button>
        <button class="no btn-danger">Não</button>
    </div>
