function autoSubmitForm() {
    let countdown = 60;
    let timerElement = document.getElementById('timer'); 
    let progressElement = document.querySelector('.clock'); 

    let timerInterval = setInterval(function() {
        countdown--;

        timerElement.innerText = countdown + " seconds remaining";

        var progressValue = (countdown / 60) * 100;
        progressElement.value = progressValue;
        progressElement.innerHTML = Math.round(progressValue) + "%";

        if (countdown <= 20) {
            progressElement.classList.remove('is-primary', 'is-warning');
            progressElement.classList.add('is-danger');
        } else if (countdown <= 40) {
            progressElement.classList.remove('is-primary');
            progressElement.classList.add('is-warning');
        }

        if (countdown <= 0) {
            clearInterval(timerInterval);
            document.getElementById('auto-submit-form').submit();
        }
    }, 1000);

    setTimeout(function() {
        document.getElementById('auto-submit-form').submit();
    }, 60000); // 60000 milliseconds = 60 seconds
}

autoSubmitForm();