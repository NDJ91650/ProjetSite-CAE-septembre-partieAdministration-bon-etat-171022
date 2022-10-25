// var choixDept = document.getElementById("choixDept");
// var typeMutation = document.querySelector("#type-mutation");

var ajout = document.getElementById("ajout-academie");
var original = document.getElementById('liste-academie-souhaite');
var btnclose = document.getElementById("btn-close");
btnclose.style.display="none";
btnclose.style.color="red";


var academie = document.getElementById("academie-souhaite");
academie.addEventListener("click", initAcademie());

var tousDept = document.getElementById("tous-dept");
var dept = document.getElementById("departement");
var typeContrat = document.getElementById("type-contrat-souhaite");
var nbHeures = document.getElementById("nb-heures-souhaite");
var motif = document.getElementById("motif-demande");
var autreMotif = document.getElementById("autre-motif");
var justificatif = document.getElementById("justificatif-motif");

// var Depts = document.getElementById("choixDepts");
// var depts_souhaite = document.getElementById("dept-souhaite");

// var parent = document.getElementById("page4");
// var ext = document.getElementById("mutation-ext");
// si mutation-ext choisi, mettre toute les academies sauf VERSAILLES
// Si boutton cliqué, ajouter liste-academie-souhaite
// var liste = document.getElementById("liste-academie-souhaite");

// ajout.onclick = ()=>{
    // ajout.style.background="#000";
//     let boite = liste.cloneNode(true);
//   liste.appendChlid(boite);
// }

// var y = 0;
let i = 1;
const z = [];

function duplicate() {           

        // let dept1 = document.getElementById("1er-dept");
        // let dept2 = document.getElementById("2eme-dept");
        // let dept3 = document.getElementById("3eme-dept");
        // let dept4 = document.getElementById("4eme-dept");
        // let dept5 = document.getElementById("5eme-dept");

    var clone = original.cloneNode(true);
    original.parentNode.appendChild(clone);
    clone.id = "liste-academie-souhaite" +i;

    let nb = z.push(clone.id);
    if(nb > 9){
        document.getElementById("ajout-academie").style.display='none';
        
       
        
    }
    

    console.log(z);

    let academieClone = clone.querySelector("#academie-souhaite");
    academieClone.id = "academie-souhaite" +i;
    academieClone.name = "academie_souhaite" +i;
    academieClone.value="Selectionner votre réponse";

    var y = i;

    function initAcademie_clone(){
        $('#academie-souhaite' +y).on('change', function(e) {
    
            $.ajax({
                method: "POST",
                url: window.myUrl+"compte/afficherDepartement",
                data: {
                    academie: e.currentTarget.value
                },
                
                success: (function(data) {
                    var depart = $("#departement" +y);
                    depart.css({"display":"block"})
                    depart.html('');
    
                    // console.log(depart)
    
                        JSON.parse(data).forEach(Element => {
                        var input = document.createElement("input");
                        var label = document.createElement("label")
                        input.id = "dept" +y;
                        // input.className="form-check-input";
                        label.className="lead";
                        input.type = "checkbox";
                        input.name = Element.choix +"_" +y;
                        input.value = Element.nom_departement;
                        $("#departement" +y).append(input);
                        // label.className="form-check-label";
                        label.for = input.name;
                        // label.for = input.name;
                        label.innerHTML = Element.nom_departement;
                        
                        $("#departement" +y).append(label);
                        $("#departement" +y).append("<br>");
                    //    depart.html(data["nom_departement"]);
                    
                        console.log(depart)
    
                        console.log(input);
                    });
                })
            })        
        })
    }

    let deptClone1 = clone.querySelector("#departement");
    deptClone1.style.display="none";
    deptClone1.id = "departement" +i;
    deptClone1.addEventListener("click", initAcademie_clone());

    let typeContratClone = clone.querySelector("#type-contrat-souhaite");
    typeContratClone.id = "type-contrat-souhaite" +i;
    typeContratClone.name = "type_contrat_souhaite" +i;
    typeContratClone.value="Selectionner votre réponse";


    let nbHeuresClone = clone.querySelector("#nb-heures-souhaite");
    nbHeuresClone.id = "nb-heures-souhaite" +i;
    nbHeuresClone.name = "nb_heures_souhaite" +i;
    nbHeuresClone.value="";


    let motifClone = clone.querySelector("#motif-demande");
    motifClone.id = "motif-demande" +i;
    motifClone.name = "motif_demande" +i;
    motifClone.value="Selectionner votre réponse";

    let displayautremotif = clone.querySelector("#display-autre-motif");
    displayautremotif.id = "display-autre-motif" +i;
    
    
    let autreMotifClone = clone.querySelector("#autre-motif");
    autreMotifClone.id = "autre-motif" +i;
    autreMotifClone.name = "autre_motif" +i;
    autreMotifClone.value="";
 
    document.getElementById("display-autre-motif"+i).style.display="none";

    
    // let faire = document.getElementById("motif-demande"+i).value;

    // if(faire === "Autre"){
        
    //     faire.addEventListener('click', ()=>{
            
    //         let affi= document.getElementById("display-autre-motif"+i);
    //         affi.style.display="block";
    //     });
    // }


    // console.log(displayautremotif);
    // console.log(test);
    
    
    
    
    
          

    



    let displayacademieclone = clone.querySelector("#display-academie-souhaite");
    displayacademieclone.id = "display-academie-souhaite" +i;
    
    autreMotifClone.value="";



  
    
                


    let justificatifClone = clone.querySelector("#justificatif-motif");
    justificatifClone.id ="justificatif-motif" +i;
    justificatifClone.name ="justificatif_motif" +i;
    justificatifClone.value="";

    let btncloseClone = clone.querySelector("#btn-close");
    btncloseClone.style.display="block";
    btncloseClone.addEventListener("click", ()=>{
        let element = document.getElementById(clone.id);
        element.remove();
        z.splice(element)
        // i--;
    });


    // clone.childNodes.name = this.name +i;

        // let cloneDept = document.querySelector("#academie-souhaite" +i);
        // cloneDept.addEventListener("click", initAcademie());
        console.log(clone);
        console.log(academieClone);

    i++; 
}


function initAcademie() {
    // console.log($(document))
    $('#academie-souhaite').on('change', function(e) {

        $.ajax({
            method: "POST",
            url: window.myUrl+"compte/afficherDepartement",
            data: {
                academie: e.currentTarget.value
            },
            
            success: (function(data) {
                var depart = $("#departement");
                depart.html('');

                console.log(data)

                    JSON.parse(data).forEach(Element => {
                    var input = document.createElement("input");
                    var label = document.createElement("label")
                    // input.className="form-check-input";
                    label.className="lead";
                    input.type = "checkbox";
                    input.name = Element.choix;
                    input.value = Element.nom_departement;
                    $("#departement").append(input);
                    // label.className="form-check-label";
                    label.for = input.name;
                    // label.for = input.name;
                    label.innerHTML = Element.nom_departement;
                    
                    $("#departement").append(label);
                    $("#departement").append("<br>");
                //    depart.html(data["nom_departement"]);
                    // console.log(data)
                });
                console.log(depart)
            })
        })        
    })
};

function initAcademie_display() {
    // console.log($(document))
    $('#academie-souhaite-display').on('change', function(e) {

        $.ajax({
            method: "POST",
            url: window.myUrl+"compte/afficherDepartement",
            data: {
                academie: e.currentTarget.value
            },
            
            success: (function(data) {
                var depart = $("#departement");
                depart.html('');

                console.log(data)

                    JSON.parse(data).forEach(Element => {
                    var input = document.createElement("input");
                    var label = document.createElement("label")
                    // input.className="form-check-input";
                    label.className="lead";
                    input.type = "checkbox";
                    input.name = Element.choix;
                    input.value = Element.nom_departement;
                    $("#departement").append(input);
                    // label.className="form-check-label";
                    label.for = input.name;
                    // label.for = input.name;
                    label.innerHTML = Element.nom_departement;
                    
                    $("#departement").append(label);
                    $("#departement").append("<br>");
                //    depart.html(data["nom_departement"]);
                    // console.log(data)
                });
                console.log(depart)
            })
        })        
    })
};

function mutation(){
    let type = document.getElementById("type-mutation").value;
    console.log(type);
    if(type === "Mutation inter VERSAILLES" || type === "Mutation intra VERSAILLES" ){
       let element = document.getElementById("display-academie-souhaite");
        element.style.display="block";
        element.innerHTML="<div id='div-academie-souhaite'><label for='academie-souhaite-display'>Académie souhaité:</label><select class='custom-select' id='academie-souhaite-display' name='academie_souhaite'><option selected >Selectionner votre réponse</option><option value='VERSAILLES'>VERSAILLES</option></select></div>";
        var academie = document.getElementById("academie-souhaite-display");
        academie.addEventListener("change", initAcademie_display());
        document.getElementById("btn-duplication").style.display="none";
        document.getElementById("souhait").style.display="none";
        let divDepartement = document.getElementById("div-departement");
        divDepartement.innerHTML="<div id='departement' class='col'></div>"
    }

    if(type === "Mutation inter hors VERSAILLES"){
        let divDepartement = document.getElementById("div-departement");
        divDepartement.innerHTML="<div id='departement' class='col'></div>"
        let supprimer = document.getElementById("div-academie-souhaite");
        supprimer.remove();
        document.getElementById("souhait").style.display="block";
        document.getElementById("btn-duplication").style.display="block";
    // document.getElementById("academie-souhaitedisp").style.display="none";
    }
}

function afficher(){
    let element = document.getElementById("info-autre");
        element.style.display="block";
        element.innerHTML="<label >Autre, vous avez la possibilité d'expliquer le motif :</label><input type='text' class='form-control' id='autre-disponibilite' name='autre_disponibilite'>";


}
function masquer(){
    document.getElementById("info-autre").style.display="none";
        


}
function autreRemuneration(){
    let remuneration = document.getElementById("echelle-remuneration").value;
    if(remuneration == "Autre"){
        document.getElementById("autre-remuneration").style.display="block";

    } if(remuneration === "Certifié" || remuneration === "Agrégé" || remuneration === "PLP"){
        document.getElementById("autre-remuneration").style.display="none";
    }

}

function autreEchelon(){
    let echel = document.getElementById("echelon").value;
    if(echel === "Autre"){
        document.getElementById("echelon-autre").style.display="block";

    } if(echel === "1" || echel === "2" || echel === "3" ||echel === "4" ||echel === "5" ||echel === "6" ||echel === "7" ||echel === "8" ||echel === "9" ||echel === "10" ||echel === "11"){
        document.getElementById("echelon-autre").style.display="none";
    }

}




function Autre(){
    let typeB = document.getElementById("motif-demande").value;

    if(typeB === "Autre"){
        document.getElementById("display-autre-motif").style.display="block";
    }
            if(typeB === "Impératifs familiaux" || typeB === "Raisons médicales" || typeB === "Vie religieuse"){

                document.getElementById("display-autre-motif").style.display="none";
            }

    for(i=1; i<10; i++){

    
        let type = document.getElementById("motif-demande"+i).value;
    
        if(type === "Autre"){
            document.getElementById("display-autre-motif"+i).style.display="block";
        }
                if(type === "Impératifs familiaux" || type === "Raisons médicales" || type === "Vie religieuse"){
    
                    document.getElementById("display-autre-motif"+i).style.display="none";
                }
    
            }

      
}






// ext.addEventListener("click", ()=>{
//     liste.style.display="block";
// })

// depts_souhaite.style.display="none";


// ext.style.backgroundColor = "#000";
// console.log(typeMutation.option);
// console.log(academieSouhaite.option);


// if (typeMutation.value === "Mutation académie de VERSAILLES") {
//     // console.log(typeMutation);
//     academieSouhaite.option.value = "VERSAILLES";
//     academieSouhaite.content = "VERSAILLES";
// }

// Depts.addEventListener("click", () => {
//         depts_souhaite.style.display="block";
    // let choix = document.createElement("div");



    // choix.innerHTML = '<div class="form-group"> <label for="autre_motif">Indiquer votre département souhaité</label> <input type="text" class="form-control" name="autre_motif"> </div> <br>'
    
    // document.append(choix);    
    
    // "<div class='row'>
    // <div class='col form-group'>
    // <label for='voeux'> Choix 1 : </label>
    // <select class='custom-select' name='dept_souhaite1'>
    // <option selected required='required'>Indiquer le département souhaité</option>
    // <option value='78'>78</option>
    // <option value='91'>91</option>
    // <option value='92'>92</option>
    // <option value='95'>95</option>
    // </select>
    // </div>
    // <div class='col form-group'>
    // <label for='voeux'> Choix 2 : </label>
    // <select class='custom-select' name='dept_souhaite2'>
    // <option>Indiquer le département souhaité</option>
    // <option value='78'>78</option>
    // <option value='91'>91</option>
    // <option value='92'>92</option><
    // option value='95'>95</option>
    // </select>
    // </div>
    // <div class='col form-group'>
    // <label for='voeux'> Choix 3 : </label>
    // <select class='custom-select' name='dept_souhaite3'>
    // <option>Indiquer le département souhaité</option>
    // <option value='78'>78</option>
    // <option value='91'>91</option>
    // <option value='92'>92</option>
    // <option value='95'>95</option>
    // </select>
    // </div>
    // </div>";

// })

// Fonction qui réinitialise les champs établissement
let champ_rne = document.getElementById("rne-etbsmt");
// champ_rne.style.background="red";

champ_rne.addEventListener("dblclick", ()=>{

    document.getElementById("info-supp-etbsmt").style.display="none";

    document.getElementById("rne-etbsmt").style.background="#fff";
    document.getElementById("rne-etbsmt").removeAttribute("readOnly");
    document.getElementById("rne-etbsmt").value="";

    document.getElementById("academie-etbsmt").style.background="#fff";
    document.getElementById("academie-etbsmt").removeAttribute("readOnly");
    document.getElementById("academie-etbsmt").value="";

    document.getElementById("nom-etbsmt-principal").style.background="#fff";
    document.getElementById("nom-etbsmt-principal").removeAttribute("readOnly");
    document.getElementById("nom-etbsmt-principal").value="";

    document.getElementById("adresse-etbsmt").style.background="#fff";
    document.getElementById("adresse-etbsmt").removeAttribute("readOnly");
    document.getElementById("adresse-etbsmt").value="";

    document.getElementById("cp-etbsmt").style.background="#fff";
    document.getElementById("cp-etbsmt").removeAttribute("readOnly");
    document.getElementById("cp-etbsmt").value="";

    document.getElementById("ville-etbsmt").style.background="#fff";
    document.getElementById("ville-etbsmt").removeAttribute("readOnly");
    document.getElementById("ville-etbsmt").value="";

    document.getElementById("num-etbsmt").style.background="#fff";
    document.getElementById("num-etbsmt").removeAttribute("readOnly");
    document.getElementById("num-etbsmt").value="";

    document.getElementById("email-etbsmt").style.background="#fff";
    document.getElementById("email-etbsmt").removeAttribute("readOnly");
    document.getElementById("email-etbsmt").value="";

})


// function qui permet l"auto-completion des champs etablissement
$(function () {
    $("#rne-etbsmt").autocomplete({
        source: function (request, response) {
            $.ajax({
                type: "POST",
                url: window.myUrl+"compte/afficherEtbsmt",
                data: request,
                success: function (data) {
                    response(data);
                },
                dataType: "json"
            });
        },
        minLength: 2,
        // aprés l"auto-completion remplissage automatique des champs ci-dessous grace a cette fonction
        select: function (event, ui) {
            $("#info-supp-etbsmt").css({"display":"block"});
            $("#rne-etbsmt").val(ui.item.value).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#academie-etbsmt").val(ui.item.academie_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#nom-etbsmt-principal").val(ui.item.nom_etbsmt_principal).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#adresse-etbsmt").val(ui.item.adresse_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#cp-etbsmt").val(ui.item.cp_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#ville-etbsmt").val(ui.item.ville_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#num-etbsmt").val(ui.item.num_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#email-etbsmt").val(ui.item.email_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
        }
    });
});


// $('select[name="tous_dept"]').change(function(){
         
//     var valModele = $(this).val();
//     if(valModele== 'choix'){

//     }

// })




