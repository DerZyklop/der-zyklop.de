(function() {
  "use strict";
  /* global jQuery, document, setTimeout, window*/

  jQuery(document).ready(function() {
    jQuery(".comment-add-form").addClass("hide-form");
    jQuery(".comment-add-form .button").click(function() {
      jQuery(".comment-add-form").find("form").slideDown(300);
      return jQuery(".comment-add-form .button").addClass("passive");
    });
    jQuery(".nolink").click(function(event) {
      return event.preventDefault();
    });
    jQuery(".comment-add-form").find("input:submit").attr("disabled", "disabled");
    setTimeout(function() {
      return jQuery(".comment-add-form").find("input:submit").removeAttr("disabled");
    }, 1000);
    return jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr("rel", "gallery").fancybox();
  });

  window.lazyLoadArticles = function(pagesCount, options) {
    var ajaxIsProcessing, ajaxPaginationStatus, init, loadArticles, triggerPos;
    ajaxPaginationStatus = 1;
    ajaxIsProcessing = false;
    triggerPos = false;
    init = function() {
      return jQuery(window).scroll(function() {
        if (!triggerPos) {
          triggerPos = jQuery(".page-wrap").height() - jQuery(window).height() - 500;
        }
        if (!ajaxIsProcessing) {
          if (jQuery(".page-wrap").scrollTop() > triggerPos) {
            return loadArticles(options);
          }
        }
      });
    };
    loadArticles = function(options) {
      var key, paginationNav, url, value;
      ajaxIsProcessing = true;
      ajaxPaginationStatus++;
      paginationNav = jQuery("#pagination-nav").html();
      if (ajaxPaginationStatus <= pagesCount) {
        url = "/blog/ajax-article/page:" + ajaxPaginationStatus;
        if (options) {
          for (key in options) {
            value = options[key];
            url += "/" + key + ":" + value;
          }
        }
        return jQuery.ajax({
          url: url,
          success: function(data) {
            jQuery("#articles").append(data);
            jQuery("#pagination-nav").html(paginationNav);
            return setTimeout(function() {
              return triggerPos = jQuery(".page-wrap").height() - jQuery(window).height() - 500;
            }, 1000);
          }
        }).fail(function() {
          jQuery("#pagination-nav").slideUp(200, function() {
            return jQuery("#pagination-nav").html("<a href=\"event.preventDefault()\" class=\"button passiv-btn\" id=\"ajax-placeholder\">Ups.. Something\'s wrong. Please refresh the Page...</a>", jQuery("#pagination-nav").slideDown(200));
          });
          return ajaxIsProcessing = false;
        }).always(function() {
          jQuery("#pagination-nav").slideUp(200, function() {
            return jQuery("#pagination-nav").html("<a href=\"event.preventDefault()\" class=\"button passiv-btn\" id=\"ajax-placeholder\">Loading...</a>", jQuery("#pagination-nav").slideDown(200));
          });
          return ajaxIsProcessing = false;
        });
      } else {
        return jQuery("#pagination-nav").html("<a href=\"event.preventDefault()\" class=\"button passiv-btn\">Ende! Mehr Artikel hab ich noch nicht.</a>");
      }
    };
    return init();
  };

}).call(this);
