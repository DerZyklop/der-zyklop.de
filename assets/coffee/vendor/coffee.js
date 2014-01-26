jQuery(document).ready(function() {
  jQuery('.comment-add-form').addClass('hide-form');
  jQuery('.comment-add-form .button').click(function() {
    jQuery('.comment-add-form').find('form').slideDown(300);
    return jQuery('.comment-add-form .button').addClass('passive');
  });
  jQuery('.nolink').click(function(event) {
    return event.preventDefault();
  });
  return jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
});
