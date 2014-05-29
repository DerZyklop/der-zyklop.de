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
  </ul>
</nav>


