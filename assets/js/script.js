//buttons change location
function changeToArtists() {
    window.location = "?controller=artists&action=getAllArtists";
}

function changeToArtwork() {
    window.location = "?controller=artworks&action=getAllCategories";
}

function formatPrice(num) {
    const numToFormat = parseInt(num.innerText);
    const formatter = new Intl.NumberFormat('es-ES', {
        style: 'currency',
        currency: 'EUR'
    })

    num.innerText = formatter.format(numToFormat);
}

function purchaseDone() {
    const id = document.querySelector(".productImg").dataset.id;
    return window.location = "?controller=artworks&action=purchaseArtwork&id=" + id;
}