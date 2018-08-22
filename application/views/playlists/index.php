
<table>
<?php foreach ($playlists as $playlist_item): ?>
	<tbody>
        <tr><td>
        	<a href="<?php echo site_url('playlists/'.$playlist_item['id']); ?>"><?php echo strtoupper($playlist_item['titulo']); ?>
        </td></a></tr>
    </tbody>
<?php endforeach; ?>
</table>