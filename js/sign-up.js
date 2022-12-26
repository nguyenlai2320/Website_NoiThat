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

    $("#input-pass").blur(function(){
        var inputPass = $(this).val()
        var regInputPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
        if(regInputPass.test(inputPass)) {
            $("#message-alert").html(" ")
            return true
        }
        else {
            $("#message-alert").html("Mật khẩu không hợp lệ!<br>Có ít nhất 8 ký tự<br>Có ít nhất 1 chữ cái in hoa và ít nhất 1 chữ cái in thường<br>Có ít nhất 1 chữ số và ít nhất 1 ký tự đặc biệt")
        }
    })

    $("#repeat-pass").blur(function(){
        var repeatPass = $(this).val()
        var passAbove = $("#input-pass").val()
        if(passAbove === repeatPass) {
            $("#message-alert").html(" ")
            return true
        }
        else {
            $("#message-alert").html("Mật khẩu chả khớp tẹo nào!")
            return false
        }
    })

    $("#input-name").blur(function(){
        var inputName = $(this).val()
        var regInputName = /^([A-Z]{1}[a-z]+\s)+([A-Z]{1}[a-z]+)$/
        if(regInputName.test(inputName)) {
            $("#message-alert".html(" "))
            return true
        }
        else {
            $("#message-alert").html("Tên không hợp lệ!<br>Vui lòng nhập tên không dấu theo dạng * Nguyen Van A *")
            return false
        }
    })
    
})