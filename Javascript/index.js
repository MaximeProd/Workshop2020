var cursor = document.getElementById('cursor');
var button = document.getElementById('button');
var accueil = document.getElementById('accueil');
var exemple = document.getElementById('exemple');
var boutique = document.getElementById('boutique');
var contact = document.getElementById('contact');

var inelement = 0;
var xmouse = 0;
var ymouse = 0;

window.addEventListener('mousemove',function(){
    xmouse = event.clientX-10;
    ymouse = event.clientY-10;
    if (inelement == 0){
        cursor.style.left = xmouse+"px";
        cursor.style.top = ymouse+"px";
    }
});

movewithcursor(button);
movewithcursor(title);
movewithcursor(accueil);
movewithcursor(exemple);
movewithcursor(boutique);
movewithcursor(contact);


function movewithcursor(elementtomove){
    elementtomove.addEventListener('mouseenter',function(){
        inelement = 1;
        cursor.style.transition = "0.1s all";
        setTimeout(function(){
            cursor.style.transition = "0s all";
        },200)
        cursor.style.width = "40px";
        cursor.style.height = "40px";
    });

    elementtomove.addEventListener('mouseout',function(){
        inelement = 0;
        cursor.style.width = "20px";
        cursor.style.height = "20px";

        cursor.style.transition = "0.1s all";
        setTimeout(function(){
            cursor.style.transition = "0s all";
        },200)

        elementtomove.firstChild.style.transition = "0.5s all";
        setTimeout(function(){
            elementtomove.firstChild.style.transition = "0s all";
        },500);
        elementtomove.firstChild.style.transform = "translateX(0) translateY(0)";
    });

    elementtomove.addEventListener('mousemove',function(){
        var rect = elementtomove.getBoundingClientRect();
        if (inelement == 1){
            //calculer la force pour réduire le mouvement du curseur
            var forcewidth = xmouse - (rect.left + elementtomove.clientWidth/2 -10);
            var forceheight = ymouse - (rect.top + elementtomove.clientHeight/2 -10);

            //on déplace le curseur en appliquant la force
            cursor.style.left = rect.left + elementtomove.clientWidth/2 -20 + forcewidth/2.5 + "px";
            cursor.style.top = rect.top + elementtomove.clientHeight/2 -20 + forceheight/2 + "px";

            var moveleft = forcewidth/4.5;
            var movetop = forceheight/4;

            elementtomove.firstChild.style.transform = "translateX(" + moveleft + "px) translateY("+movetop+"px)";
        }
    });
}