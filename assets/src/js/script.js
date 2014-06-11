(function() {
  "use strict";
  /* global jQuery, document, setTimeout, window*/

  jQuery(document).ready(function() {
    var sweetComments;
    jQuery(".nolink").click(function(event) {
      return event.preventDefault();
    });
    jQuery(".comment-add-form textarea").autosize();
    jQuery(".comment-add-form").addClass("hide-form");
    sweetComments = function() {
      return jQuery(".comment-add-form textarea").on("keyup", function() {
        if (this.value.length) {
          jQuery(".comment-add-form").find(".visible").slideDown(300);
          return jQuery(".comment-add-form").find("input:submit").removeAttr("disabled");
        } else {
          jQuery(".comment-add-form").find(".visible").slideUp(300);
          jQuery(".comment-add-form .button").addClass("passive");
          return jQuery(".comment-add-form").find("input:submit").attr("disabled", "disabled");
        }
      });
    };
    jQuery(".comment-add-form").find("input:submit").attr("disabled", "disabled");
    setTimeout(function() {
      return sweetComments();
    }, 1000);
    return jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr("rel", "gallery").fancybox();
  });

}).call(this);
