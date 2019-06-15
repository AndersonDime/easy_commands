<?php
$list = mysql_getdata("SELECT produtos.id AS 'idProduto', produtos.nome AS 'nomeProduto', produtos.categoria_produtos_id, produtos.preco, categorias.id AS 'idCategoria', categorias.nome AS 'nomeCategoria', categorias.setores_id  FROM produtos INNER JOIN categorias ON produtos.categoria_produtos_id = categorias.id");
print_r $list;




?>



                        <select id="category" class="form-control" name="inputProduct">
                        <?php foreach($select as $key =>$value){
                            $ID == $value["id"]?>
                        <option value="<?php echo $value["id"] ?>"><?php echo $value["nome"] ?></option>
                        <?php } ?>
                        <!--QUANDO CLICAR-->
                        $ID-CATEGORIA == $ID;
                        

