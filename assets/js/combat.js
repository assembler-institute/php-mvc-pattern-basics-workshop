var imgPoke = document.getElementById("imgPoke");

imgPoke.addEventListener("click", function (e){
    console.log();
    if(imgPokeDiv.innerHTML !== ""){
        window.location.replace("./index.php?controller=pokemon&action=getPokemon&id="+ imgPokeDiv.innerHTML)
    } else{
        window.location.replace("./index.php?controller=error")
    }
})