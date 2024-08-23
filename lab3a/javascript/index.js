let nextBtn = document.querySelector('.button');
let inputs = document.querySelectorAll('.required');

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function checkInputs() {
    let allFilled = true;
    inputs.forEach(input => {
        const name = input.getAttribute('name');
        const value = input.value.trim();
        
        if (value === '') {
            allFilled = false;
        }
        if (name === 'email') {
            if (!isValidEmail(value)) {
                allFilled = false;
            }
        }
    });

    nextBtn.disabled = !allFilled;
}

inputs.forEach(input => {
    input.addEventListener('input', checkInputs);
});

checkInputs();