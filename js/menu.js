

var button = document.querySelector("#button");
var menu = document.querySelector(".menuburger");

function active(){
    menu.classList.toggle("menuburgeractive");
    
}
button.addEventListener("click", active);


var opensearch = document.querySelector(".opensearch");
var searchbar = document.querySelector(".searchbar");




function appear(){
    searchbar.classList.toggle("searchbaractive"); //Fais apparaître la barre de recherche
    opensearch.classList.toggle("opensearchdisappear"); //Fais disparaitre la loupe de recherche après que la barre soit apparu
    document.querySelector(".searchbar input").focus();
    document.querySelector(".searchbar input").addEventListener("blur", function(){
        searchbar.classList.toggle("searchbaractive");
        opensearch.classList.toggle("opensearchdisappear");
    })
    
    
    
}
opensearch.addEventListener("click", appear );



