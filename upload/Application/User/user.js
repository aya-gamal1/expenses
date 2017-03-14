$(document).ready(function() {

    $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2",
        format: 'YYYY-MM-DD'
    }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

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

    $('#login_form').submit(function (e) {
        e.preventDefault();
        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit) {
            login();
        }
        return false;
    });




    $("#registerButton").click(function(e) {
        e.preventDefault();
        data = $("#create_account").serializeArray();
        console.log(data.push({name:"picture",value:$("#picture")[0].files[0]}))
        console.log(data);
        $.ajax({
            url: registerUrl,
            type: 'post',
            data: data,
            success: function (data, textStatus, jQxhr) {

                if (data == 1) {

                    window.location = welcomeUrl;
                } else {
                    $("#error").show();

                    $("#error").html(data);
                }
            }
            ,
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(jqXhr, textStatus);
            }
        });
    });


function login() {
    data = $("#login_form").serialize();
    $.ajax({
        url: loginUrl,
        type: 'post',
        data: data,
        success: function (data, textStatus, jQxhr) {
            if (data == 1) {

                window.location = welcomeUrl;
            } else {
                $("#error1").show();
                $("#error1").html(data);
            }
        }
        ,
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(jqXhr, textStatus);
        }
    });
}



});
