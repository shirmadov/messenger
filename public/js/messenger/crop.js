// function getRoundedCanvas(sourceCanvas) {
//     var canvas = document.createElement('canvas');
//     var context = canvas.getContext('2d');
//     var width = sourceCanvas.width;
//     var height = sourceCanvas.height;
//
//     canvas.width = width;
//     canvas.height = height;
//     context.imageSmoothingEnabled = true;
//     context.drawImage(sourceCanvas, 0, 0, width, height);
//     context.globalCompositeOperation = 'destination-in';
//     context.beginPath();
//     context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
//     context.fill();
//     return canvas;
// }
//
// window.addEventListener('DOMContentLoaded', function() {
//     var image = document.getElementById('js__drop__crop__img');
//     var button = document.getElementById('js__drop__crop__done');
//     var result = document.getElementById('result');
//     var croppable = false;
//     var cropper = new Cropper(image, {
//         aspectRatio: 1,
//         viewMode: 3,
//         zoomable:false,
//         background:false,
//         autoCropArea: 0.6,
//         minCropBoxWidth: 50,
//         minCropBoxHeight: 50,
//         ready: function() {
//             croppable = true;
//         },
//     });
//
//     var contData = cropper.getContainerData(); //Get container data
//     cropper.setCropBoxData({ height: contData.height, width: contData.width  })
//
//     button.onclick = function() {
//         console.log("Came");
//         var croppedCanvas;
//         var roundedCanvas;
//         var roundedImage;
//
//         if (!croppable) {
//             return;
//         }
//
//         // Crop
//         croppedCanvas = cropper.getCroppedCanvas();
//
//         // Round
//         roundedCanvas = getRoundedCanvas(croppedCanvas);
//
//         // Show
//         roundedImage = document.createElement('img');
//         roundedImage.src = roundedCanvas.toDataURL()
//         // result.innerHTML = '';
//         // result.appendChild(roundedImage);
//         let formData = new FormData;
//
//         formData.append('profile_img',roundedCanvas.toDataURL());
//         const response = sendData(formData,);
//
//
//
//     };
// });
