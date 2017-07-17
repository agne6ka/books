import $ from 'jquery';

class FormComponent {
    constructor() {
        this.message = 'it\'s working!';
        this.$form =  $('#form');
    }

    formHandler(){
        let _this = this;

        this.$form.submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: _this.$form.attr('action'),
                data: _this.$form.serialize(),
                dataType: 'json',
                success:
                    (data) => {
                        _this.$form.find('.error').remove();
                        if (data.status) {
                            console.log(data);
                        } else {
                            for (let k in data) {
                                if (data.hasOwnProperty(k)) {

                                    let $input = _this.$form.find('[name="' + k + '"]'),
                                        error = '<span class="error">' + data[k] + '</span>',
                                        errorWrap = $input.next('.error-wrap');

                                    let $errorContainer = (errorWrap.length) ?  errorWrap : $input.parent().next('.error-wrap');

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
