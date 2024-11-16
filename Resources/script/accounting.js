
$(document).ready(function(){

    // show search input
    $('#search-student-account').click(function(){
        document.getElementById('search-account').classList.add('show-search-account');
    });

    // on keyup in search
    $('#search-student-account-input').keyup(function(){
        console.log(this.value);
    });
});