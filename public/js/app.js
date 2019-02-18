window.addEventListener('DOMContentLoaded', e => {
    let burger = document.getElementsByClassName('burger')[0];
    let menu = burger.parentNode;

    let searchButton = document.getElementsByClassName('search-button')[0];

    searchButton.addEventListener('click', function (e) {
        let searchClassList = this.parentNode.text.classList;
        
        if (!searchClassList.contains('open')) {
            e.preventDefault();
            searchClassList.add('open');
        }
    });

    burger.addEventListener('click', function (e) {
        e.stopImmediatePropagation();
        this.classList.toggle('active');
        menu.classList.toggle('open');
    });
    
    window.addEventListener('click', e=>{
        burger.classList.remove('active');
        menu.classList.remove('open');
    })
});
