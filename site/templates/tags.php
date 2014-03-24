<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php
  $blog = $pages->find('blog');
?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').addClass('blog');
    });
</script>

<section class="blog">
    <h3>Sorry!</h3>
    <p>Ich hab überall gesucht, ich hab echt alles gegeben, ich konnte keine Einträge finden.</p>
    <p>Schau dir mal die folgenden Schlagworte an, die ich gefunden habe – vielleicht interessiert dich ja eins davon:</p>
    <?php
      $tags = tagcloud($blog, array(
        'limit'=>30,
        'field'=>'tags',
        'param'    => 'tags',
        'baseurl'=>$site->url().'/blog'
      ) );
    ?>
    <ul class="tagcloud">
      <?php foreach($tags as $tag): ?>
        <li<?php if($tag->isActive()) echo ' class="active"' ?>><a href="<?php echo $tag->url() ?>"><?php echo $tag->name() ?></a> (<?php echo $tag->results() ?> Artikel)</li>
      <?php endforeach ?>
    </ul>

</section>

<?php snippet('rss-button') ?>

<?php snippet('footer') ?>
