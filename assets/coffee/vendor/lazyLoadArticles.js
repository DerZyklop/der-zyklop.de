window.lazyLoadArticles = function(pagesCount, options) {
  var ajaxIsProcessing, ajaxPaginationStatus, init, loadArticles, triggerPos;
  ajaxPaginationStatus = 1;
  ajaxIsProcessing = false;
  triggerPos = false;
  init = function() {
    return jQuery(window).scroll(function() {
      if (!triggerPos) {
        triggerPos = jQuery('body').height() - jQuery(window).height() - 500;
      }
      if (!ajaxIsProcessing) {
        if (jQuery('body').scrollTop() > triggerPos) {
          return loadArticles(options);
        }
      }
    });
  };
  loadArticles = function(options) {
    var key, paginationNav, url, value;
    ajaxIsProcessing = true;
    ajaxPaginationStatus++;
    paginationNav = jQuery('#pagination-nav').html();
    if (ajaxPaginationStatus <= pagesCount) {
      url = "/pxwrk/ajax-article/page:" + ajaxPaginationStatus;
      if (options) {
        for (key in options) {
          value = options[key];
          url += '/' + key + ':' + value;
        }
      }
      return jQuery.ajax({
        url: url,
        success: function(data) {
          jQuery('#articles').append(data);
          jQuery('#pagination-nav').html(paginationNav);
          return setTimeout(function() {
            return triggerPos = jQuery('body').height() - jQuery(window).height() - 500;
          }, 1000);
        }
      }).fail(function() {
        jQuery('#pagination-nav').slideUp(200, function() {
          return jQuery('#pagination-nav').html('<a href="javascript:void(0)" class="btn passiv-btn" id="ajax-placeholder">Ups.. Something\'s wrong. Please refresh the Page...</a>', jQuery('#pagination-nav').slideDown(200));
        });
        return ajaxIsProcessing = false;
      }).always(function() {
        jQuery('#pagination-nav').slideUp(200, function() {
          return jQuery('#pagination-nav').html('<a href="javascript:void(0)" class="btn passiv-btn" id="ajax-placeholder">Loading...</a>', jQuery('#pagination-nav').slideDown(200));
        });
        return ajaxIsProcessing = false;
      });
    } else {
      return jQuery('#pagination-nav').html('<a href="javascript:void(0)" class="btn passiv-btn">Ende! Mehr Artikel hab ich noch nicht.</a>');
    }
  };
  return init();
};
