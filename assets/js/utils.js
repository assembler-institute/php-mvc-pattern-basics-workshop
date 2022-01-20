

var pokemonSelected = document.getElementsByClassName("pickAPokemon");
var pokemonIdData = document.getElementById("pokemonIdData");
var cInfo= document.getElementById("cInfo");
var mInfo= document.getElementById("mInfo");
var btnPokedexClose = document.getElementById("cerrarPokedex");
var btnPokedexShiny = document.getElementById("modoShiny");
var btnPokedexSearch = document.getElementById("buscadorPokemon");
var pokebusca=document.getElementsByClassName("pokebusca")[0];


pokebusca.addEventListener("keydown",  function(e){
    var a= pokebusca.value
    window.location.reload();
    pokebusca.value=a;
})


btnPokedexClose.addEventListener("click", function(){
    window.location.replace("./index.php")
})

btnPokedexShiny.addEventListener("click", function(){
    console.log('a');
    window.location.replace("./index.php?controller=pokemonShiny&action=getAllPokemons")
})


for (const iterator of pokemonSelected) {
    iterator.addEventListener("click", function(e){
        if(e.path[2].id !== ""){
            window.location.replace("./index.php?controller=pokemon&action=getPokemon&id="+ e.path[2].id)
        } else{
            window.location.replace("./index.php?controller=sefasdf")
        }
    })
}

function hover(element) {
    console.log(pokemonIdData);
    element.setAttribute('src', "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/" + pokemonIdData.innerHTML + ".png");
}

function unhover(element) {
    element.setAttribute('src', "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" + pokemonIdData.innerHTML + ".png");
}

cInfo.addEventListener("click",function(e){
    window.location.replace("./index.php?controller=combat&action=combat&id="+e.target.dataset.id);
})

mInfo.addEventListener("click",function(e){
    window.location.replace("https://www.pokemon.com/es/pokedex/"+e.target.dataset.name);
})

