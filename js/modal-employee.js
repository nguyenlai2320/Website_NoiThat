var modal = document.getElementById("myModalEmployee");
var btn = document.getElementById("btn-insert-emp");
var span = document.getElementsByClassName("close-employee")[0];

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