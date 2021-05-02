window.addEventListener("load",backForward,false);

function backForward(){
    document.getElementById("back").addEventListener("click",
    function(){
        window.history.back();

    },false);
    document.getElementById("forward").addEventListener("click",
    function(){
        window.history.forward();

    },false);
}