async function fetchJeuxData(url) {
    try {
        const response = await fetch(url);
        return await response.json();
    }
    catch (e) {
        console.error('Impossible de charger les données : ' + e);
    }
}

fetchJeuxData('datas/jeux.json')
    .then((jeux) => {
        // displayJeux(jeux);
        filterElement();
    })

// function displayJeux(jeux) {
//     document.getElementById('jeux-container').append(...jeux.map(createJeuElement));
// }

// function createJeuElement(jeu) {
//     // Copy template
//     const jeuElement = document.importNode(document.getElementById('jeu-template').content, true);

//     // Put the name
//     jeuElement.querySelector('.jeu-ttl').textContent = jeu.name;

//     // Set data-id
//     jeuElement.querySelector('.jeu-itm').dataset.id = jeu.id;

//     // Set data-editor
//     jeuElement.querySelector('.jeu-itm').dataset.editor = jeu.editor;

//     // Set data-players
//     jeuElement.querySelector('.jeu-itm').dataset.joueur = jeu.joueur;

//     // Set data-age
//     jeuElement.querySelector('.jeu-itm').dataset.age = jeu.age;

//     // Change image
//     const img = jeuElement.querySelector('.jeu-img');
//     img.src = jeu.image;
//     img.alt = jeu.name;

//     // Price

//     jeuElement.querySelector('.jeu-price').textContent = jeu.price

//     return jeuElement;
// }

// Filter

function filterElement() {
    const all = 'Tous'
    document.querySelectorAll('.filtre-item-age').forEach(filtre => {
        filtre.addEventListener('click', function (event) {
            document.querySelectorAll('.jeu-itm').forEach(game => {
                game.classList.remove('active1');
                if (game.dataset.age === event.target.textContent) return;
                game.classList.toggle('active1');
                event.target.closest('.dropdown').querySelector('.btn').textContent = event.target.textContent;
                if (event.target.textContent === all) game.classList.remove('active1');
            });
        });
    });
    document.querySelectorAll('.filtre-item-editor').forEach(filtre => {
        filtre.addEventListener('click', function (event) {
            document.querySelectorAll('.jeu-itm').forEach(game => {
                game.classList.remove('active1');
                if (game.dataset.editor === event.target.textContent) return;
                game.classList.toggle('active1');
                event.target.closest('.dropdown').querySelector('.btn').textContent = event.target.textContent;
                if (event.target.textContent === all) game.classList.remove('active1');
            });
        });
    });
    document.querySelectorAll('.filtre-item-joueur').forEach(filtre => {
        filtre.addEventListener('click', function (event) {
            document.querySelectorAll('.jeu-itm').forEach(game => {
                game.classList.remove('active1');
                if (game.dataset.joueur === event.target.textContent) return;
                game.classList.toggle('active1');
                event.target.closest('.dropdown').querySelector('.btn').textContent = event.target.textContent;
                if (event.target.textContent === all) game.classList.remove('active1');
            });
        });
    });
}
