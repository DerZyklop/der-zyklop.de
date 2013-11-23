jQuery(document).ready(function() {
  jQuery('.nolink').click(function(event) {
    return event.preventDefault();
  });
  return jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
});
