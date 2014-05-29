<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php $blog = $pages->find('blog') ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').addClass('blog');
    });
</script>

<section class="<?= $site->template() ?>">
    <h3>Suchst du nach etwas bestimmten?</h3>
    <p>Dann schau dir mal die folgenden Schlagwörter an, über die ich geschrieben habe – vielleicht interessiert dich ja eins davon:</p>
    <?php snippet('taglist', array('blog'=>$blog)) ?>
</section>

<?php snippet('rss-button') ?>

<?php snippet('footer') ?>
