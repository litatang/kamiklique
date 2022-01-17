(function($){
    revealPost();
    var lastScroll = 0;


    $(document).on('click', '.btn-load-more:not(.loading)', function(){
        var that = $(this);
        var page = that.data('page');
        var newPage = page + 1;
        var ajaxurl = that.data('url');
        var prev = that.data('prev');
        var maxpage = that.data('maxpage');
        var innerwidth = window.innerWidth;

        if(typeof prev === 'undefined'){
            prev = 0;
        }

        that.addClass('loading').find('.text').toggleClass('d-none');     
        that.find('.text-loading').toggleClass('d-none');
        
        $.ajax(ajaxurl, {
            type: 'POST',            
            data: {
                page: page,
                prev: prev,
                action: 'btn_load_more',
                maxpage: maxpage,
                innerwidth: innerwidth,
            },
            error: function(response){
                console.log(response);
            },
            success: function(response){
                if(response == 0){
                    $('.post-container').append('<div class="text-center"><h3>You reach the end of the line</h3><p>No more post to load.</p></div>');
                    that.toggleClass('d-none');
                } else {
                    setTimeout(function(){                        
                        if(prev == 1){
                            $('.post-container').prepend(response);
                            newPage = page - 1;
                        } else {
                            $('.post-container').append(response);
                        }

                        if(newPage == 1){
                            that.toggleClass('d-none');
                        } else if(maxpage == newPage){
                            that.toggleClass('d-none');
                        } else{
                            that.data('page', newPage);                     
                            that.removeClass('loading').find('.text').toggleClass('d-none');
                            that.find('.text-loading').toggleClass('d-none');
                        }

                        revealPost();
                    }, 500)
                }
            }
        });    
    });

    function revealPost(){
        var posts = $('.post-section:not(.reveal)');
        var i = 0;

        setInterval(function(){
            if(i >= posts.length) return false;
            
            var el = posts[i];
            $(el).addClass('reveal');
            i++;
        }, 250)
    }

    // $(window).scroll(function(){
        
    //     var scroll = $(window).scrollTop();

    //     if(Math.abs(scroll- lastScroll) > $(window).height()*0.1){
    //         lastScroll = scroll;
    //         $('.page-limit').each(function(index){
                
    //             if(isVisible( $(this) )){
    //                 history.replaceState(null, null, 'blog' + $(this).attr("data-page"));
    //                 return (false);
    //             }
    //         });
    //     }                
    // });

    function isVisible(element){    
        var scroll_pos = $(window).scrollTop();
        var window_height = $(window).height();
        var el_top = $(element).offset().top;
        var el_height = $(element).height();
        var el_bottom = el_top + el_height;
        console.log((el_bottom - el_height * 0.25 > scroll_pos) && (el_top < (scroll_pos + 0.5 * window_height)));
        return ((el_bottom - el_height * 0.25 > scroll_pos) && (el_top < (scroll_pos + 0.5 * window_height)));
    }

})(jQuery)