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

    <h6><span>Das könnte dich auch interessieren</span></h6>
    <h4>
      <a class="title" href="<?php echo $suggestedArticle->url(); ?>">
        <?php echo $suggestedArticle->title(); ?>
      </a>
    </h4>
    <?php if ($suggestedArticle->hasImages()) : ?>
      <a href="<?php echo $suggestedArticle->images()->first()->url(); ?>">
        <?php
          echo thumb( $suggestedArticle->images()->first(), array(
           'width' => 270,
           'quality' => 70,
           'crop' => false
          ));
        ?>
      </a>
    <?php endif; ?>
    <?php echo excerpt($suggestedArticle->text(),220); ?> <a href="<?php echo $suggestedArticle->url(); ?>">weiterlesen</a>
    <div class="clearit"></div>
</aside>

<?php endif; ?>

<?php endif; ?>
