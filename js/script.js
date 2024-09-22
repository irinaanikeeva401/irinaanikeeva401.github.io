window.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.menu_320px'),
    menuItem = document.querySelectorAll('.nav__item'),
    hamburger = document.querySelector('.hamburger');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('hamburger_active');
        menu.classList.toggle('menu_320px_active');
    });

    menuItem.forEach(item => {
        item.addEventListener('click', () => {
            hamburger.classList.toggle('hamburger_active');
            menu.classList.toggle('menu_320px_active');
        })
    })
})