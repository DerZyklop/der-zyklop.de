"use strict"
### global jQuery, window ###

jQuery(window.document).ready ->

  jQuery(".nolink").click (event) ->
    event.preventDefault()

  jQuery(".comment-add-form textarea").autosize()

  jQuery(".comment-add-form").addClass "hide-form"
  sweetComments = ->
    jQuery(".comment-add-form textarea").on "keyup", ->
      if this.value.length
        jQuery(".comment-add-form").find(".visible").slideDown(300)
        jQuery(".comment-add-form").find("input:submit").removeAttr("disabled")
      else
        jQuery(".comment-add-form").find(".visible").slideUp(300)
        jQuery(".comment-add-form .button").addClass("passive")
        jQuery(".comment-add-form").find("input:submit").attr("disabled","disabled")

  # SPAM-Protection
  jQuery(".comment-add-form").find("input:submit").attr("disabled","disabled")
  window.setTimeout ->
    sweetComments()
  , 1000

  jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr("rel", "gallery").fancybox()

