let form = document.querySelector("#msg__form");
const socket = new WebSocket('ws://localhost:8000');

function sendMsg(){

    form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        let target = e.target;
        let formData = new FormData(target);

        // console.log(formData.get('msg__text'))
        socket.send(JSON.stringify(formData.get('msg__text')));

        await clearInput();
    })


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





document.addEventListener("DOMContentLoaded", ()=>{
    sendMsg();
    formTextarea();
})
