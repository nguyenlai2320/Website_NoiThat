$(document).ready(function(){

    $("#input-user").blur(function(){
        var inputUser = $(this).val()
        var regInputUser = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/
        if(regInputUser.test(inputUser)) {
            $("#message-alert").html(" ")
            return true
        }
        else {
            $("#message-alert").html("Email không hợp lệ!<br>Vui lòng nhập lại!")
            return false
        }
    })

})