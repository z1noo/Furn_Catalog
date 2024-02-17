document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.menu-toggle');
    const container = document.querySelector('.container');

    toggleButton.addEventListener('click', function () {
        container.classList.toggle('active');
    });
});
