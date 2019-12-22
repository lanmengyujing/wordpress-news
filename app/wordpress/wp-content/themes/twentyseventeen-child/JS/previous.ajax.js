/**
 * AJAX script to load previous post.
 */

(function($){
    const postId = postdata.post_id;
    const theme_uri = postdata.theme_uri;
    const rest_url = postdata.rest_url;
    
    $('.load-previous a').attr( 'href', 'javascript:void(0)');

    function get_previous_post(){
        $.ajax({
            dataType: "json",
            url: rest_url + "posts/" + postId   
        }).done((response)=>{
            console.log(response);
        })
    }
    $('.load-previous a').on('click',get_previous_post )
})(jQuery);
