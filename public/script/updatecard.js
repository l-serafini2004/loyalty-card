
// Delete section data
const deletesecion = document.getElementById('delete-section');

const buttons = document.querySelectorAll('.delete');

const inputhid = document.getElementById('hiddeninput');

const retryButton = document.getElementById('retry-button');

buttons.forEach(function (button){
    button.addEventListener('click', () =>{
        inputhid.value = button.id;
        deletesecion.classList.remove('hid');
        deletesecion.classList.add('vis');
    })
})

retryButton.addEventListener('click', () =>{
    deletesecion.classList.remove('vis');
    deletesecion.classList.add('hid');
})
