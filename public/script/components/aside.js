// chiudi tutto
const aside = document.getElementById('aclose');
const close = document.getElementById('close');
const altaside = document.getElementById('altaside');
const asd = document.getElementById('aside');

close.addEventListener('click', () =>{
    aside.style.display = 'none';
    altaside.style.display = 'block';
    document.querySelector('body').style.display = 'block';
})

altaside.addEventListener('click', () => {
    aside.style.display = 'block';
    altaside.style.display = 'none';
    document.querySelector('body').style.display = 'grid';
})

const open1 = document.getElementById('open1');
const opt1 = document.getElementById('opt1');

open1.addEventListener("click", () =>{
    if(!open1.classList.contains('rotated')) {
        open1.classList.add('rotated');
        opt1.classList.add('open');
        opt1.classList.remove('und');
    }
    else {
        open1.classList.remove('rotated');
        opt1.classList.remove('open');
        opt1.classList.add('und');
    }
})

const open2 = document.getElementById('open2');
const opt2 = document.getElementById('opt2');

open2.addEventListener("click", () =>{
    if(!open2.classList.contains('rotated')) {
        open2.classList.add('rotated');
        opt2.classList.add('open');
        opt2.classList.remove('und');
    }
    else {
        open2.classList.remove('rotated');
        opt2.classList.remove('open');
        opt2.classList.add('und');
    }
})

const open3 = document.getElementById('open3');
const opt3 = document.getElementById('opt3');

open3.addEventListener("click", () =>{
    if(!open3.classList.contains('rotated')) {
        open3.classList.add('rotated');
        opt3.classList.add('open');
        opt3.classList.remove('und');
    }
    else {
        open3.classList.remove('rotated');
        opt3.classList.remove('open');
        opt3.classList.add('und');
    }
})


// Sezione user-option
const userOption = document.getElementById('user-option');
const openOption = document.getElementById('openoption');

openOption.addEventListener('mousedown', () =>{
    if(userOption.style.display === 'none'){
        userOption.style.display = 'block';
    }else{
        userOption.style.display = 'none';
    }
})
