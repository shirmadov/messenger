let form = document.querySelector("#msg__form");
// const socket = new WebSocket('ws://localhost:8000');
let app_url = location.origin;

function sendMsg(){

    form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        let target = e.target;
        let formData = new FormData(target);
        let url = app_url+'/save_msg';

        // console.log(formData.get('msg__text'))
        let response = sendData(formData, url);

        console.log(response);

        // socket.send(JSON.stringify(formData.get('msg__text')));

        await clearInput();
    })


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


function chooseUser(){

    document.addEventListener('click',async function(e){
       const target = e.target;
       if ((!target.closest('.js__user__li__list')) && (!target.closest('.js__user__li__list'))) return;
       let user_li = target.closest('.js__user__li__list');
       let user_id = user_li.querySelector('.js__user__id').value;
       let url = app_url+'/choose_user';
       let formData = new FormData;
       formData.append('user_id', user_id);

       let response = await sendData(formData, url);

       if(response.success == true){
           
       }





    });

}

function autoScroll(){
    let getdiv = document.getElementById('js__card_msg__list');
    getdiv.scrollTop = getdiv.scrollHeight - getdiv.clientHeight;
}


document.addEventListener("DOMContentLoaded", ()=>{
    sendMsg();
    formTextarea();
    autoScroll();
    chooseUser();
    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
