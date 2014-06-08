<?php

class kirbytextExtended extends kirbytext {

  function __construct($text, $markdown=true) {

    parent::__construct($text, $markdown);

    // define custom tags
    $this->addTags('instagram');

  }

  function instagram($params) {

    $output_description = false;
    $output_date = false;
    $output_time = false;
    $output_tags = false;
    $image = false;
    $output_html = false;

    $instagram  = instagram_single('161059.c103450.088260c0523643618bff0e812f2fcb2a', $params['instagram']);

    $image = $instagram->image;

    if ( isset($image->url) ) {
      $output_date = date('d. M Y', $image->created);
      $output_time = date('h:i', $image->created);

      $tags_maximum = 4;
      if($image->tags) {
        if (count($image->tags) > $tags_maximum) {
         for ($i = 0; $i < $tags_maximum; $i++) {
           if ($i != 0) {
             $output_tags .= ' | ';
           }
           $output_tags .= $image->tags[$i];
         }
        } else {
         $multible_tags = 0;
         foreach ($image->tags as $tag) {
           if ($multible_tags != 0) {
             $output_tags .= ' | ';
           }
           $output_tags .= $tag;
           $multible_tags = 1;
         }
        }
      }

      $output_html = '<div class="instagram-photo">
        <div class="img-outer-wrap">
            <a class="img-inner-wrap img-link" href="'.$image->url.'" rel="galery">
              <img class="addshadow" src="'.$image->url.'" />
              <div class="image-likes">
                <span style="float:left;">
                  '.$output_date.' | '.$output_time.' Uhr
                </span>
                <span style="float:right;">'.$image->likes.' ♥</span>
              </div>';
      if ($output_tags) {
        $output_html .= '<div class="description">
                <span>'.$output_tags.'</span>
              </div>';
      }
      $output_html .= '</a>
        </div>
      </div>';

      // build the link tag
      return $output_html;
    } else {
      return '<div class="edit"><p>Uuups... das Bild konnte leider nicht gefunden werden</p></div>';
    }

  }

}

?>
