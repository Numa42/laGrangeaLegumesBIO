window.addEventListener('scroll', function() {
    var header = document.getElementById('header');
    var banner = document.querySelector('.banner');
    var bannerHeight = banner.offsetHeight;
    var scrollPosition = window.scrollY;

    if (scrollPosition >= bannerHeight) {
        header.style.position = 'relative';
    } else {
        header.style.position = 'sticky';
    }
});