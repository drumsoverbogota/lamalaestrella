
<table>

<?php $array_anho = array("Primero" => "Primer Año", "Segundo" => "Segundo Año"); ?>
<?php for ($year = 0; $year < sizeof($year_array); $year++) { ?>
	<tr><td><h3><?php echo $array_anho[$year_array[$year]]; ?></h3></td></tr>
	
	<?php foreach ($playlists[$year] as $playlist_item): ?>
		
	<tbody>
        <tr><td>
        	<a href="<?php echo site_url('playlists/'.$playlist_item['id']); ?>"><?php echo ($playlist_item['titulo']); ?>
        </td></a></tr>
    </tbody>
	<?php endforeach; ?>
<?php } ?>
</table>