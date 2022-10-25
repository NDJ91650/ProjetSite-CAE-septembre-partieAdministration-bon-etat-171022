// // recuperer les elements de notre page

// const pages= document.querySelectorAll(".page")

// const header= document.querySelectorAll("header")



// const nbPages= pages.length // Nombres de page du Formulaires

// let pageActive= 1;

// console.log(nbPages);


// window.onload= () =>{
// // Afficher la 1ere age du formulaire 
// document.querySelector(".page").style.display="initial"

// //affichage des numeros de page
// pages.forEach((page,index)=>{
//     //numero de page
//     let element = document.createElement("div")
//     element.classList.add("page-num")
//     if(pageActive === index +1){
//         element.classList.add("active")
//     }
//     element.innerHTML = index +1
//     header.appendChild(element)
// })
// // gerer les button suivant 
// let boutons = document.querySelectorAll("button[type=button]")

// for(let bouton of boutons){
//     bouton.addEventListener("click", pageSuivante)
// }


// }
// function pageSuivante(){
    
//     pageActive++
//     //masquer les autres pages
//     for(let page of pages){
//         page.style.display='none'
//     }
// }

const pages = document.querySelectorAll(".page")
const header = document.querySelector("header")
const nbPages = pages.length // Nombre de pages du formulaire
let pageActive = 1

// On attend le chargement de la page
window.onload = () => {
    // On affiche la 1ère page du formulaire
    document.querySelector(".page").style.display = "initial"

    // On affiche les numéros des pages dans l'entête
   
    pages.forEach((page, index) => {
        // On crée l'élément "numéro de page"
        let element = document.createElement("div")
        element.classList.add("page-num")
        element.id = "num" + (index + 1) // initialisation de l'index a 1 comme la page Active
        if(pageActive === index + 1){
            element.classList.add("active") // permet de savoir quel page a deja été traité 
        }
        element.innerHTML = index + 1
        header.appendChild(element)
    })

    // On gère les boutons "suivant"
    let boutons = document.querySelectorAll("#suivant")

    for(let bouton of boutons){
        bouton.addEventListener("click", pageSuivante)
    }

    // On gère les boutons "suivant"
    // boutons = document.querySelectorAll(".prev")

    // for(let bouton of boutons){
    //     bouton.addEventListener("click", pagePrecedente)
    // }
}

/**
 * Cette fonction fait avancer le formulaire d'une page
 */
function pageSuivante(){
    pageActive++
    for(let page of pages){
        // On masque toutes les pages
        page.style.display = "none"
    }
    this.parentElement.nextElementSibling.style.display = "initial"

    document.querySelector("#num"+pageActive).classList.add("active")

    // On affiche la page suivante

    // On "désactive" la page active
    // document.querySelector(".active").classList.remove("active")

    

    // On "active" le nouveau numéro
}

/**
 * Cette fonction fait reculer le formulaire d'une page
 */
let precedent= document.querySelectorAll('#precedent')

for (let bouton of precedent){
    bouton.addEventListener('click', pagePrecedente)

}
function pagePrecedente(){
    // On masque toutes les pages
    for(let page of pages){
        page.style.display = "none"
    }
    
    // On affiche la page precedente
    this.parentElement.previousElementSibling.style.display = "initial"
    
    // On "désactive" la page active
    document.querySelector("#num"+pageActive).classList.remove("active")
    
    // On incrémente pageActive
    pageActive--

    // On "active" le nouveau numéro
    document.querySelector("#num"+pageActive).classList.add("active")
}