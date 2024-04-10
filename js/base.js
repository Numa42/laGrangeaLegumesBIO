const menuIcon = document.getElementById("menuIcon");
const menuClose = document.getElementById("menuClose");
const menu = document.getElementById("nav");

function toggleStatus() {
    if (menuIcon.style.display === 'none') {
        menuIcon.style.display = 'block';
        menuClose.style.display = 'none';
        menu.style.display = 'none';
    } else {
        menuIcon.style.display = 'none';
        menuClose.style.display = 'block';
        menu.style.display = 'flex';
    }
}