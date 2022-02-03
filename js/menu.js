//gets burger icon
const burger = document.querySelector('.burger'); 

//gets main menu nav
const menu = document.querySelector('.top-menu'); 

/*gets main menu list items with class .menu-item, excludes menu items in the 
sub-menu class (keeps animation timing consistent)*/
const menuLinks = document.querySelectorAll('.menu-item:not(.sub-menu .menu-item)'); 



//Function for opening main menu using burger button
function openNav(){

 
    //Toggles menu
    burger.addEventListener('click', () => {

        menu.classList.toggle('top-menu-active'); //applies css for smaller screens
        burger.classList.toggle('burgerX'); //transforms icon to an X

        linkAnimate(menuLinks);

    });


    jQuery(document).on("click", function(e) {
        if (jQuery(e.target).closest(".top-menu-active").length == 0 && jQuery(".top-menu").hasClass("top-menu-active") 
        && jQuery(e.target).closest(".burger").length == 0)
        {
            menu.classList.toggle('top-menu-active'); //applies css for smaller screens
            burger.classList.toggle('burgerX'); //transforms icon to an X


            linkAnimate(menuLinks);

        }
    })
}




//Variable for all main menu options that have a sub
const hasSub = document.querySelectorAll('.menu-item-has-children');

//Variable for sub menu content
const subOptions = document.querySelectorAll('.sub-menu');


//Function handles opening sub menu options on smaller screens
function openSub(){

    //for every menu option that has a sub menu...
    for (let i = 0; i < hasSub.length; i++){
        hasSub[i].addEventListener('click', function() { //...add a listener for clicks

            subOptions[i].classList.toggle('sub-menu-active'); //and toggle the sub's class to display

        });
    }


}


function linkAnimate(links){

    //Menu link animation
    links.forEach((link, index) => {
    
        if (link.style.animation){
            link.style.animation = ''
        }

        else{
            link.style.animation = `mainFade 0.5s ease forwards ${index / 7 + 0.5}s`;
        }
    });
}



//Handler for functions
function runScript(){
    openNav();
    openSub();
}


runScript();


