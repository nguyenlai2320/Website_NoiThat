var modal = document.getElementById("myModalProduct");
var btn = document.getElementById("btn-insert-pd");
var span = document.getElementsByClassName("close-product")[0];

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