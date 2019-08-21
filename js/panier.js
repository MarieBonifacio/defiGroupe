let panier = document.querySelector('#panier');
let panierIcon = document.querySelector('#panier .icon');

panier.addEventListener("click", function(){
    panier.classList.toggle('active');
});
