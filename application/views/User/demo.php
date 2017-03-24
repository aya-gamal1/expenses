<html>
<head>
    <title>Upload Form</title>
</head>
<body>
<div id="error"></div>


<form id="demo" enctype="multipart/form-data">

<input type="file" id="file" name="userfile" size="20" />

<br /><br />

<input id="submit" type="submit" value="upload" />

</form>



<script>

    $("#submit").click(function(e){
        e.preventDefault();
        data = $("#demo").serializeArray();
        data.push({name:"picture",value:$("#file")[0].files[0][0]})

        $.ajax({
            url: "<?php echo site_url('welcome/welcome_message')?>",
            type: 'post',
            data : new FormData($('#demo')[0]),
            processData: false,
            contentType: false,
            success: function (data, textStatus, jQxhr) {

$("#error").html(data);
            }
            ,
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(jqXhr, textStatus);
            }
        });
    })

</script>
</body>
</html>