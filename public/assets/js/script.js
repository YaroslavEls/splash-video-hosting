document.addEventListener('DOMContentLoaded', () => {

    const arrow = document.querySelector('.arrow-top');
    const searchForm = document.getElementById('search');
    const createForm = document.getElementById('create');
    const add = document.querySelector('.add');
    const addMenu = document.querySelector('.add-menu');
    const addForm = document.getElementById('add');
    const filterForm = document.getElementById('filter');

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
    if (addMenu) {
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

    // filter form
    if (filterForm) {
        document.querySelectorAll('.tag').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('on');
            })
        });

        filterForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const results = [];
            for (let i = 0; i < (event.target.length-1); i++) {
                if (event.target[i].checked == true) {
                    results.push(event.target[i].name);
                }
            }
            url = filterForm.action + '/' + results.join('+'); 
            document.location.href = url;
        });
    }

});