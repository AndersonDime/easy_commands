<?php

    $get = isset($_GET['page'])? $_GET['page']:'';

    function active($get, $link=''){
        if ($get == $link)
        {
            return 'class="nav-item active"';
        }
        return  'class="nav-item"';
    }

?>


<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-black">
	<a class="navbar-brand txt-blue" href="#">Easy Commands</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto"> 
    <li <?php echo active($get, 'home-page'); ?>>
            <a class="nav-link" href="?page=home-page">Home <span class="sr-only">(current)</span></a>
        </li>
        <li <?php echo active($get, 'cadproduto'); ?>>
            <a class="nav-link" href="html-components.html">Produção</a>
        </li>
        <li <?php echo active($get, 'list-produtcs'); ?>>
            <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produtos
            </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="?page=new-product">Cadastrar Item</a>
                    <a class="dropdown-item" href="?page=list-products">Lista de Item</a>
                    <a class="dropdown-item" href="?page=user-register">Alguma coisa aqui</a>
                </div>
            </div>
        </li>
        <li <?php echo active($get, 'cadproduto'); ?>>
            <a class="nav-link" href="html-components.html">Caixa</a>
        </li>
        <li <?php echo active($get, 'cadproduto'); ?>>
            <a class="nav-link" href="?page=list-table">Salão</a>
        </li>
        <li <?php echo active($get, 'logout'); ?>>
            <button class="btn" onclick="logout();">Sair<button>
            <a class="nav-link" href="index.php">Sair</a>
        </li>
    </ul>
  </div>
</nav>
<div id="logout" class="row">
    <div id="logout" class="col-sm-12 col-md-4"></div>
    <div id="logout" class="card transparencia body col-sm-12 col-md-4">
        <center>
        <a>Voce deseja realmente sair?</a></br>
        <button class="btn btn-sm btn-info">Sim</button>
        <button class="btn btn-sm btn-danger">Sim</button>
    </div>
</div>
<script>
    document.getElementById("logout").style.display = "none!important";
</script>