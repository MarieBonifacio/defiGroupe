var editsCats = document.querySelectorAll(".editCat");
var deletesCats = document.querySelectorAll(".deleteCat");

editsCats.forEach(function(edit){
    edit.addEventListener('click', function(){
        editCategory(this.getAttribute('rel'));
    });
});

deletesCats.forEach(function(del){
    del.addEventListener('click', function(){
        deleteCategory(this.getAttribute('rel'));
    });
});

function editCategory(id){
    var popEditBack = document.createElement('div');
    var pop = document.createElement('div');
    var form = document.createElement('form');
    var hidden = document.createElement('input');
    var h5 = document.createElement('h5');
    var button = document.createElement('button');

    popEditBack.id = 'popEditBack';
    pop.id = "popEdit";
    form.action = "./controller/admin_category.php";
    form.method = "post";
    h5.textContent = 'Editer categorie';
    hidden.type = 'hidden';
    hidden.name = 'id';
    hidden.value = id;
    button.type = 'submit';
    button.name = 'action';
    button.value = 'Editer';
    button.innerText = 'Enregistrer';
    button.id='buttonForm';

    popEditBack.appendChild(pop);
    pop.appendChild(form);
    form.appendChild(h5);
    form.appendChild(hidden);

    var divLine = document.querySelectorAll("#editLine_"+id+" .info");

    divLine.forEach(function(div){
        var value = div.innerText;
        var input = document.createElement('input');
        input.type = "text";
        input.name = div.getAttribute('rel');
        input.value = value;
        form.appendChild(input);
    });

    form.appendChild(button);

    document.querySelector('body').appendChild(popEditBack);

    popEditBack.addEventListener('click',removePop, 0);
}

function deleteCategory(id){
    var popEditBack = document.createElement('div');
    var pop = document.createElement('div');
    var form = document.createElement('form');
    var hidden = document.createElement('input');
    var h5 = document.createElement('h5');
    var button = document.createElement('button');

    popEditBack.id = 'popEditBack';
    pop.id = "popEdit";
    form.action = "./controller/admin_category.php";
    form.method = "post";
    h5.textContent = 'Supprimer la catégorie '+id+' ?';
    hidden.type = 'hidden';
    hidden.name = 'id';
    hidden.value = id;
    button.type = 'submit';
    button.name = 'action';
    button.value = 'Supprimer';
    button.innerText = 'Confirmer';
    button.id='buttonForm';

    popEditBack.appendChild(pop);
    pop.appendChild(form);
    form.appendChild(h5);
    form.appendChild(hidden);
    form.appendChild(button);

    document.querySelector('body').appendChild(popEditBack);

    popEditBack.addEventListener('click',removePop, 0);
}

function removePop(e){
    if(e.target.id == "popEditBack"){
        e.target.remove();
    }
}
