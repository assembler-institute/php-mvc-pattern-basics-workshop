window.addEventListener("DOMContentLoaded", async () => {
    if(document.getElementById("types")) {
        const response = await getTypes("all");
        displayPokemons(response);

        document.getElementById("types").addEventListener("change", async (e) => {
            const response = await getTypes(e.target.value);
            displayPokemons(response);
        })
    }
});

async function getTypes(nameType) {
    const response =  await fetch(`?controller=pokemon&action=getPokemonsByType&nameType=${nameType}`);
    const data = await response.json();
    return data;
}

async function displayPokemons(pokemons) {
    clearDisplayPokemons(document.querySelector(".card-pokemons"));

    for (const pokemon of pokemons) {
        const template = `
        <article class="card">
            <img class="card-img-top card-img-top-poke" src="${pokemon.avatar}" alt="">
            <div class="card-body">
                <h5 class="card-title">Nº${pokemon.id}: ${pokemon.name}</h5>
                <p class="card-text"></p>
                <a href="?controller=pokemon&action=getPokemon&id=${pokemon.id}" class="btn btn-primary">Más información</a>
            </div>
        </article>`;
        document.querySelector(".card-pokemons").insertAdjacentHTML("beforeend", template);
    }
}

async function clearDisplayPokemons(dom) {
    while (dom.firstChild) {
        dom.lastChild.remove();
    }
}