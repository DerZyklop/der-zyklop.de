<nav class="main-nav" id="nav">
  <ul>
    <li>
        <a href="#close" class="close-menu">&#215;</a>
    </li>
    <?php foreach($site->children()->visible() as $p): ?>
        <li>
            <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo html($p->title()) ?></a>
        </li>

    <?php endforeach ?>
    <div class="button-wrap">
      <a href="/blog/subscribe" class="button">Blog abonnieren?</a>
    </div>
    <a href="http://www.bloglovin.com/blog/4977721/?claim=2gxqf4984cs">Follow my blog with Bloglovin</a>
  </ul>

</nav>


