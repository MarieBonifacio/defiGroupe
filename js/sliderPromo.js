
    var tabImages = new Array(3);
    var numImage = 0;
    tabImages[0] ="big1.jpg";
    tabImages[1] = "blue1.jpg";
    tabImages[2] = "BLue2.jpg";

    function ChangeImage() {
        document.getElementById("imgSliderPromo").src = tabImages[numImage];
        if (numImage == 2) {
            numImage = 0;
        } else{ 
            numImage++;
        }
        setTimeout("ChangeImage()", 5000);
    };

