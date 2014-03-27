<div class="width-wrap rss-button">
    <div class="snippet">
        <a href="/blog/subscribe" class="inner">Blog abonnieren?</a>
    </div>
</div>

<script type="text/javascript">
rssButtonIsFixed = false;
rssButtonTrigger = 1600;



// jQuery(window).scroll(function () {
//     if ( jQuery('body').scrollTop() > rssButtonTrigger && rssButtonIsFixed === false ) {
//         jQuery('.rss-button').addClass('fixed');
//         rssButtonIsFixed = true;
//     } else if ( jQuery('body').scrollTop() < rssButtonTrigger && rssButtonIsFixed === true ) {
//         jQuery('.rss-button').removeClass('fixed');
//         rssButtonIsFixed = false;
//     }
// });


$(window).scroll(function() {
    if ($(this).scrollTop() > 1600) {
        $('.rss-button').fadeIn();
    } else {
        $('.rss-button').fadeOut();
    }
});

</script>
