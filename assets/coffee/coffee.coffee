jQuery(document).ready ->

  jQuery('.comment-add-form').addClass 'hide-form'
  jQuery('.comment-add-form .button').click ->
    jQuery('.comment-add-form').find('form').slideDown(300)
    jQuery('.comment-add-form .button').addClass('passive')

  jQuery('.nolink').click (event) ->
    event.preventDefault()

  jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox()

  # jQuery('.blogarticle .article-text').after('<a href="#" id="likebtn"><span>Guter<br />Artikel</span></a>')
  # jQuery('#likebtn').click (e) ->
  #   e.preventDefault()
  #   el = jQuery(this)
  #   if !el.hasClass 'clicked'
  #     uri = jQuery('.blogarticle .article-text').attr('data-post')
  #     $.getJSON '/pxwrk/like/post:'+uri, (r) ->
  #       if (r == undefined || r.status == 'error')
  #         return console.log 'Likes could not be updated'
  #       else
  #         counter = parseFloat jQuery('.blogarticle .article-text').attr('data-likes')
  #         console.log counter + 1
  #         jQuery('#likebtn span').fadeOut 300, ->
  #           jQuery(this).html('<span style="padding:0.5em 0;">Danke!</span>').fadeIn(300)
  #           setTimeout =>
  #             jQuery('#likebtn span').fadeOut 300, ->
  #               jQuery(this).html('<span style="font-size:2em;">'+(counter+1)+'</span>').fadeIn(300)
  #           , 1000
  #         el.addClass('clicked')
  #         el.after('<div style="display:none;text-align:center;">Danke!</div>').slideDown(500)

  #         return console.log 'Likes have been updated. New Likes count: '+r.likes
