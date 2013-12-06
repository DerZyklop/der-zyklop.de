<?php if ( $page->tags() ) : ?>
<?php

$tags = explode(',', trim($page->tags(), ' ') );
$tagname = $tags[0];

// This takes the next latest article that includes
// the first tag from this article.
$allArticles = $pages->find('pxwrk')->children()->visible()->flip();
$articlesWithSameTag = $allArticles->filterBy('tags', $tagname, ',');
$suggestedArticle = $articlesWithSameTag->not($page->uid())->first();


if ( $suggestedArticle ) : ?>

<aside class="article-suggestion">

  <h6><span>Das könnte dich auch interessieren:</span></h6>
  <section>
    <a class="title" href="<?php echo $suggestedArticle->url(); ?>">
      <h4>
        <?php echo $suggestedArticle->title(); ?>
      </h4>
    </a>
    <a href="<?php echo $suggestedArticle->images()->first()->url(); ?>">
      <?php
        echo thumb( $suggestedArticle->images()->first(), array(
          'width' => 200,
          'quality' => 70,
          'crop' => false
        ));
      ?>
    </a>
    <div class="content">
      <?php echo excerpt($suggestedArticle->text(),220); ?> <a href="<?php echo $suggestedArticle->url(); ?>">weiterlesen</a>
    </div>
    <div class="clearit"></div>
  </section>
</aside>
<hr>

<?php endif; ?>

<?php endif; ?>
