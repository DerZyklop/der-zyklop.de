<div class="bg-tertiary">
  <section>

    <div class="options-bar">
      <div class="right">
          <a class="supporters-btn twitter" href="https://twitter.com/intent/tweet?text=<?php echo( urlencode( excerpt($page->title(), 100).' ' ) ) ?><?php echo($page->url()) ?><?php echo(urlencode(' (via @derzyklop)')) ?>">Auf Twitter teilen</a>
          <a class="supporters-btn flattr" href="https://flattr.com/submit/auto?user_id=DerZyklop&url=<?php echo($page->url()) ?>&title=<?php echo(urlencode($page->title())) ?>&description=<?php echo( urlencode(excerpt($page->text(), 260)) ) ?>&language=de_DE&<?php if ($page->tags()) : ?>tags=<?php echo( $page->tags() ) ?>&<?php endif; ?>category=text">Artikel Flattrn</a>
          <!-- <a class="supporters-btn facebook" href="http://www.facebook.com/share.php?u=<?php echo($page->url()) ?>&t=<?php echo( urlencode( $page->title() ) ) ?>">:(</a> -->
          <div class="clearit"></div>
      </div>
      <div class="clearit"></div>
    </div>

  </section>
</div>
