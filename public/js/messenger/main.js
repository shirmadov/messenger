let menu_status = false
let formData = new FormData;
const layers = document.querySelectorAll('.layer');
const layer3_pages = document.querySelectorAll(".js__layer3__page");
const translateAmount = 100;
let translate = 0;

let hamburgerMenu = ()=>{
    let menu = document.querySelector('.js__hamburger__menu');


    if(menu === null) return;
    menu.addEventListener('click', (e)=>{

        if(menu.dataset.menu === 'true'){
            let menu_card = document.querySelector('.js__hm__menu__card');
            if(menu_status){
                menu_card.style.display = 'none'
                menu_status = false;
            }else if(menu_status == false){
                menu_card.style.display = 'block'
                menu_status = true;
            }
        }else{
            menu.classList.toggle('active');
            menu.dataset.menu = 'true';
            document.querySelector('.js__search__list').classList.toggle('active_two')
            document.querySelector('.js__user__list').classList.toggle('active_one');

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

function focusSearch(){
    let stick = document.querySelector('.js__hamburger__menu');

    if(stick.dataset.menu === 'true'){
        document.querySelector('.js__search__list').classList.toggle('active_two')
        document.querySelector('.js__user__list').classList.toggle('active_one');
        stick.dataset.menu = 'false'
        stick.classList.add('active');
    }

    let search = document.querySelector('.js__search__stick');

    search.onkeyup = async (e)=>{
        let formData = new FormData;
        let url = app_url+'/search_user';

        if( search.value != '' ){
            formData.append('value',search.value)
            let response = await sendData( formData, url)

            console.log(response.success)

            if(response.success == true){
                console.log('success')
                document.querySelector('.js__search__list__ul').innerHTML= response.content

            }
        }else{
            document.querySelector('.js__search__list__ul').innerHTML= ""
        }

    }
}


slide = async ( direction, num_page = null ) => {


    direction === "next" ? translate -= translateAmount : translate += translateAmount;
    layers.forEach(

        layers => (layers.style.transform = `translateX(${translate}%)`)
    );

    if(num_page != null){
        layer3_pages.forEach((item, index)=>{

            if(item.dataset.layer == num_page){
                console.log("Came");
                item.style.visibility = 'visible'
            }else{
                item.style.visibility = 'hidden'
            }
        })
    }else{
        layer3_pages.forEach((item, index)=>{
            item.style.visibility = 'hidden'
        })
    }

}

function editSt(){
    document.querySelector('.js__st__header__edit').style.display = 'none';
    document.querySelector('.js__st__header__save').style.display = 'block';
    document.querySelector('.js__page__camera').style.visibility = 'visible';
    let underline = document.querySelectorAll('.js__profile__form__underline')
    let inputs = document.querySelectorAll('.js__profile__form__input')
    underline.forEach((element, index) =>{
        element.style.transform = 'scale(1)'
    });

    inputs.forEach((element, index)=>{
        element.removeAttribute("readonly");
    });
}


function saveSt(){
    document.querySelector('.js__st__header__edit').style.display = 'block';
    document.querySelector('.js__st__header__save').style.display = 'none';
    document.querySelector('.js__page__camera').style.visibility = 'hidden';


    let underline = document.querySelectorAll('.js__profile__form__underline')
    let inputs = document.querySelectorAll('.js__profile__form__input')

    underline.forEach((element, index) =>{
        element.style.transform = 'scale(0,1)';

    });

    inputs.forEach((element, index)=>{
        element.readOnly = true;
    });


    let url = app_url+'/user_profile_st';
    let fullname = document.querySelector("[name='fullname']").value;
    let username = document.querySelector("[name='username']").value;
    console.log(fullname,username);

    formData.append('fullname',fullname)
    formData.append('username',username)
    const response = sendData(formData,url);
}


function chooseProfileImg(){

    let file = document.querySelector('.js__profile__img');
    let image = document.querySelector('.js__drop__crop__img');
    let btn = document.querySelector('#js__drop__crop__done');


    document.querySelector('.js__page__camera').addEventListener('click', (e)=>{
        file.click();
    })

    file.addEventListener('change',async (e)=>{
        let files = e.target.files;

        if( files && files.length > 0 ){
            let file = files[0];

            // if(URL){
            //     done(URL.createObjectURL(file));
            // }else{
            //     reader = new FileReader();
            //     reader.onload = function(e) {
            //         done(reader.result);
            //     };
            //     reader.readAsDataURL(file);
            // }
            await done(URL.createObjectURL(file));
        }

        croppperjs(image)
    });

    let done = (url='')=>{
        image.src = url;
        document.querySelector(".drop__crop").classList.toggle("drop__crop__show");
    }

    let croppperjs = (image)=>{
        var result = document.getElementById('result');
        var croppable = false;

        var cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            zoomable:false,
            background:false,
            autoCropArea: 0.6,
            minCropBoxWidth: 50,
            minCropBoxHeight: 50,
            ready: function() {
                croppable = true;
            },
        });

        console.log("Came");
        var contData = cropper.getContainerData(); //Get container data
        cropper.setCropBoxData({ height: contData.height, width: contData.width  })

        btn.onclick = (e) => {
            var croppedCanvas;
            var roundedCanvas;
            var roundedImage;

            if (!croppable) {
                return;
            }

            // Crop
            croppedCanvas = cropper.getCroppedCanvas();

            // Round
            roundedCanvas = getRoundedCanvas(croppedCanvas);

            // console.log(roundedCanvas.toDataURL());

            roundedCanvas.toBlob(function(blob){
                // let formData = new FormData;
                // let url = app_url+'/user_profile_st';
                //
                // formData.append('profile_img',blob,'test.png');
                // const response = sendData(formData,url);

                formData.append('profile_img',blob,'test.png');
            });
            //
            // done();


            // Show
            // roundedImage = document.createElement('img');
            roundedImage = document.querySelector('.js__profile__picture__img')
            roundedImage.src = roundedCanvas.toDataURL()
            // result.innerHTML = '';
            // result.appendChild(roundedImage);
            done();



            // console.log(response)
        }
    }

    // document.querySelector('#js__drop__crop__done').addEventListener('click', (e)=>{
    //
    // })



    function getRoundedCanvas(sourceCanvas) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;

        canvas.width = width;
        canvas.height = height;
        context.imageSmoothingEnabled = true;
        context.drawImage(sourceCanvas, 0, 0, width, height);
        context.globalCompositeOperation = 'destination-in';
        context.beginPath();
        context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
        context.fill();
        return canvas;
    }

}


document.addEventListener("DOMContentLoaded", ()=>{
    hamburgerMenu();
    chooseProfileImg()

    const csrfToken = document.querySelector('[name=csrf-token]').content;

})
