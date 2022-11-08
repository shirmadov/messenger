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
    document.querySelector('.js__profile__form__input').removeAttribute('readonly');

    document.querySelector('.js__st__header__edit').style.display = 'none';
    document.querySelector('.js__st__header__save').style.display = 'block';
    let underline = document.querySelectorAll('.js__profile__form__underline')
    underline.forEach((element, index) =>{
        element.style.transform = 'scale(1)'
    });
}


function saveSt(){
    document.querySelector('.js__profile__form__input').removeAttribute('readonly');

    document.querySelector('.js__st__header__edit').style.display = 'block';
    document.querySelector('.js__st__header__save').style.display = 'none';
    let underline = document.querySelectorAll('.js__profile__form__underline')
    underline.forEach((element, index) =>{
        element.style.transform = 'scale(0,1)'
    });
}


document.addEventListener("DOMContentLoaded", ()=>{
    hamburgerMenu();
    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
