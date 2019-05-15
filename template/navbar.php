<?php
    $get = isset($_GET['page'])? $_GET['page']:'';


?>
    <!-- nova navbar -->
    <div id='cssmenu' id="navbar1">
    <ul class="navbar-nav ml-auto">
    <nav id="navbar cssmenu">
        <div class="navbar-brand">
	        <a class="logo" href="?page=home-page">Easy Commands</a>
        </div>
        <li class="item-menu active">
            <a class="nav-link" href="?page=home-page">Home <span class="sr-only"></span></a>
        </li>
        <li class="item-menu">
            <a class="nav-link" href="html-components.html">Produção</a>
        </li>
        <li class="item-menu">
            <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produtos
            </a>
                <div class="dropdown-content" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="?page=new-product">Cadastrar Item</a>
                    <a class="dropdown-item" href="?page=list-products">Lista de Item</a>
                    <a class="dropdown-item" href="?page=new-category">Cadastrar Categoria</a>
                    <a class="dropdown-item" href="?page=list-categorys">Lista de Categorias</a>
                </div>
            </div>
        </li>
        <li class="item-menu">
            <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="ddlSetores" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Setores
            </a>
                <div class="dropdown-content" aria-labelledby="ddlSetores">
                    <a class="dropdown-item" href="?page=new-sectors">Cadastrar Setor</a>
                    <a class="dropdown-item" href="?page=list-sectors">Lista de Setores</a>
                </div>
            </div>
        </li>
        <li class="item-menu">
            <a class="nav-link" href="html-components.html">Caixa</a>
        </li>
        <li class="item-menu">
            <a class="nav-link" href="?page=list-table">Salão</a>
        </li>
        <li class="item-menu ">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="ddlUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Config
                </a>
                <div class="dropdown-content" aria-labelledby="ddlUser">
                    <a class="dropdown-item" href="?page=user-register">Cadastrar Usuario</a>
                </div>
            </div>
        </li>
        <div class="divisor"></div>
        <li class="item-menu">
            <div class="dropdown">
                <a class="dropdown-toggle txt-white">Joao</a>
                <div class="dropdown-content" aria-labelledby="ddlUser">
                    <a class="dropdown-item" <button onclick = "functionConfirm();">Sair</button></a>
                </div>            
            </div>
        </li>
    </ul>
  </div>
</nav>
<script>


 $(document).ready(function(){   
    var loc = window.location.search;
    $('nav > li').find('a').not(".dropdown-toggle").parents(".item-menu").removeClass('active');
    
    $('nav > li').find('a').not(".dropdown-toggle").each(function() {
        if($(this).attr('href') == loc)
            $(this).parents(".item-menu").addClass('active');
    });
});
</script>
<div id="confirm" class="card transparencia">
	 <div class="message"></div>
	 <button class="yes btn-info">Sim</button>
	 <button class="no btn-danger">Não</button>
  </div>