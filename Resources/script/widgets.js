

// picker for courses
var clicked_course_selector = false;

$(document).ready(function(){
    $(".op_item").click(function(){
        if(clicked_course_selector){
            document.getElementById("select_options").classList.remove('show');
            document.getElementById("down_icon").classList.remove('fa-caret-up');
            document.getElementById("down_icon").classList.add('fa-caret-down');
            var get = document.getElementById(this.id).textContent;

            document.getElementById('course_options').textContent = get;
            document.getElementById('course_options').className = this.id;
            clicked_course_selector = false;
        }
    });

    $("#selector").click(function(){
        if(clicked_course_selector){
            document.getElementById("select_options").classList.remove('show');
            document.getElementById("down_icon").classList.remove('fa-caret-up');
            document.getElementById("down_icon").classList.add('fa-caret-down');
            clicked_course_selector = false;
        } else {
            document.getElementById("select_options").classList.add('show');
            document.getElementById("down_icon").classList.add('fa-caret-up');
            document.getElementById("down_icon").classList.remove('fa-caret-down');
            clicked_course_selector = true;
        }
    });

    $(".course_year").click(function(){
        var selected = document.getElementById('selected');
        selected.textContent = $(this).attr('id');
    });

    // switch in select
    $('#switch').click(function(){
        circle = document.getElementById('circle');
        if(circle.classList.contains('on')){
            circle.classList.remove('on');
        } else {
            circle.classList.add('on');
        }
    });
});