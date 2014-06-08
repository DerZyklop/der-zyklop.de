"use strict"
### global jQuery, document, setTimeout, window ###

jQuery(document).ready ->

  jQuery(".comment-add-form").addClass "hide-form"
  jQuery(".comment-add-form .button").click ->
    jQuery(".comment-add-form").find("form").slideDown(300)
    jQuery(".comment-add-form .button").addClass("passive")

  jQuery(".nolink").click (event) ->
    event.preventDefault()

  jQuery(".comment-add-form").find("input:submit").attr("disabled","disabled")

  setTimeout ->
    jQuery(".comment-add-form").find("input:submit").removeAttr("disabled")
  , 1000

  jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr("rel", "gallery").fancybox()


# window.lazyLoadArticles = (pagesCount, options) ->
#   ajaxPaginationStatus = 1
#   ajaxIsProcessing = false
#   triggerPos = false

#   init = () ->
#     jQuery(window).scroll ->
#       if !triggerPos
#         triggerPos = jQuery(".page-wrap").height() - jQuery(window).height() - 500
#       if !ajaxIsProcessing
#         if jQuery(".page-wrap").scrollTop() > triggerPos
#           loadArticles(options)

#   loadArticles = (options) ->
#     ajaxIsProcessing = true
#     ajaxPaginationStatus++
#     paginationNav = jQuery("#pagination-nav").html()
#     if ajaxPaginationStatus <= pagesCount
#       url = "/blog/ajax-article/page:"+ajaxPaginationStatus
#       if options
#         for key, value of options
#           url += "/"+key+":"+value
#       jQuery
#         .ajax
#           url: url
#           success: (data) ->
#             jQuery("#articles").append(data)
#             jQuery("#pagination-nav").html(paginationNav)
#             setTimeout ->
#               triggerPos = jQuery(".page-wrap").height() - jQuery(window).height() - 500
#             , 1000
#         .fail ->
#           jQuery("#pagination-nav").slideUp 200, ->
#             jQuery("#pagination-nav").html "<a href=\"event.preventDefault()\" class=\"button passiv-btn\" id=\"ajax-placeholder\">Ups.. Something\'s wrong. Please refresh the Page...</a>", jQuery("#pagination-nav").slideDown(200)
#           ajaxIsProcessing = false
#         .always ->
#           jQuery("#pagination-nav").slideUp 200, ->
#             jQuery("#pagination-nav").html "<a href=\"event.preventDefault()\" class=\"button passiv-btn\" id=\"ajax-placeholder\">Loading...</a>", jQuery("#pagination-nav").slideDown(200)
#           ajaxIsProcessing = false
#     else
#       jQuery("#pagination-nav").html "<a href=\"event.preventDefault()\" class=\"button passiv-btn\">Ende! Mehr Artikel hab ich noch nicht.</a>"

#   init()
