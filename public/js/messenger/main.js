
let menu_status = false
let hamburgerMenu = ()=>{
    document.querySelector('.js__hamburger__menu').addEventListener('click', (e)=>{

        let menu_card = document.querySelector('.js__hm__menu__card');
        if(menu_status){
            menu_card.style.display = 'none'
            menu_status = false;
        }else if(menu_status == false){
            menu_card.style.display = 'block'
            menu_status = true;
        }
    })

    // document.querySelector('.js__hm__menu__st').addEventListener('click',(e)=>{
    //     document.querySelector('.js__page__user').style.display="none";
    //     document.querySelector('.js__page__settings').style.display="inline-block";
    // })
    //
    // document.querySelector('.js__back__to__menu').addEventListener('click', (e)=>{
    //     document.querySelector('.js__page__user').style.display="block";
    //     document.querySelector('.js__page__settings').style.display="none";
    // })
}

let clickAnywhere = ()=>{
    document.addEventListener('click', (e)=>{
        const target = e.target;
        if (target.closest('.js__hamburger__menu') || target.closest('.js__hm__menu__card')) return;
        if(menu_status == true){
            document.querySelector('.js__hm__menu__card').style.display = 'none';
            menu_status = false;
        }

    })
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



document.addEventListener("DOMContentLoaded", ()=>{
    hamburgerMenu();
    clickAnywhere();

    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
