window.lazyLoadArticles = (pagesCount, options) ->
  ajaxPaginationStatus = 1
  ajaxIsProcessing = false
  triggerPos = false
  init = () ->
    jQuery(window).scroll ->
      if !triggerPos
        triggerPos = jQuery('body').height() - jQuery(window).height() - 500
      if !ajaxIsProcessing
        if jQuery('body').scrollTop() > triggerPos
          loadArticles(options)

  loadArticles = (options) ->
    ajaxIsProcessing = true
    ajaxPaginationStatus++
    paginationNav = jQuery('#pagination-nav').html()
    if ajaxPaginationStatus <= pagesCount
      url = "/blog/ajax-article/page:"+ajaxPaginationStatus
      if options
        for key, value of options
          url += '/'+key+':'+value
      jQuery
        .ajax
          url: url
          success: (data) ->
            jQuery('#articles').append(data)
            jQuery('#pagination-nav').html(paginationNav)
            setTimeout ->
              triggerPos = jQuery('body').height() - jQuery(window).height() - 500
            , 1000
        .fail ->
          jQuery('#pagination-nav').slideUp 200, ->
            jQuery('#pagination-nav').html '<a href="javascript:void(0)" class="button passiv-btn" id="ajax-placeholder">Ups.. Something\'s wrong. Please refresh the Page...</a>', jQuery('#pagination-nav').slideDown(200)
          ajaxIsProcessing = false
        .always ->
          jQuery('#pagination-nav').slideUp 200, ->
            jQuery('#pagination-nav').html '<a href="javascript:void(0)" class="button passiv-btn" id="ajax-placeholder">Loading...</a>', jQuery('#pagination-nav').slideDown(200)
          ajaxIsProcessing = false
    else
      jQuery('#pagination-nav').html '<a href="javascript:void(0)" class="button passiv-btn">Ende! Mehr Artikel hab ich noch nicht.</a>'

  return init()
