
    // var tabImages = new Array(3);
    ChangeImage()
    // tabImages[0] ="./images/amaze-lunette.jpg";
    // tabImages[1] = "./images/cuvette-de-luxe-noir.jpg";
    // tabImages[2] = "./images/cuvette-suspendre-haut-gamme-ceramique-noire.jpg";

    function ChangeImage() {
        // document.getElementById("imgSliderPromo").src = tabImages[numImage];
        // if (numImage == 2) {
        //     numImage = 0;
        // } else{
        //     numImage++;
        // }
        let slidePromoImgs = document.querySelectorAll("#SlidePromo img");
        let numSlide = document.querySelector('#SlidePromo').getAttribute('rel');
        slidePromoImgs.forEach(function(img){
            img.classList.remove('show');
        });
        slidePromoImgs[numSlide].classList.add('show');
        numSlide++;
        if(numSlide >= slidePromoImgs.length){
            numSlide = 0;
        }
        document.querySelector('#SlidePromo').setAttribute('rel', numSlide);
        setTimeout("ChangeImage()", 5000);
    };
