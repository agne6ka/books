import $ from 'jquery';

class FormComponent {
    constructor() {
        this.message = 'it\'s working!';
        this.$form =  $('#form');
        this.preview = $('#previewing');
    }

    checkFile() {
        let $photoInput = $("#photo");

        let openFile = (event)=> {
            let input = event.currentTarget;

            let reader = new FileReader();
            $photoInput.css("color", "green");

            reader.onload = () => {
                this.preview.attr('src', reader.result);
            };
            reader.readAsDataURL(input.files[0]);
        };

        $photoInput.change(function () {
            let file = this.files[0],
                match = ["image/jpeg", "image/png", "image/jpg"];

            $photoInput.css("color", "black");
            $photoInput.next('.error-wrap').find('.error').remove();

            if (file) {
                let imageFile = file.type,
                    error = '<span class="error">Only jpeg, jpg and png Images type allowed</span>';

                if ($photoInput.next('.error-wrap').find('.error')) {
                    $(this.preview).attr('src', 'assets/img/no-img.jpg');
                    $photoInput.css("color", "red");
                    $photoInput.next('.error-wrap').append(error);
                }

                match.forEach((value) => {
                    if (imageFile === value) {
                        $photoInput.next('.error-wrap').find('.error').remove();
                        openFile(event);
                    }
                });
            }

        });
    }

    formHandler(){
        let _this = this;

        this.$form.submit(function (event) {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: _this.$form.attr('action'),
                data: new FormData(_this.$form[0]),
                cache: false,
                contentType: false,
                processData:false,
                success:
                    (data) => {
                        let parsedData = $.parseJSON(data);
                        _this.$form.find('.error').remove();

                        if (parsedData.status) {
                            $('.new-book-section_form').remove();
                            $('.new-book-section_info h3').innerText = 'Book has been upload successfully';
                        } else {
                            for (let k in parsedData) {
                                if (parsedData.hasOwnProperty(k)) {
                                    let $input = _this.$form.find('[name="' + k + '"]'),
                                        error = '<span class="error">' + parsedData[k] + '</span>',
                                        errorWrap = $input.next('.error-wrap'),
                                        $errorContainer = (errorWrap.length) ?  errorWrap : $input.parent().next('.error-wrap');

                                    $errorContainer.append(error);
                                }
                            }
                        }
                    }
            });
        });
    }
}

export default FormComponent;
