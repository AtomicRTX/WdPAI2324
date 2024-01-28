function setupCancelButtons() {
    let cancelButtons = document.querySelectorAll('.cancel-btn');

    cancelButtons.forEach(function(cancelButton) {
        cancelButton.addEventListener('click', function() {
            let userId = cancelButton.getAttribute('data-user-id');
            let resId = cancelButton.getAttribute('data-res-id');
            let date = cancelButton.getAttribute('data-date');
            let hour = cancelButton.getAttribute('data-hour');
            let numberPeople = cancelButton.getAttribute('data-number-people');

            let reservationDateTime = new Date(date + " " + hour);
            let currentDateTime = new Date();
            let time = reservationDateTime - currentDateTime;
            let hours = time / (60 * 60 * 1000);

            if (hours < 1) {
                alert("Cannot cancel reservation. Less than 1 hour remaining or reservation has already happened.");
                return;
            }

            cancelButton.closest('.reservation').remove();

            fetch('/cancel_reservation', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    userId: userId,
                    resId: resId,
                    date: date,
                    hour: hour,
                    numberPeople: numberPeople,
                }),
            })
                .then(response => response.json());
        });
    });
}
document.addEventListener('DOMContentLoaded', function() {
    setupCancelButtons();
});

setInterval(function() {
    setupCancelButtons();
}, 5000);