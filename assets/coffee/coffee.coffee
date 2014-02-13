jQuery(document).ready ->

  jQuery('.comment-add-form').addClass 'hide-form'
  jQuery('.comment-add-form .button').click ->
    jQuery('.comment-add-form').find('form').slideDown(300)
    jQuery('.comment-add-form .button').addClass('passive')

  jQuery('.nolink').click (event) ->
    event.preventDefault()

  jQuery("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox()





  ajaxNav =
    duration: 300
    setEvent: (params, item) ->
      jQuery(item).click (e) =>
        e.preventDefault()
        jQuery.ajax
          url: item.href
          beforeSend: =>
            jQuery(params.target).each (i, targetSelector) =>
              oldContent = jQuery(targetSelector)
              oldContent.animate 'opacity': 0, @duration
          success: (response) =>
            jQuery(item).parent().siblings('.active').removeClass('active')
            jQuery(item).parent().addClass('active')
            jQuery(params.target).each (i, targetSelector) =>
              newContent = jQuery(targetSelector, response)
              if newContent.length
                oldContent = jQuery(targetSelector)
                setTimeout =>
                  oldContent.html(newContent.html())
                  oldContent.animate 'opacity': 1, @duration
                  ajaxNav.unbindAll()
                  ajaxNav.set @allparams
                , @duration
              else
                window.location.href = item.href

    unbindAll: ->
      jQuery(@allparams).each (i, params) =>
        jQuery(params.trigger).each (i, item) =>
          jQuery(item).off('click')

    set: (allparams) ->
      @allparams = allparams
      jQuery(@allparams).each (i, params) =>
        jQuery(params.trigger).each (i, item) =>
          @setEvent(params, item)


    #       newContent = jQuery('.content',response).closest('.main')
    #       console.log newContent.length
    #       if newContent.length
    #         jQuery(e.currentTarget).parent().siblings('.active').removeClass('active')
    #         jQuery(e.currentTarget).parent().addClass('active')
    #         jQuery('div.main').fadeOut 100, ->
    #           jQuery(this).html(newContent.html())
    #           jQuery(this).fadeIn ->
    #             setAjaxNav(jQuery('.main nav a'))
    #         img = jQuery('.header-img-wrap').children('img')
    #         if img.length
    #           newImg = jQuery('.header-img-wrap',response).html()
    #           img.fadeOut 200, =>
    #             jQuery('.header-img-wrap .header-img-wrap').html(newImg).ready ->
    #               jQuery('.header-img-wrap img').hide()
    #               setTimeout ->
    #                 setTimeout ->
    #                   jQuery('.header-img-wrap').children('img').fadeIn 1000
    #                 , 50
    #               , 50

    #       else
    #         window.location.href = e.target
  ajaxNav.set [
    {
      trigger: "#nav a"
      target: [
        ".content"
      ]
    }
    {
      trigger: "#articles a"
      target: [
        ".content"
      ]
    }
  ]
