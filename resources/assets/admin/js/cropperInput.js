import Cropper from 'cropperjs';

var cropper;

var cropperModal = new bootstrap.Modal(document.getElementById('cropper-modal'));

document.getElementById('cropper-modal').addEventListener('hidden.bs.modal', function (event) {
    cropper.destroy();
});

var inputs = document.getElementsByClassName('cropper-input');

for (let i = 0; i < inputs.length; i++) {

    let mode = inputs[i].dataset.mode == 'free' ? 0 : 1;
    let width = inputs[i].dataset.width;
    let height = inputs[i].dataset.height;
    let varName = inputs[i].name;

    inputs[i].addEventListener('change', function (e) {

        cropperModal.show();

        var file = e.target.files[0];

        if (file) {

            var reader = new FileReader();

            reader.onload = function (event) {

                var image = document.getElementById('cropper-image');

                image.setAttribute('src', event.target.result);

                cropper = new Cropper(image, {
                    viewMode: mode,
                    dragMode: 'move',
                    restore: false,
                    guides: false,
                    center: false,
                    highlight: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false,
                    aspectRatio: width / height,
                    autoCropArea: 1, // 100% da largura e altura da imagem
                    crop(event) {
                        let cropperData = cropper.getData(true);
                        document.getElementById(varName + "_x").value = cropperData.x;
                        document.getElementById(varName + "_y").value = cropperData.y;
                        document.getElementById(varName + "_width").value = cropperData.width;
                        document.getElementById(varName + "_height").value = cropperData.height;

                    },
                });
            };

            reader.readAsDataURL(file);
        }
    });
}
