let btnClear = document.querySelector('delete');
let inputs = document.querySelectorAll('input');
 
btnClear.addEventListener('click', () => {
    inputs.forEach(input =>  input.value = '');
});