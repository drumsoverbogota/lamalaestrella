<h2><?php echo $title; ?></h2>

<?php foreach ($playlists as $playlist_item): ?>
        <p><a href="<?php echo site_url('playlists/'.$playlist_item['id']); ?>"><?php echo $playlist_item['titulo']; ?></a></p>

<?php endforeach; ?>