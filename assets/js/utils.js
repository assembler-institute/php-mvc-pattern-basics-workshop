

var pokemonSelected = document.getElementsByClassName("pickAPokemon");
var cInfo= document.getElementById("cInfo");
var mInfo= document.getElementById("mInfo");


for (const iterator of pokemonSelected) {
    iterator.addEventListener("click", function(e){
        window.location.replace("./index.php?controller=pokemon&action=getPokemon&id="+ e.path[2].id)
    })
}

cInfo.addEventListener("click",function(e){
    window.location.replace("./index.php?controller=combat&action=combat&id="+e.target.dataset.id);
})

mInfo.addEventListener("click",function(e){
    window.location.replace("https://www.pokemon.com/es/pokedex/"+e.target.dataset.name);
})

