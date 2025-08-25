
let booksTitles = [
    {title: "Nata a Tokio, morta a Palestrina", author : "Roberto Santarelli", img : '/Tokio.jpg'},
    {title: "E se ti dicessi che mi piace uccidere? ", author : "Roberto Santarelli", img : '/kill.png' },
    {title: "Terrazza vista strada", author : "Roberto Santarelli", img : '/Terrazza.jpg'},
    {title: "La macchia d'inchiostro", author : "Roberto Santarelli", img : '/macchia.png'}
];

let cardWrapper = document.querySelector('#cardWrapper');



function showBooks() {
    booksTitles.forEach((book)=>{
        let div = document.createElement('div');
        div.classList.add('card-custom');
        div.innerHTML = `
              <div id="cardWrapper">
              <img src="${book.img}" class="card-img-top" alt="Immagine Copertina" id="fightCard">
              <p class="h4">${book.title}</p>
              <p class="h5">${book.author}</p>
              
              `
        cardWrapper.appendChild(div);

    })
    
}
showBooks();