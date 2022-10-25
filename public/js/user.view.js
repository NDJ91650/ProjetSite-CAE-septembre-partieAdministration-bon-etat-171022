// var academie = document.getElementById("academie-souhaite");
// academie.addEventListener("click", initAcademie());

// var logo = document.getElementById("logo");
// logo.style.height="12vh";
// $("#logo").hover({"height":"12vh"});


// logo.addEventListener("mouseover", ()=>{
//     logo.style.hover.height="12vh";
//     $("#logo").hover({"height":"12vh"});
//     $("#logo").on("mouseup", ()=>{
//         $.ajax({
//             method: "POST",
//             url: window.myUrl+"accueil",
//         })
//     });
// })



// function retour_accueil(){
//         $.ajax({
//             method: "POST",
//             url: window.myUrl+"accueil"
//         })
// };

var i;

function initAcademie(i) {
    // console.log($(document))
    $('#academie-souhaite'+i).on('change', function(e) {

        $.ajax({
            method: "POST",
            url: window.myUrl+"compte/afficherDepartement",
            data: {
                academie: e.currentTarget.value
            },
            
            success: (function(data) {
                var depart = $("#departement"+i);
                depart.html('');

                console.log(data)

                    JSON.parse(data).forEach(Element => {
                    var input = document.createElement("input");
                    // input.className="form-check-input";
                    input.type = "checkbox";
                    input.name = Element.choix;
                    input.value = Element.nom_departement;
                    $("#departement"+i).append(input);
                    var label = document.createElement("label")
                    // label.className="form-check-label";
                    label.for = input.name;
                    // label.for = input.name;
                    label.innerHTML = Element.nom_departement;
                    
                    $("#departement"+i).append(label);
                    $("#departement"+i).append("<br>");
                //    depart.html(data["nom_departement"]);
                    // console.log(data)
                });
                console.log(depart)
            })
        })        
    })
};