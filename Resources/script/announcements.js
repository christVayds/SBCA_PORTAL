
$(document).ready(function(){
    var post_address_selected = '';

    // comment button
    $('.react-comment').click(function(){
        var post_address = $(this).attr('id');

        document.getElementById('read-comments').classList.add('show-comments');
        post_address = post_address.slice(8);
        post_address_selected = post_address;

        $('#list-comments').load('../../Model/announcements.inc.php', {
            view_comments: true,
            post_address: post_address
        });
    });

    // like button
    $('.react-like').click(function(){
        var button = document.getElementById(this.id);
        var link = this.id.slice(5);

        $.ajax({
            url: '../../Model/announcements.inc.php',
            type: 'POST',
            data: {
                like_post: true,
                post_address: link
            },
            success: function(response){
                // console.log(response.message);
                if(response.success){
                    button.classList.add('liked');
                    button.querySelector('i').classList.add('fa-solid');
                }
            },
            error: function(){
                console.log('error');
            }
        })
    });

    // posting a comment
    $('#post-comment').click(function(){
        var comment = document.getElementById('input-comment');

        $.ajax({
            url: '../../Model/announcements.inc.php',
            type: 'POST',
            data: {
                input_comment: true,
                comment: comment.value,
                post_address: post_address_selected
            },
            success: function(response){
                console.log(response.message);
                comment.value = "";

                $('#list-comments').load('../../Model/announcements.inc.php', {
                    view_comments: true,
                    post_address: post_address_selected
                });
            },
            error: function(){
                console.log('error');
            }
        });
    });

    // exit button
    $('#exit-comments').click(function(){
        document.getElementById('input-comment').value = "";
        document.getElementById('read-comments').classList.remove('show-comments');

        $('#list-comments div').remove();
    });
});