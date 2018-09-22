
<table>

<?php $array_anho = array("Primero" => "Primer Año", "Segundo" => "Segundo Año"); ?>
<?php for ($year = 0; $year < sizeof($year_array); $year++) { ?>
	<tr><td><h3><?php echo $array_anho[$year_array[$year]]; ?></h3></td></tr>
	
	<?php foreach ($playlists[$year] as $playlist_item): ?>
		
	<tbody>
        <tr><td>
        	<?php
        		preg_match('@([áéíóú\w\s\']*)\s*/\s*(.*)@', $playlist_item['titulo'], $matches);
        		//echo ($matches[1]); 
        		//echo ' / '; 
        		//echo ($matches[2]); 
        	?>
        	<a href="<?php echo site_url('playlists/'.$playlist_item['id']); ?>"><?php echo ($matches[1]); 
        		echo ' / '; ?>
        		<font color="#686767"><?php echo ($matches[2]); ?></font></a>
        </td></tr>
    </tbody>
	<?php endforeach; ?>
<?php } ?>
</table>