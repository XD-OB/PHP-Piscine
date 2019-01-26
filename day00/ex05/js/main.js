const advance = document.querySelector('#side[alt=Avancer]');
const talk = document.querySelector('#side[alt=Parler]');
const mainImg = document.querySelector('#cluster');
const imgs = ['cluster.jpg', '1337.png', 'bab.jpg', 'window.jpg', 'e3.png', 'bocal.jpg'];
let i = 0;

advance.addEventListener('click', e => {
    i = i + 1 < 6 ? i + 1 : 0;
    mainImg.setAttribute('src', 'resources/' + imgs[i]);
});

talk.addEventListener('click', e => document.querySelector('.field').classList.toggle('shown'));

window.addEventListener('load', e => {
    document.querySelector("#form").addEventListener("submit", game)
    const loupe = document.querySelector("#loop");
    loupe.addEventListener("click", e => {
        if (!document.querySelector('.img-magnifier-glass')) {
            magnify("cluster", 2);
            document.querySelector('.img-magnifier-glass').classList.add('shown');
        } else
            document.querySelector('.img-magnifier-glass').classList.toggle('shown');
    }, false);
});