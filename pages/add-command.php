<?php
require 'assets/services/session-validate.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
        <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Cadastrar Pedido</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="productCtg">Categoria</label>
                            <select class="form-control" name="productCtg" id="productCtg">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product">Produto</label>
                            <select class="form-control" name="product" id="product" disabled>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productQtd">Quantidade</label>
                            <input class="form-control" type="number" id="productQtd" name="productQtd">
                        </div>
                        <input  class="btn btn-danger" type="reset" value="Cancelar">
                        <button class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Preview da Comanda</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>