let bg_color = document.getElementById('bg-color');
let color = document.getElementById('color');
let cardname = document.getElementById('cardname');
let card = document.getElementById('card');
let nameOnCard = document.getElementById('nameOnCard');


bg_color.addEventListener('input', () =>{
    card.style.backgroundColor = bg_color.value;
})

color.addEventListener('input', () =>{
    card.style.color = color.value;
})

cardname.addEventListener('input', () => {
    nameOnCard.innerHTML = cardname.value;
})
