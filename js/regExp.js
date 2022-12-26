$(document).ready(function(){

    $("#input-user").blur(function(){
        var inputUser = $(this).val()
        var regInputUser = /^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[A-Za-z0-9._]+(?<![_.])$/
        if(regInputUser.test(inputUser)) {
            $("#message-alert").html(" ")
            return true
        }
        else {
            $("#message-alert").html("Tên tài khoản không hợp lệ!<br>Chỉ chứa chữ, số, dấu gạch dưới (_) và dấu chấm (.)<br>Không được bắt đầu bằng dấu gạch dưới (_) và dấu chấm (.)<br>Độ dài từ 8 đến 20 ký tự")
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
    
})