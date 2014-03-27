<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php $blog = $pages->find('blog') ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').addClass('blog');
    });
</script>

<section class="<?= $site->template() ?>">
    <h3>Sorry!</h3>
    <p>Ich hab überall gesucht, ich hab echt alles gegeben, ich konnte keine Einträge finden.</p>
    <p>Schau dir mal die folgenden Schlagworte an, die ich gefunden habe – vielleicht interessiert dich ja eins davon:</p>
    <?php snippet('taglist', array('blog'=>$blog)) ?>
</section>

<?php snippet('rss-button') ?>

<?php snippet('footer') ?>
