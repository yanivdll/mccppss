let dropdown = document.querySelector('nav.page-menu'), //ul
    submenu = document.querySelector('.sub-menu'), //ul li ul
    main = document.querySelector('main'), //body
    buttonClick = document.querySelector('.check-button'), //button
    hamburger = document.querySelector('.menu-icon'); //button icon

// set an event listener on the button

buttonClick.addEventListener('click', () => {
    dropdown.classList.toggle('show-dropdown');
    main.classList.toggle('show-dropdown');
    hamburger.classList.toggle('animate-button');
    buttonClick.classList.toggle('sticky');
});

console.log('dropdown.js loaded');
