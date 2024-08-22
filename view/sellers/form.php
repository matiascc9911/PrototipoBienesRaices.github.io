<fieldset>
    <legend>Informacíon General</legend>

    <label for="nombre">Nombre</label>
    <input 
        type="text" 
        id="nombre" 
        name="seller[nombre]" 
        placeholder="Nombre vendedor" 
        value="<?php echo s($seller -> nombre); ?>">

    <label for="apellido">apellido</label>
    <input 
        type="text" 
        id="apellido" 
        name="seller[apellido]" 
        placeholder="Apellido vendedor" 
        value="<?php echo s($seller -> apellido); ?>">

</fieldset>

<fieldset>
    <legend>Informacíon Extra</legend>

    <label for="telefono">telefono</label>
    <input 
        type="text" 
        id="telefono" 
        name="seller[telefono]" 
        placeholder="Telefono vendedor" 
        value="<?php echo s($seller -> telefono); ?>">

</fieldset>