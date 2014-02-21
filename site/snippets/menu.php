<nav id="nav">
  <ul class="clearfix">
    <?php foreach($pages->visible() AS $p): ?>
    <li>
        <a class="<?php echo ($p->isOpen() || ( $pages->find('home')->isOpen() && ( $p->content()->title() == 'Articles' || $p->content()->name() == 'home' ) ) ) ? 'active' : '' ?>" href="<?php echo $p->url() ?>" title="<?php echo html($p->title()) ?>">
            <span class="title">
                <?php echo html($p->title()) ?>
            </span>
        </a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
<div class="content">
