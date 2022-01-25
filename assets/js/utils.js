window.addEventListener("DOMContentLoaded", async () => {
    if(document.getElementById("types")) {
        const response = await getTypes("all");
        displayPokemons(response);

        document.getElementById("types").addEventListener("change", async (e) => {
            const response = await getTypes(e.target.value);
            displayPokemons(response);
        })
    }

    if (document.getElementById("cards-type")) {
        const cardsType = document.querySelectorAll(".cards-type > .card");

        for (const cardType of cardsType) {
            cardType.addEventListener("click", async (e) => {
                const card = e.target.parentNode;
                const cardTitle = card.querySelector(".card-title");
                const typesStrong = await getTypeStrong(cardTitle.textContent);
                displayTypesStrong(typesStrong);
                const typesWear = await getTypeWear(cardTitle.textContent);
                displayTypesWear(typesWear);
            });
        }
    }
});

async function getTypes(nameType) {
    const response =  await fetch(`?controller=pokemon&action=getPokemonsByType&nameType=${nameType}`);
    const data = await response.json();
    return data;
}

async function getTypeStrong(nameType) {
    const response =  await fetch(`?controller=typePokemon&action=getAllTypeByStrong&nameTypeStrong=${nameType}`);
    const data = await response.json();
    return data;
}

async function getTypeWear(nameType) {
    const response =  await fetch(`?controller=typePokemon&action=getAllTypeByWear&nameTypeWear=${nameType}`);
    const data = await response.json();
    return data;
}

async function displayPokemons(pokemons) {
    clearDisplays(document.querySelector(".card-pokemons"));

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

async function displayTypesStrong(typesStrong) {
    clearDisplays(document.getElementById("types-strong"));
    document.getElementById("types-strong").insertAdjacentHTML("beforeend", "<h5>TIPOS EFICACES</h5>");
    for (const typeStrong of typesStrong) {
        const template = `<p>${typeStrong.name}</p>`;
        document.getElementById("types-strong").insertAdjacentHTML("beforeend", template);
    }
}

async function displayTypesWear(typesWear) {
    clearDisplays(document.getElementById("types-wear"));
    document.getElementById("types-wear").insertAdjacentHTML("beforeend", "<h5>TIPOS DEBILES</h5>");
    for (const typeWear of typesWear) {
        const template = `<p>${typeWear.name}</p>`;
        document.getElementById("types-wear").insertAdjacentHTML("beforeend", template);
    }
}

async function clearDisplays(dom) {
    while (dom.firstChild) {
        dom.lastChild.remove();
    }
}