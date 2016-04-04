<?php
  $tags = tagcloud($blog, array(
    'limit'=>100,
    'field'=>'tags',
    'param' => 'tag',
    'baseurl'=>url('blog/tags')
  ) );
?>

<ul class="tagcloud">
  <?php $highestAmount = $tags[array_keys($tags)[0]]['results'] ?>
  <?php foreach($tags as $tag): ?>
    <?php $percentage = intval(($tag['results']/$highestAmount)*100) ?>
    <li class="<?php if($tag['isActive']) echo 'active' ?>">
      <a href="<?php echo $tag['url'] ?>">
        <div class="bar" style="width:<?= $percentage; ?>%">
          <span class="result-counter"><?php echo $tag['results'] ?></span> &#215; <strong><?php echo $tag['name'] ?></strong>
        </div>
        <div class="label">
          <span class="result-counter"><?php echo $tag['results'] ?></span> &#215; <strong><?php echo $tag['name'] ?></strong>
        </div>
      </a>
    </li>
  <?php endforeach ?>
</ul>

<script type="text/javascript">
  // $('.tagcloud').css({
  //   "overflow": "hidden",
  //   "height": "33em"
  // }).append('<button class="more">&#9662; Alle Schlagwörter anzeigen &#9662;</button>').find('button').click(function() {
  //   $(this).remove();
  //   $('.tagcloud').css({
  //     "overflow": "hidden",
  //     "height": "auto"
  //   });
  // });
</script>
