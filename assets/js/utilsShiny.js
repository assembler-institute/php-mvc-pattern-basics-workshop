

var pokemonIdData = document.getElementById("pokemonIdData");
var pokemonSelectedShiny = document.getElementsByClassName("pickAPokemonShiny");
var cInfo= document.getElementById("cInfo");
var mInfo= document.getElementById("mInfo");
var btnPokedexCloseShiny = document.getElementById("cerrarPokedex");
var btnPokedexNormal = document.getElementById("modoNormal");
var btnPokedexSearchShiny = document.getElementById("buscadorPokemon");
var pokebusca=document.getElementsByClassName("pokebusca")[0];
var searchDiv = document.getElementsByClassName("buscardor")[0];


pokebusca.addEventListener("keydown",  function(){
    window.location.reload();
})

btnPokedexSearchShiny.addEventListener("click", function(){
    searchDiv.classList.toggle("buscardorVisible");
})

btnPokedexCloseShiny.addEventListener("click", function(){
    window.location.replace("./index.php")
})

btnPokedexNormal.addEventListener("click", function(){
    console.log('a');
    window.location.replace("./index.php?controller=pokemon&action=getAllPokemons")
})


for (const iterator of pokemonSelectedShiny) {
    iterator.addEventListener("click", function(e){
        if(e.path[2].id !== ""){
            window.location.replace("./index.php?controller=pokemonShiny&action=getPokemon&id="+ e.path[2].id)
        } else{
            window.location.replace("./index.php?controller=sefasdf")
        }
    })
}

function hover(element) {
    console.log(pokemonIdData);
    element.setAttribute('src', "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/shiny/" + pokemonIdData.innerHTML + ".png");
}

function unhover(element) {
    element.setAttribute('src', "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/" + pokemonIdData.innerHTML + ".png");
}

cInfo.addEventListener("click",function(e){
    window.location.replace("./index.php?controller=combat&action=combat&id="+e.target.dataset.id);
})

mInfo.addEventListener("click",function(e){
    window.location.replace("https://www.pokemon.com/es/pokedex/"+e.target.dataset.name);
})

