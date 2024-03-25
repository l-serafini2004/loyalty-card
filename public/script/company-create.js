
// Array per i valori
const prices = ['0,00', '3,99', '8,99'];
const plans = ['Free', 'Premium', 'Business']


// Checkout
let prezzo = document.getElementById("price");
let tipoAbb = document.getElementById("plan");


// Abbonamento
const abbonamento = document.getElementById("tipoAbb");


// Funzione per controllare
abbonamento.addEventListener('change', () =>{
    let selectOption = abbonamento.options[abbonamento.selectedIndex];

    // Cambia i valori
    prezzo.innerHTML = prices[parseInt(selectOption.getAttribute('id'))];
    tipoAbb.innerHTML = plans[parseInt(selectOption.getAttribute('id'))];

});
