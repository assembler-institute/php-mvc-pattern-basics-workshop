

var pokemonSelected = document.getElementsByClassName("pickAPokemon")

for (const iterator of pokemonSelected) {
    iterator.addEventListener("click", function(e){
        window.location.replace("./index.php?controller=pokemon&action=getPokemon&id="+ e.path[2].id)
    })
}

