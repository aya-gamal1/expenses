$(document).ready(function() {

// initialize the validator function
    validator.message['date'] = 'not a real date';

// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required')
        .on('keyup blur', 'input', function () {
            validator.checkField.apply($(this).siblings().last()[0]);
        });

// bind the validation to the form submit event
//$('#send').click('submit');//.prop('disabled', true);

    $('form').submit(function (e) {
        e.preventDefault();
        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit) {
            formAjax(createIncomeUrl, welcomeUrl)
        }
        return false;
    });

    function formAjax(URLTEXT,  RedirectUrl) {
        $.ajax({
            url: URLTEXT,
            type: 'post',
            data: $("form").serialize(),
            success: function (data, textStatus, jQxhr) {

                if (data == 1) {

                    window.location = RedirectUrl;
                } else {
                    $("#error").html(data);
                }
            }
            ,
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(jqXhr, textStatus);
            }
        });
    }
});