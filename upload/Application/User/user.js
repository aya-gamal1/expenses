$(document).ready(function() {

    $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2",
        format: 'YYYY-MM-DD'
    }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    $("#registerButton").click(function(e) {
        e.preventDefault();
        data = $("#create_account").serialize();
        $.ajax({
            url: registerUrl,
            type: 'post',
            data: data,
            success: function (data, textStatus, jQxhr) {

                if (data == 1) {

                    window.location = welcomeUrl;
                } else {
                    $("#error").html(data);
                }
            }
            ,
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(jqXhr, textStatus);
            }
        });
    });


    $("#login_form").submit(function(e) {
        e.preventDefault();
        data = $("#login_form").serialize();
        $.ajax({
            url: loginUrl,
            type: 'post',
            data: data,
            success: function (data, textStatus, jQxhr) {
                if (data == 1) {

                    window.location = welcomeUrl;
                } else {
                    alert(data);
                    $("#error").html(data);
                }
            }
            ,
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(jqXhr, textStatus);
            }
        });
    });



});
