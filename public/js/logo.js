document.addEventListener('DOMContentLoaded', function() {
    let logo = document.querySelector('.logo img');

    logo.addEventListener('click', function() {
        window.location.href = '/home_page';
    });
});