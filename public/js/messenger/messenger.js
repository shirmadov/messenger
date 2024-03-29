let form = document.querySelector("#msg__form");
const socket = new WebSocket("wss://" + window.location.host + ":8080");
let app_url = location.origin;
let chosen_id = null;
let chat_type = 'user_to_user';
let amount_file = document.querySelector('.js__msg__file__count');


let o_c_ch = false;

let msg_inf = {
    'msg_author':'',
    'msg_text':'',
    'msg_id':'',
    'msg_parent_elem':''
};

const sendMsg = async () =>{
    let formData = new FormData();
    let url = app_url+'/save_msg';
    let text = document.querySelector('.js__msg__textarea').textContent;
    let files = document.querySelector('.js__msg__file').files

    formData.append('chosen_id',chosen_id);
    formData.append('chat_type',chat_type);
    formData.append('msg_text',text);
    formData.append('msg_reply_id',msg_inf.msg_id);
    formData.append('msg_reply_id',msg_inf.msg_id);
    for(let i = 0; i < files.length; i++){
        formData.append('msg_files[]',files[i]);
    }


    const response = await sendData(formData, url);
    await showRes(response,2)
    let data = {
        data_type:2,    //message
        hash_tokens:response.hash_tokens,
        // text:response.content.text,
        id:response.msg_id,
    }
    socket.send(JSON.stringify(data));

    await clearInput();
    await cros();
}


function textSubmit(){
    let textarea = document.querySelector('#message');
    if(!textarea) return;

    textarea.addEventListener('keydown', async function (e){
        if( e.keyCode === 13 && !e.shiftKey){
            e.preventDefault();
            sendMsg();
        }
    });
}

document.querySelector('.js__msg__send__btn').addEventListener('click',(e)=>{
    e.preventDefault()
    sendMsg();
})

socket.onmessage = async (event)=>{
    let data = JSON.parse(event.data);
    await showMsg(data);
}

async function showRes(response, type = 1){
    if(response.success == true && type === 1){
        await changeRightCard()

        document.querySelector('.js__msg__list__ul').innerHTML = response.content;
        await autoScroll();
    }else if(response.success === true && type === 2){
        document.querySelector('.js__msg__list__ul').insertAdjacentHTML('beforeend',response.content)
        await autoScroll();
    }
}

let showMsg = async (data) => {
    if(chosen_id !==null){
        let formData = new FormData;
        let url = app_url+'/get_msg';
        formData.append('msg_id',data.id);

        let response = await sendData(formData,url);
        await showRes(response, 2)
    }
}


function chooseUser(){
    document.addEventListener('click',async function(e){
        const target = e.target;
        if (!target.closest('.js__user__li__list')) return;
        let user_li = target.closest('.js__user__li__list');
        let user_id = user_li.querySelector('.js__user__id').value;
        let url = app_url+'/choose_user';
        let formData = new FormData;
        chosen_id = user_id;
        formData.append('user_id', user_id);

        let response = await sendData(formData, url);
        await showRes(response);
    });
}

function chooseMe(){
   document.querySelector('.js__saved__msg').addEventListener('click',async(e)=>{
        let user_id = document.querySelector('.js__user__id').value;
       let url = app_url+'/choose_user';
       let formData = new FormData;
       chosen_id = user_id;
       formData.append('user_id', user_id);

       let response = await sendData(formData, url);
       await showRes(response);
    });
}



const sendData = async (formData, url)=>{
    try {
        const csrfToken = document.querySelector('[name=csrf-token]').content;
        const headers = new Headers({
            'X-CSRF-TOKEN':csrfToken,
            'Cache-Control': 'no-cache, no-store'
        })

        const response = await fetch(url,{
            method:'POST',
            headers,
            body:formData
        })
            .then(res=>res.json());
        return response;
    }catch(error){
        console.log('Error:', error);
    }

}

socket.onopen = function(e){

    let data = {
        data_type: 1,//Id
        hash_token: document.querySelector('.js__hash_user').value
    }
    console.log('Connected')
    if (socket.readyState === socket.OPEN) {

        socket.send(JSON.stringify(data));
    }
};

function isOpen(ws) {
    return ws.readyState === ws.OPEN;
}

/**
 * Context Menu
 * @param e
 */
oncontextmenu = (e)=>{
    let target = e.target;
    if ((!target.closest('.js__msg__list__li'))) return;

    msg_inf.msg_author = target.closest('.js__msg__list__li').querySelector('.js__msg__author').value;
    msg_inf.msg_text =target.closest('.js__msg__list__li').querySelector('.js__msg__text').value;
    msg_inf.msg_id =target.closest('.js__msg__list__li').querySelector('.js__msg__id').value;
    msg_inf.msg_parent_elem =target.closest('.js__msg__list__li');
    let context_menu = document.querySelector('.js__msg__right__menu');
    if(o_c_ch === false){
        e.preventDefault();
        context_menu.style.top = e.clientY>720?`${720}px`: `${e.clientY}px`;
        context_menu.style.left = `${e.clientX}px`;fiver
        context_menu.style.display = 'block';
        o_c_ch = true;
    }else{
        context_menu.style.display = 'none';
        o_c_ch = false;
        // closeMenu(e);
    }
}


function clearInput(){
    document.querySelector('.js__msg__textarea').textContent ='';
    amount_file.innerText = 0;
    amount_file.style.display = 'none';
    msg_inf.msg_id = '';
    msg_inf.msg_author = '';
    msg_inf.msg_text = '';
    msg_inf.msg_parent_elem = '';
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

let changeRightCard = function (){
    document.querySelector('.js__right__card').style.display = 'block';
    document.querySelector('.js__right__card__select').style.display = 'none';
};


function autoScroll(){
    let getdiv = document.getElementById('js__card_msg__list');
    getdiv.scrollTop = getdiv.scrollHeight - getdiv.clientHeight;
}


function contentEditable(){
    const content = document.getElementById('message');
    const place_text = content.getAttribute('data-placeholder');
    content.innerHTML = place_text
    // content.innerHTML === '' && (content.innerHTML = place_text);
    content.addEventListener('focus', function (e) {
        const value = e.target.innerHTML;
        value === place_text && (e.target.innerHTML = '');
    });

    content.addEventListener('blur', function (e) {
        const value = e.target.innerHTML;
        value === '' && (e.target.innerHTML = place_text);
    });
}


function replyMsg(){
    let test = document.querySelector('.js__msg__reply');
    document.querySelector('.js__msg__reply').style.display='block';
    document.querySelector('.js__msg__reply__author').innerText = msg_inf.msg_author;
    document.querySelector('.js__msg__reply__text').innerText = msg_inf.msg_text.substring(0,40);

    document.querySelector('.js__msg__right__menu').style.display = 'none';
    o_c_ch = false;
}

function cros(){
    document.querySelector('.js__msg__reply').style.display='none';
}

function copyMsg(){
    navigator.clipboard.writeText(msg_inf.msg_text)
    document.querySelector('.js__msg__right__menu').style.display = 'none';
    o_c_ch = false;
}

function deleteMsg(){

    toggleModal()
    // document.querySelector('.js__msg__rm__card').style.display='block';
    document.querySelector('.js__msg__right__menu').style.display = 'none';
    o_c_ch = false;

}

function toggleModal() {
    document.querySelector(".modal").classList.toggle("show__modal");

}

function cancelDelete(){
    toggleModal()
    // document.querySelector('.js__msg__rm__card').style.display='none';
    // document.querySelector('.js__msg__right__menu').style.display = 'none';
    // o_c_ch = false;
}

async function deleteMsgA(){
    toggleModal()
    let formData = new FormData;
    let url = app_url+'/delete_msg';

    console.log("Cmae",msg_inf.msg_parent_elem);
    formData.append('msg_id',msg_inf.msg_id);
    let response = await sendData(formData, url);
    console.log(response);
    await showRes(response)
}

const chooseFile = async ()=>{

    let file = document.querySelector('.js__msg__file');
    document.querySelector('.js__msg__file').click();
    file.onclick = function(){
        this.files = null;
    }
    file.onchange = function () {
        let amount_file = document.querySelector('.js__msg__file__count');
        amount_file.style.display = 'block';
        amount_file.innerText = this.files.length
        document.querySelector('.js__msg__textarea').focus();

    };
}

function clickFile(){

}


document.addEventListener("DOMContentLoaded", ()=>{
    autoScroll();
    chooseUser();
    contentEditable();
    textSubmit();
    chooseMe();
    clickAnywhere();
    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
