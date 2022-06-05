let btnUp = document.getElementById("btnScroll");
window.onscroll = function(){
    if(window.pageYOffset > 400){
        btnUp.style.display="block";
    } else
     btnUp.style.display="none";
    ;
} 
btnUp.onclick = function(){
    window.scrollTo({
        top :0,
        left :0,
        behavior :"smooth"
    });
}
