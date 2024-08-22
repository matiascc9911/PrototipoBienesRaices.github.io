<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input 
        type="text" 
        id="titulo"
        name="property[titulo]" 
        placeholder="Titulo Propiedad" 
        value="<?php echo s($propiedad->titulo);?>">

    <label for="precio">Precio:</label>
    <input 
        type="number" 
        id="precio" 
        name="property[precio]" 
        placeholder="Precio Propiedad" 
        value="<?php echo s($propiedad->precio);?>">

    <label for="imagen">Imagen:</label>
    <input 
        type="file" 
        id="imagen" 
        accept="image/jpeg, image/png" 
        name="property[imagen]">
        <?php if ($propiedad->imagen){ ?>
            <img src="/../../imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
        <?php } ?>
        

    <label for="descripcion">Descripción:</label>
    <textarea
        id="descripcion" 
        name="property[descripcion]"><?php echo s($propiedad->descripcion);?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input 
        type="number" 
        id="habitaciones" 
        name="property[habitaciones]" 
        placeholder="Ej: 3" 
        min="1" 
        max="9" 
        value="<?php echo s($propiedad->habitaciones);?>">

    <label for="wc">Baños:</label>
    <input 
        type="number" 
        id="wc" 
        name="property[wc]" 
        placeholder="Ej: 3" 
        min="1" 
        max="9" 
        value="<?php echo s($propiedad->wc);?>">

    <label for="cocheras">Estacionamiento:</label>
    <input 
        type="number" 
        id="cocheras" 
        name="property[cocheras]" 
        placeholder="Ej: 3" 
        min="1" 
        max="9" 
        value="<?php echo s($propiedad->cocheras);?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedores">Vendedor</label>
    <select name="property[vendedores_id]" id="vendedores">
        <option selected value=""> -- Seleccione -- </option>
        <?php foreach($vendedores as $vendedor): ?>
            <option <?php echo $propiedad -> vendedores_id == $vendedor -> id ? 'selected' : '';?> value=" <?php echo s($vendedor -> id);?> "> <?php echo s($vendedor -> nombre) . " " . s($vendedor -> apellido); ?> </option>
        <?php endforeach; ?>
    </select>


</fieldset>