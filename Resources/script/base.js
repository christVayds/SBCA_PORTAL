// check for active or current page
var url = window.location.href;
var page = url.substring(url.lastIndexOf('/')+1);

if(sessionStorage.length == 0 || sessionStorage.getItem('mode') === null){
    sessionStorage.setItem('mode', 'white');
}

var white = [
    ['---sbca', '#ff6666'],
    ['---sbca2', '#FD4848'],
    ['---sbca3', '#ba1111'],
    ['---maincolor', '#3F3F3F'],
    ['---tableHeader', '#3F3F3F'],
    ['---gray', '#A5A5A5'],
    ['---line', '#9b9a9a59'],
    ['---white', '#fff'],
    ['---selected_color', '#fff'],
    ['---shadow', '#c4c4c4'],
    ['---shadow2', '#2e2e2e'],
    ['---hover', '#e3e3e3'],
    ['---hover2', '#ebeaea48'],
    ['---hover3', '#c4c4c45d'],
    ['---acc_bg', '#b9b1fd15'],
    ['---list_hover', '#e2e2e238'],
    ['---tab_hover', '#dbdbdb5d']
];

var dark = [
    ['---sbca', '#ff6666'],
    ['---sbca2', '#FD4848'],
    ['---sbca3', '#ba1111'],
    ['---maincolor', '#f0f0f0ec'], // white
    ['---tableHeader', '#686868'],
    ['---gray', '#A5A5A5'],
    ['---line', '#9b9a9a59'],
    ['---white', '#3F3F3F'], // black
    ['---selected_color', '#f0f0f0ec'],
    ['---shadow', '#6b6b6b94'],
    ['---shadow2', '#2e2e2e'],
    ['---hover', '#686868'],
    ['---hover2', '#ebeaea48'],
    ['---hover3', '#c4c4c45d'],
    ['---acc_bg', '#b9b1fd15'],
    ['---list_hover', '#e2e2e238'],
    ['---tab_hover', '#dbdbdb5d']
];

$(document).ready(function(){
    switch(page){
        case('dashboard.php'):
            document.getElementById('dashboard').classList.add('active');
            break;
        case('messages.php'):
            document.getElementById('messages').classList.add('active');
            document.getElementById("icon_messages").classList.remove('fa-regular');
            document.getElementById("icon_messages").classList.add('fa-solid');
            break;
        case('account.php'):
            document.getElementById('account').classList.add('active');
            document.getElementById("icon_account").classList.remove('fa-regular');
            document.getElementById("icon_account").classList.add('fa-solid');
            break;
    }

    $("#sbca").click(function(){
        console.log("hello world");
    });

    if(sessionStorage['mode'] === 'dark'){
        for(var i=0;i<dark.length;i++){
            $(':root').css(dark[i][0], dark[i][1]);
        }
    } else if(sessionStorage['mode'] === 'white'){
        for(var i=0;i<white.length;i++){
            $(':root').css(white[i][0], white[i][1]);
        }
    }

    $("#normal").click(function(){
        if(sessionStorage.getItem("mode") == "dark"){
            sessionStorage.setItem('mode', 'white');
            for(var i=0;i<white.length;i++){
                $(':root').css(white[i][0], white[i][1]);
            }
        }
    });

    $("#dark").click(function(){
        if(sessionStorage.getItem('mode') == "white"){
            sessionStorage.setItem('mode', 'dark');
            for(var i=0;i<dark.length;i++){
                $(':root').css(dark[i][0], dark[i][1]);
            }
        }
    });
});