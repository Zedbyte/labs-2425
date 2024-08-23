let checkbox = document.querySelector('.agree');
let nextBtn = document.querySelector('.button');

nextBtn.disabled = true;
checkbox.addEventListener('change', ()=> {
    nextBtn.disabled = !checkbox.checked;
});

