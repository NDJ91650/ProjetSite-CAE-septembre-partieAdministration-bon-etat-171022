let madame = document.getElementById("madame");
let monsieur = document.getElementById("monsieur");
let champs = document.getElementById("nom-naissance");
let valChamps = document.getElementById("input-nom-naissance");

// champs.style.display = "none";

madame.addEventListener("click", () => {
    if (madame) {
        // champs.style.transition="2s";
        champs.style.display = "block";
        valChamps.value="";
    }
})

monsieur.addEventListener("click", () => {
    if (monsieur) {
        champs.style.display = "none";
        valChamps.value="/";
    }
})

show= true;
function changer(){
    if(show){
        document.getElementById("mdp_utilisateur").setAttribute("type", "text");
        document.getElementById("eyes").src="./public/img/view.png";
        show=false; 
    }else{
        document.getElementById("mdp_utilisateur").setAttribute("type", "password");
        document.getElementById("eyes").src="./public/img/hide.png";
        show=true; 
    }
}













// document.querySelector(".mvt-maitres").style.color="#000";

// console.log("Par ici");

// if()


// var nom_jeunefille = document.querySelector("")

// function champsJeunefille(){
//     let val=ObjSlect.value;
//     if(val=="madame"){
//         document.getElementById("nom-jeunefille").style.display="block";
//     }else{
//         document.getElementById("nom-jeunefille").style.display="none";
//     }
// }