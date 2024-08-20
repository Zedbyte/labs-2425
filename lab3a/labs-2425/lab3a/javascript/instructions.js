$checkbox = document.querySelector('.agree');
$nextBtn = document.querySelector('.button');

$nextBtn.disabled = true;
$checkbox.addEventListener('change', ()=> {
    $nextBtn.disabled = !$checkbox.checked;
});

