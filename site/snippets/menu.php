<nav id="nav">
  <ul class="clearfix">
    <?php foreach($pages->visible() AS $p): ?>
    <li class="<?php echo ($p->isOpen() || ( $pages->find('home')->isOpen() && ( $p->content()->title() == 'Articles' || $p->content()->name() == 'home' ) ) ) ? 'active' : '' ?>">
        <a href="<?php echo $p->url() ?>" title="<?php echo html($p->title()) ?>">
            <span class="title">
                <?php echo html($p->title()) ?>
            </span>
        </a>
    </li>
    <?php endforeach ?>
    <li id="close-nav"><a href="#" style="text-align: right;">
        <span class="icon-chevron-up"></span>
    </a></li>
  </ul>
</nav>
<div class="content">
