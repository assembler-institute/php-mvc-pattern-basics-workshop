var pokedex= document.getElementById("pokedex")

pokedex.addEventListener("click",function(){
    window.location.replace("./index.php?controller=pokemon&action=getAllPokemons");
})

