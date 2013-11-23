<div class="supporters-btn">
    <div class="ll-facebook" title="1. Klick: Facebook-Button aktivieren<br />2.Klick: Liken" rel="tooltip">
        <img src="/assets/images/placeholder/facebook.png" alt="" />
    </div>
</div>
<div class="supporters-btn">
    <div class="ll-twitter" title="1. Klick: Twitter-Button aktivieren<br />2.Klick: Twittern" rel="tooltip">
        <img src="/assets/images/placeholder/twitter.png" alt="" />
    </div>
</div>
<div class="supporters-btn">
    <div class="ll-flattr" title="1. Klick: Flattr-Buttom aktivieren<br />2.Klick: Flattrn" rel="tooltip">
        <img src="/assets/images/placeholder/flattr.png" alt="" />
    </div>

    <noscript>
        <a href="http://flattr.com/thing/622599/pxwrk" target="_blank"><img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a>
    </noscript>
</div>
<div class="clearit"></div>

<script type="text/javascript">
jQuery('.ll-flattr').click(function () {
        jQuery(this).parent().hide(0);
        jQuery(this).html('<a class="FlattrButton nolink" href="" title="<?php echo html($page->title()) ?>" rev="flattr;button:compact;uid:DerZyklop;popout:1;language:de_DE;category:audio;" ><img class="ll-flattr" src="/assets/images/placeholder/flattr.png" alt="" /></a>');
        jQuery('a.FlattrButton').attr('href','<?php echo($page->url()) ?>');
        jQuery('a.FlattrButton').html('<?php $replace = array(" ",".",",","'","@");
        $newString = str_replace($replace,"_",excerpt($page->text(), 260));
        echo $newString ?>');
        (function() {
            var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
            s.type = 'text/javascript';
            s.async = true;
            s.src = 'http://api.flattr.com/js/0.6/load.js?mode=auto';
            t.parentNode.insertBefore(s, t);
        })();
        jQuery(this).parent().show(0);
});

jQuery('.ll-twitter').click(function () {
    jQuery(this).parent().hide(0);
    jQuery('.ll-twitter').html('<a href="https://twitter.com/share" class="twitter-share-button" data-via="DerZyklop" data-lang="de" data-count="none" data-hashtags="">Twittern</a>');
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
    jQuery(this).parent().show(0);
});
jQuery('.ll-facebook').click(function () {
        jQuery(this).parent().hide(0);
    jQuery('body').prepend('<div id="fb-root"></div>');

    jQuery('.ll-facebook').html('<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>');
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1&appId=207370562657208";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
        jQuery(this).parent().show(0);
});



</script>