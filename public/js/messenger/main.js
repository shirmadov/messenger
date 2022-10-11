
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



let rightMenuMsg = ()=>{

    // document.querySelector('.js__msg__list__ul').oncontextmenu = (e)=>{
    //     e.preventDefault();
    //
    // };




    // document.addEventListener('contextmenu',async (e)=>{
    //     console.log(e.clientX, e.clientY);
    //
    //     const target = e.target;
    //     // target.addEventListener("contextmenu", (e )=> {return false});
    //     // target.oncontextmenu = function(){
    //     //     return false;
    //     // };
    //
    //
    //
    //     if ((!target.closest('.js__msg__list__li'))) return;
    //
    //     let context_menu = document.querySelector('.js__msg__right__menu');
    //     if(o_c_ch === false){
    //         context_menu.style.top = e.clientY>720?`${720}px`: `${e.clientY}px`;
    //         context_menu.style.left = `${e.clientX}px`;
    //         context_menu.style.display = 'block';
    //         o_c_ch = true;
    //         console.log("Menu height:",context_menu.offsetHeight);
    //
    //     }else{
    //         target.closest('.js__msg__list__ul').oncontextmenu = (e)=>{
    //             return true;
    //         }
    //         context_menu.style.display = 'none';
    //         o_c_ch = false;
    //     }
    //
    //
    // });
}
let o_c_ch = false;
oncontextmenu = (e)=>{

    let target = e.target;
    if ((!target.closest('.js__msg__list__li'))) return;


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


function myFunc(){
    // if(o_c_ch ===  false){
    //     return false;
    // }else{
    //     return true;
    // }

    console.log("Came")
    return false;


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



document.addEventListener("DOMContentLoaded", ()=>{
    hamburgerMenu();
    rightMenuMsg();
    clickAnywhere();


    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
