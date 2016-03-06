(function() {
  "use strict";

  /* global jQuery, window */
  jQuery(window.document).ready(function() {
    var sweetComments;
    jQuery(".nolink").click(function(event) {
      return event.preventDefault();
    });
    jQuery(".comment-form textarea").autosize();
    jQuery(".comment-form").addClass("hide-form");
    sweetComments = function() {
      return jQuery(".comment-form textarea").on("keyup", function() {
        if (this.value.length) {
          jQuery(".comment-form").find(".visible").slideDown(300);
          return jQuery(".comment-form").find("input:submit").removeAttr("disabled");
        } else {
          jQuery(".comment-form").find(".visible").slideUp(300);
          jQuery(".comment-form .button").addClass("passive");
          return jQuery(".comment-form").find("input:submit").attr("disabled", "disabled");
        }
      });
    };
    jQuery(".comment-form").find("input:submit").attr("disabled", "disabled");
    window.setTimeout(function() {
      return sweetComments();
    }, 1000);
    return jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr("rel", "gallery").fancybox();
  });

}).call(this);
