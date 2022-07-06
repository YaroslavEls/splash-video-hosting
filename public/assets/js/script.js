document.addEventListener('DOMContentLoaded', () => {

    const arrow = document.querySelector('.arrow-top');
    const searchForm = document.getElementById('search');
    const createForm = document.getElementById('create');
    const add = document.querySelector('.add');

    // scroll arrow button
    if (arrow) {
        arrow.addEventListener('click', () => {
            document.documentElement.scrollTop = 0;
        });
    }

    // search form
    if (searchForm) {
        searchForm.addEventListener('submit', (event) => {
            event.preventDefault();
            url = searchForm.action + '/' + searchForm.elements['search'].value;
            document.location.href = url;
        });
    }

    // create list
    if (createForm) {
        document.querySelector('.create-comp').addEventListener('click', () => {
            const name = prompt('Name of the list:');
            if (!name) return;
            createForm.name.value = name;
            createForm.submit();
        });
    }

    // add menu
    if (add) {
        const addMenu = document.querySelector('.add-menu');
        const addForm = document.getElementById('add');

        add.addEventListener('click', () => {
            addMenu.classList.toggle('disabled');
        });

        for (let i = 0; i < addMenu.children.length; i++) {
            addMenu.children[i].addEventListener('click', (event) => {
                console.log(event.target.getAttribute('comp_id'))
                addForm.list.value = event.target.getAttribute('comp_id');
                addForm.submit();
            });
        }
    }

});