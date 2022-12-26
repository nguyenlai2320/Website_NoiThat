var modal = document.getElementById("myModalCustomer");
var btn = document.getElementById("btn-insert-cus");
var span = document.getElementsByClassName("close-customer")[0];

btn.onclick = function(){
    modal.style.display = "block";
}
span.onclick = function(){
    modal.style.display = "none";
}
window.onclick = function(event){
    if(event.target == modal) {
        modal.style.display = "none"
    }
}