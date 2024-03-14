document.addEventListener("DOMContentLoaded", function ()
{
// Code to be executed when the DOM is ready (i.e. the document is
// fully loaded):
registerEventListeners(); // You need to write this function...
activateMenu();
});

var currentPopup = null;

function registerEventListeners(){
    
    var thumbnails = document.getElementsByClassName("img-thumbnail");

    if (thumbnails !== null && thumbnails.length > 0) {
        for(var i = 0; i < thumbnails.length; i++) {
            var thumbnail = thumbnails[i];
            thumbnail.addEventListener("click", toggleImage);
        }
    }
    else {
        console.log("No thumbnails found.");
    }

};


function toggleImage(e) {
    console.log("e.target.src: " + e.target.src);
    console.log("e.currentTarget.src: " + e.currentTarget.src);
    console.log("this.src: " + this.src);
    var idPopup = e.target.alt;
    var popup = document.getElementById(idPopup);
    var isSmallImage = e.target.src.includes("_small");
    var largeImage = isSmallImage ? e.target.src.replace("_small", "_large") : e.target.src;
    
    
    // Close the popup if it's already open
    if (currentPopup !== null) {
        currentPopup.remove();
        currentPopup = null;
        return;
    }

    popup = document.createElement("span");
    popup.id = idPopup;
    popup.setAttribute("class", "img-popup");
    popup.innerHTML = "<img src='" + largeImage + "'>";
    e.target.insertAdjacentElement("afterend", popup);
    currentPopup = popup;

    popup.addEventListener("click", function () {
        popup.remove();
        currentPopup = null;
    });
};

function activateMenu()
{
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link =>
    {
        if (link.href === location.href)
        {
            link.classList.add('active');
        }
    })
}



