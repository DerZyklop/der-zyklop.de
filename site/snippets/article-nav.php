<div class="article-nav">
    <?php if( $page->hasPrev() ){
        echo( '<div class="active prev-btn"><a class="btn" href="'.$page->prev()->url().'">< Älter<span class="no-mobile">er Artikel</span></a></div>' );
    } else {
        echo( '<div class="prev-btn"><a href="javascript:void(0)" onclick="myJsFunc();" class="passiv-btn btn">< Älter<span class="no-mobile">er Artikel</span></a></div>' );
    }; ?>
    <?php
    if( $page->hasNext() && !($page->next()->dirname()=='draft') ){
        $hasNext = true;
    } else {
        $hasNext = false;
    };
    ?>
    <?php if( $hasNext ){
        echo( '<div class="active next-btn"><a class="btn" href="'.$page->next()->url().'">Neuer<span class="no-mobile">er Artikel</span> ></a></div>' );
    } else {
        echo( '<div class="next-btn"><a href="javascript:void(0)" onclick="myJsFunc();" class="passiv-btn btn">Neuer<span class="no-mobile">er Artikel</span> ></a></div>' );
    }; ?>
  <div class="<?php if ( $page->hasPrev() ) {
      echo('left ');
  } else {
      echo('right ');
  }; ?>overview-btn">
      <a class="btn" href="<?php echo url('pxwrk') ?>">Zur Übersicht</a>
  </div>
  <div class="clearit"></div>
</div>
