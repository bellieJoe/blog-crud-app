
import $ from 'jquery';

const links_container = $('#links_container');
const btn_menu = $("#btn_menu");
const btn_menu_close = $("#btn_menu_close");

btn_menu.on('click', () => {
    if(links_container.css('left') == '-300px'){
        links_container.css('left', '0px');
    }
    else{
        links_container.css('left', '-300px');
    }
    
});

btn_menu_close.on('click', () => {
    links_container.css('left', '-300px');
});
