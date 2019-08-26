//Choix couleurs
var choixcouleurs = document.querySelector(".choixCouleurs");
var couleurs = document.querySelector(".couleurs")


//Choix formes
var choixformes =document.querySelector(".choixFormes");
var formes = document.querySelector(".formes");


//Choix matières
var choixmatieres =document.querySelector(".choixMatieres");
var matieres = document.querySelector(".matieres");

//Fonctions

function choixCouleurs(){
    couleurs.classList.toggle("couleursappear");
    
    
}

function choixFormes(){
    formes.classList.toggle("formesappear");
    
}

function choixMatieres(){
    matieres.classList.toggle("matieresappear");
}



choixmatieres.addEventListener("click", choixMatieres);

choixformes.addEventListener("click", choixFormes);

choixcouleurs.addEventListener("click", choixCouleurs);


