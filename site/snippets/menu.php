<a id="show-nav" href="#nav">
    <span class="icon-chevron-down"></span>
</a>

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
    <li id="close-nav"><a href="#" style="text-align: right;">
        <span class="icon-chevron-up"></span>
    </a></li>
  </ul>
</nav>
<div class="content">
