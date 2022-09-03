let form = document.querySelector("#msg__form");
const socket = new WebSocket('ws://localhost:8000');
let app_url = location.origin;
let chosen_id;
let chat_type = 'user_to_user'

function sendMsg(){

    form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        let target = e.target;
        let formData = new FormData(target);
        let url = app_url+'/save_msg';

        formData.append('chosen_id',chosen_id);
        formData.append('chat_type',chat_type);
        const response = await sendData(formData, url);

        console.log(response);
        if(response.success === true){
            let text = response.content.text;
            console.log(response.content);
            const d = new Date();
            let h = d.getHours();
            let m = d.getMinutes();
            let html = '<li class="msg__list__li js__msg__list__li">\n' +
                '<div class="msg__card__right">\n' + text +
                '<span class="msg__time">'
                + h +':'+ m +
                '</span>\n' +
                '</div>\n' +
                '</li>'

            document.querySelector('.js__msg__list__ul').insertAdjacentHTML('beforeend',html);
        }

        let data = {
            data_type:'message',
            hash_tokens:response.hash_tokens,
            text:response.content.text,
        }

        socket.send(JSON.stringify(data));
        await autoScroll();
        await clearInput();
    })
}

socket.onmessage = async (event)=>{
    let data = JSON.parse(event.data);
    console.log("Come");
}


function chooseUser(){
    document.addEventListener('click',async function(e){
        const target = e.target;
        if ((!target.closest('.js__user__li__list')) && (!target.closest('.js__user__li__list'))) return;
        let user_li = target.closest('.js__user__li__list');
        let user_id = user_li.querySelector('.js__user__id').value;
        let url = app_url+'/choose_user';
        let formData = new FormData;
        chosen_id = user_id;
        formData.append('user_id', user_id);

        let response = await sendData(formData, url);

        console.log(response);

        if(response.success == true){
            await changeRightCard()

            document.querySelector('.js__msg__list__ul').innerHTML = response.content;
            await autoScroll();
        }

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

        console.log(response);
        return response;
    }catch(error){
        console.log('Error:', error);
    }

}

socket.onopen = function(e){

    let data = {
        data_type: "Id",
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

function formTextarea(){
    let textarea = document.querySelector('#js__msg__textarea');

    textarea.addEventListener('keydown', async function (e) {
        if (e.keyCode == 13) {
            if (e.shiftKey) {
            } else {
                document.querySelector('.js__msg__send__btn').click();
                e.preventDefault();
            }
        }
    });

}

function clearInput(){
    document.querySelector('.js__msg__textarea').value ='';
}



let changeRightCard = function (){
    document.querySelector('.js__right__card').style.display = 'block';
    document.querySelector('.js__right__card__select').style.display = 'none';
};


function autoScroll(){
    let getdiv = document.getElementById('js__card_msg__list');
    getdiv.scrollTop = getdiv.scrollHeight - getdiv.clientHeight;
}

let rightMenuMsg = ()=>{
    document.addEventListener('contextmenu',async (e)=>{
        const target = e.target;
        if ((!target.closest('.js__msg__card'))) return;
        target.addEventListener("contextmenu", e => e.preventDefault());

        console.log("Right Menu")
    });
}



document.addEventListener("DOMContentLoaded", ()=>{
    sendMsg();
    formTextarea();
    autoScroll();
    chooseUser();
    rightMenuMsg();
    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
