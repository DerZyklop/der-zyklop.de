<?php if ( $page->tags() ) : ?>
<?php

$tags = explode(',', trim($page->tags(), ' ') );
$tagname = $tags[0];

// This takes the next latest article that includes
// the first tag from this article.
$allArticles = $pages->find('blog')->children()->visible()->flip();
$articlesWithSameTag = $allArticles->filterBy('tags', $tagname, ',');
$suggestedArticle = $articlesWithSameTag->not($page->uid())->first();


if ( $suggestedArticle ) : ?>

<aside class="article-suggestion">

  <h6><span>Das könnte dich auch interessieren</span></h6>
  <section>
    <h4>
      <a class="title" href="<?php echo $suggestedArticle->url(); ?>">
        <?php echo $suggestedArticle->title(); ?>
      </a>
    </h4>
    <a href="<?php echo $suggestedArticle->images()->first()->url(); ?>">
      <?php
        echo thumb( $suggestedArticle->images()->first(), array(
          'width' => 270,
          'quality' => 70,
          'crop' => false
        ));
      ?>
    </a>
    <p class="content">
      <?php echo excerpt($suggestedArticle->text(),220); ?> <a href="<?php echo $suggestedArticle->url(); ?>">weiterlesen</a>
    </p>
    <div class="clearit"></div>
  </section>
</aside>

<?php endif; ?>

<?php endif; ?>
