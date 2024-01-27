document.addEventListener('DOMContentLoaded', function() {
    let reservation = document.querySelector('.cancel-btn');

    reservation.addEventListener('click', function() {
        window.location.href = '/cancel_reservation';
    });
});