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
<!--navbar funcionando-->
<!--
<nav id="navbar cssmenu" class="navbar navbar-expand-lg navbar-dark bg-black">
	<a class="navbar-brand txt-blue" href="#">Easy Commands</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto"> 
-->
    <!-- nova navbar -->
    <div id='cssmenu' id="navbar1">
    <ul class="navbar-nav ml-auto"> 
    <nav id="navbar cssmenu">
	    <a class="navbar-brand txt-blue" href="#">Easy Commands</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- nova navbar -->
        <li class='active' <?php echo active($get, 'home-page'); ?>>
            <a class="nav-link" href="?page=home-page">Home <span class="sr-only">(current)</span></a>
        </li>
        <li>
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
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="ddlSetores" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Setores
            </a>
                <div class="dropdown-menu" aria-labelledby="ddlSetores">
                    <a class="dropdown-item" href="?page=new-sectors">Cadastrar Setor</a>
                    <a class="dropdown-item" href="?page=list-sectors">Lista de Setores</a>
                </div>
            </div>
        </li>
        <li>
            <a class="nav-link" href="html-components.html">Caixa</a>
        </li>
        <li>
            <a class="nav-link" href="?page=list-table">Salão</a>
        </li>
        <li <?php echo active($get, ''); ?>>
            <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="ddlUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Config
            </a>
                <div class="dropdown-menu" aria-labelledby="ddlUser">
                    <a class="dropdown-item" href="?page=user-register">Cadastrar Usuario</a>
                </div>
            </div>
        </li>
        <li class="last" <?php echo active($get, 'logout'); ?>>
        <button class="btn" onclick = "functionConfirm();">Sair</button>
        </li>
    </ul>
  </div>
</nav>
<div id="confirm" class="card transparencia">
	 <div class="message"></div>
	 <button class="yes btn-info">Sim</button>
	 <button class="no btn-danger">Não</button>
  </div>