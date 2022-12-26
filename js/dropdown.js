let dropdown = document.querySelector('.menu'), //ul
    submenu = document.querySelector('.sub-menu'), //ul li ul
    buttonClick = document.querySelector('.check-button'), //button
    hamburger = document.querySelector('.menu-icon'); //button icon


// set an event listener on the button

buttonClick.addEventListener('click', () => {
    dropdown.classList.toggle('show-dropdown');
    hamburger.classList.toggle('animate-button');

    // This ensures that submenus are shown when the main menu is shown (based on a comment to lesson #19)
    if (submenu.length > 0) {
        [...submenu].forEach(function (item) {
            item.classList.toggle('show-dropdown');
        });
    }
});