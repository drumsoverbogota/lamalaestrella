<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('playlists/create'); ?>

    <label for="titulo">Titulo</label>
    <input type="input" name="titulo" /><br />
	
    <label for="contenido">Contenido</label>
    <textarea name="contenido"></textarea><br />		

    <label for="year">Año</label>
    <select class="grande" name="year">
        <?php for($i = 0; $i < count($year); ++$i) { ?>
            <option value="<?php echo $i+1 ?>"><?php echo $year[$i]; ?></option>          
        <?php } ?>
    


    <input type="submit" name="submit" value="Crear nueva entrada" />



</form>