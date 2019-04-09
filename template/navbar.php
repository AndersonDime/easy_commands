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


<nav class="navbar navbar-expand-lg navbar-dark bg-black">
	<a class="navbar-brand txt-blue" href="#">Easy Commands</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto"> 
    <li <?php echo active($get, 'home-page'); ?>>
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li <?php echo active($get, 'cadproduto'); ?>>
            <a class="nav-link" href="html-components.html">Produção</a>
        </li>
        <li <?php echo active($get, 'cadproduto'); ?>>
            <a class="nav-link" href="html-components.html">Caixa</a>
        </li>
        <li <?php echo active($get, 'cadproduto'); ?>>
            <a class="nav-link" href="?page=list-table">Salão</a>
        </li>
        <li <?php echo active($get, 'new-product'); ?>>
            <a class="nav-link" href="?page=new-product">Configurações</a>
        </li>
    </ul>
  </div>
</nav>