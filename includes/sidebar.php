<form class="form-inline">
    <label for="inlineFormCustomSelectPref" class="my-1 mr-2">Ordenar por:</label>
    <select name="" id="inlineFormCustomSelectPref" class="custom-select my-1 mr-sm-2 bg-black text-white">
        <option value="1">Precio(Mayor-menor)</option>
        <option value="2">Precio(Menor-mayor)</option>
        <option value="3">Nombre(A-Z)</option>
        <option value="4">Nombre(Z-A)</option>
    </select>
</form>
<div id="accordion" class="lista-categoria ">
    <a href="#" class="categoria" category="all">
        <h3>Todos</h3>
    </a>
     <div class="card-body list-group">
         <?php 
         getCategoria(); 
         ?>
        </div>
</div>