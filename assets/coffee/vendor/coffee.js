jQuery(document).ready(function() {
  var ajaxNav;
  jQuery('.comment-add-form').addClass('hide-form');
  jQuery('.comment-add-form .button').click(function() {
    jQuery('.comment-add-form').find('form').slideDown(300);
    return jQuery('.comment-add-form .button').addClass('passive');
  });
  jQuery('.nolink').click(function(event) {
    return event.preventDefault();
  });
  jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
  ajaxNav = {
    duration: 300,
    setEvent: function(params, item) {
      var _this = this;
      return jQuery(item).click(function(e) {
        e.preventDefault();
        return jQuery.ajax({
          url: item.href,
          beforeSend: function() {
            return jQuery(params.target).each(function(i, targetSelector) {
              var oldContent;
              oldContent = jQuery(targetSelector);
              return oldContent.animate({
                'opacity': 0
              }, _this.duration);
            });
          },
          success: function(response) {
            jQuery(item).parent().siblings('.active').removeClass('active');
            jQuery(item).parent().addClass('active');
            return jQuery(params.target).each(function(i, targetSelector) {
              var newContent, oldContent;
              newContent = jQuery(targetSelector, response);
              if (newContent.length) {
                oldContent = jQuery(targetSelector);
                return setTimeout(function() {
                  oldContent.html(newContent.html());
                  oldContent.animate({
                    'opacity': 1
                  }, _this.duration);
                  ajaxNav.unbindAll();
                  return ajaxNav.set(_this.allparams);
                }, _this.duration);
              } else {
                return window.location.href = item.href;
              }
            });
          }
        });
      });
    },
    unbindAll: function() {
      var _this = this;
      return jQuery(this.allparams).each(function(i, params) {
        return jQuery(params.trigger).each(function(i, item) {
          return jQuery(item).off('click');
        });
      });
    },
    set: function(allparams) {
      var _this = this;
      this.allparams = allparams;
      return jQuery(this.allparams).each(function(i, params) {
        return jQuery(params.trigger).each(function(i, item) {
          return _this.setEvent(params, item);
        });
      });
    }
  };
  return ajaxNav.set([
    {
      trigger: "#nav a",
      target: [".content"]
    }, {
      trigger: "#articles a",
      target: [".content"]
    }
  ]);
});
