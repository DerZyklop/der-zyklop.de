<nav id="nav">
  <ul>
<!--     <?php foreach($site->children()->visible() as $p): ?>
        <li>
            <a <?php e(page() == $p || (page() == "home" && $p == "blog"), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo html($p->title()) ?></a>
        </li>
    <?php endforeach ?> -->
    <li>
        <a <?php e(page() == "blog", ' class="active"') ?> href="/home">Blog</a>
    </li>
    <li>
        <a <?php e((page() == "blog/tags"), ' class="active"') ?> href="/blog/tags/">Themen</a>
    </li>
    <li>
        <a <?php e((page() == "blog/archiv"), ' class="active"') ?> href="/blog/archiv/">Archiv</a>
    </li>
    <li>
        <a <?php e(page() == "about", ' class="active"') ?> href="/about">About</a>
    </li>
    <li>
        <a <?php e((page() == "blog/subscribe"), ' class="active"') ?> href="/blog/subscribe">Blog abonnieren</a>
    </li>
  </ul>

</nav>


