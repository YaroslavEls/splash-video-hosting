document.addEventListener('DOMContentLoaded', () => {

    // scroll arrow button
    document.querySelector('.arrow-top').addEventListener('click', () => {
        document.documentElement.scrollTop = 0;
    });

    //search form
    const form = document.getElementById('search');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        url = form.action + '/' + form.elements['search'].value;
        document.location.href = url;
    });

});