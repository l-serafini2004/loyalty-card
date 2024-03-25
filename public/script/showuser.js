
// All the inputs
const inputs = document.querySelectorAll('input[type=text]');

// Select
const select = document.querySelector('select');

// Clear button
const clear = document.getElementById('clear');

clear.addEventListener("click", () =>{
    inputs.forEach(input =>{
        input.value = "";
    })

    select.value = "none";
})
