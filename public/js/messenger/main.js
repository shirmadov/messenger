
let menu_status = false
let hamburgerMenu = ()=>{
    let menu = document.querySelector('.js__hamburger__menu');

    if(menu === null) return;
    menu.addEventListener('click', (e)=>{

        let menu_card = document.querySelector('.js__hm__menu__card');
        if(menu_status){
            menu_card.style.display = 'none'
            menu_status = false;
        }else if(menu_status == false){
            menu_card.style.display = 'block'
            menu_status = true;
        }
    })
}

let o_c_ch = false;

let msg_inf = {
    'msg_author':'',
    'msg_text':'',
    'msg_id':''
};
oncontextmenu = (e)=>{

    let target = e.target;
    if ((!target.closest('.js__msg__list__li'))) return;

    msg_inf.msg_author = target.closest('.js__msg__list__li').querySelector('.js__msg__author').value;
    msg_inf.msg_text =target.closest('.js__msg__list__li').querySelector('.js__msg__text').value;
    msg_inf.msg_id =target.closest('.js__msg__list__li').querySelector('.js__msg__id').value;
    let context_menu = document.querySelector('.js__msg__right__menu');
    if(o_c_ch === false){
        console.log("OPen")
        e.preventDefault();
        context_menu.style.top = e.clientY>720?`${720}px`: `${e.clientY}px`;
        context_menu.style.left = `${e.clientX}px`;
        context_menu.style.display = 'block';
        o_c_ch = true;
    }else{
        // console.log("Close")
        context_menu.style.display = 'none';
        o_c_ch = false;
        // closeMenu(e);
    }
}


let closeMenu = (e)=>{
    const target = e.target;
    if (target.closest('.js__hamburger__menu') || target.closest('.js__hm__menu__card') || target.closest('.js__msg__right__menu')) return;
    if(menu_status == true){
        document.querySelector('.js__hm__menu__card').style.display = 'none';
        menu_status = false;
    }

    if(o_c_ch == true){
        document.querySelector('.js__msg__right__menu').style.display = 'none';
        o_c_ch = false;
    }
}

let closeContextMenu = (e)=>{
    const target = e.target;
    if (target.closest('.js__hamburger__menu') || target.closest('.js__hm__menu__card') || target.closest('.js__msg__right__menu')) return;
    if(menu_status == true){
        document.querySelector('.js__hm__menu__card').style.display = 'none';
        menu_status = false;
    }
}


let clickAnywhere = ()=>{
    document.addEventListener('click', closeMenu, false)
    document.addEventListener('contextmenu', closeContextMenu, false)
}

const pages = document.querySelectorAll(".page");
const translateAmount = 100;
let translate = 0;

slide = (direction) => {

    direction === "next" ? translate -= translateAmount : translate += translateAmount;

    pages.forEach(
        pages => (pages.style.transform = `translateX(${translate}%)`)
    );
}

function editSt(){
    // document.querySelector('.js__profile__form__input').addEventListener('click', (e)=>{
    //     console.log("Came");
    // })
    console.log("Came");
    document.querySelector('.js__profile__form__input').removeAttribute('readonly');

    document.querySelector('.js__st__header__edit').style.display = 'none';
    document.querySelector('.js__st__header__save').style.display = 'block';
    let underline = document.querySelectorAll('.js__profile__form__underline')
    underline.forEach((element, index) =>{
        element.style.transform = 'scale(1)'
    });

}

function saveSt(){
    // document.querySelector('.js__profile__form__input').addEventListener('click', (e)=>{
    //     console.log("Came");
    // })
    console.log("Came");
    document.querySelector('.js__profile__form__input').removeAttribute('readonly');

    document.querySelector('.js__st__header__edit').style.display = 'block';
    document.querySelector('.js__st__header__save').style.display = 'none';
    let underline = document.querySelectorAll('.js__profile__form__underline')
    underline.forEach((element, index) =>{
        element.style.transform = 'scale(0,1)'
    });

}

function reply(){
    console.log(msg_inf);
    let test = document.querySelector('.js__msg__reply');
    console.log(test);
    document.querySelector('.js__msg__reply').style.display='block';
    document.querySelector('.js__msg__reply__author').innerText = msg_inf.msg_author;
    document.querySelector('.js__msg__reply__text').innerText = msg_inf.msg_text.substring(0,40);

}

function cros(){
    document.querySelector('.js__msg__reply').style.display='none';
}


// let reply = ()=>{
//
// }


document.addEventListener("DOMContentLoaded", ()=>{
    // reply()
    hamburgerMenu();
    clickAnywhere();
    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
