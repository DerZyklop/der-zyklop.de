<?php if ( $page->tags() ) : ?>
<?php

$tags = explode(',', trim($page->tags(), ' ') );
$tagname = $tags[0];

// This takes the next latest article that includes
// the first tag from this article.
$blogArticles = $pages->find('blog')->children()->visible()->flip();
$relatedArticles = $blogArticles->filterBy('tags', $tagname, ',');
$suggestedArticle = $relatedArticles->not($page->uid())->first();

if ( $suggestedArticle ) : ?>

<aside class="article-suggestion">

    <h6><span>Das könnte dich interessieren</span></h6>
    <h4>
      <a class="title" href="<?php echo $suggestedArticle->url(); ?>">
        <?php echo $suggestedArticle->title(); ?>
      </a>
    </h4>
    <?php if ($suggestedArticle->hasImages()) : ?>
      <a href="<?php echo $suggestedArticle->images()->first()->url(); ?>">
        <?php
          $whitelist = array(
            '127.0.0.1',
            'localhost'
          );
          # i need to do this for developing, because http://stackoverflow.com/questions/26493762/yosemite-php-gd-mcrypt-installation/26505558#26505558
          if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) : ?>
            <img src="<?= $suggestedArticle->images()->first()->url() ?>">
          <?php else : ?>
          <?php
            echo thumb( $suggestedArticle->images()->first(), array(
             'width' => 270,
             'quality' => 70,
             'crop' => false
            ));
            ?>
          <?php endif; ?>
      </a>
    <?php endif; ?>
    <?php echo excerpt($suggestedArticle->text(),220); ?> <a href="<?php echo $suggestedArticle->url(); ?>">weiterlesen</a>
    <div class="clearit"></div>
</aside>

<?php endif; ?>

<?php endif; ?>
