var btnTableauBord = document.getElementById("btn-tableau-bord");
var tableauBord = document.getElementById("tableau-bord");
var btnCreerMembres = document.getElementById("btn-creer-membres");
var creerMembres = document.getElementById("creer-membres");
var btnListeMembres = document.getElementById("btn-liste-membres");
var listeMembres = document.getElementById("liste-membres");
var btnActualites = document.getElementById("btn-actualites");
var actualites = document.getElementById("div-actualites");
// creerMembre.style.display="none";

btnTableauBord.addEventListener("click",()=>{
    tableauBord.style.display="block";
    creerMembres.style.display="none";
    listeMembres.style.display="none";
    actualites.style.display="none";
})

btnCreerMembres.addEventListener("click", ()=>{
    tableauBord.style.display="none";
    creerMembres.style.display="block";
    listeMembres.style.display="none";
    actualites.style.display="none";
});

btnActualites.addEventListener("click", ()=>{
    tableauBord.style.display="none";
    creerMembres.style.display="none";
    listeMembres.style.display="none";
    actualites.style.display="block";
});

const triggers = document.querySelectorAll('[aria-haspopup="dialog"]');
const doc = document.querySelector('.js-document');
const focusableElementsArray = [
  '[href]',
  'button:not([disabled])',
  'input:not([disabled])',
  'select:not([disabled])',
  'textarea:not([disabled])',
  '[tabindex]:not([tabindex="-1"])',
];
const keyCodes = {
  tab: 9,
  enter: 13,
  escape: 27,
};

const open = function (dialog) {
  const focusableElements = dialog.querySelectorAll(focusableElementsArray);
  const firstFocusableElement = focusableElements[0];
  const lastFocusableElement = focusableElements[focusableElements.length - 1];

  dialog.setAttribute('aria-hidden', false);
  doc.setAttribute('aria-hidden', true);

  // return if no focusable element
  if (!firstFocusableElement) {
    return;
  }

  window.setTimeout(() => {
    firstFocusableElement.focus();

    // trapping focus inside the dialog
    focusableElements.forEach((focusableElement) => {
      if (focusableElement.addEventListener) {
        focusableElement.addEventListener('keydown', (event) => {
          const tab = event.which === keyCodes.tab;

          if (!tab) {
            return;
          }

          if (event.shiftKey) {
            if (event.target === firstFocusableElement) { // shift + tab
              event.preventDefault();

              lastFocusableElement.focus();
            }
          } else if (event.target === lastFocusableElement) { // tab
            event.preventDefault();

            firstFocusableElement.focus();
          }
        });
      }
    });
  }, 100);
};

const close = function (dialog, trigger) {
  dialog.setAttribute('aria-hidden', true);
  doc.setAttribute('aria-hidden', false);

  // restoring focus
  trigger.focus();
};

triggers.forEach((trigger) => {
  const dialog = document.getElementById(trigger.getAttribute('aria-controls'));
  const dismissTriggers = dialog.querySelectorAll('[data-dismiss]');

  // open dialog
  trigger.addEventListener('click', (event) => {
    event.preventDefault();

    open(dialog);
  });

  trigger.addEventListener('keydown', (event) => {
    if (event.which === keyCodes.enter) {
      event.preventDefault();

      open(dialog);
    }  
  });

  // close dialog
  dialog.addEventListener('keydown', (event) => {
    if (event.which === keyCodes.escape) {
      close(dialog, trigger);
    }      
  });

  dismissTriggers.forEach((dismissTrigger) => {
    const dismissDialog = document.getElementById(dismissTrigger.dataset.dismiss);

    dismissTrigger.addEventListener('click', (event) => {
      event.preventDefault();

      close(dismissDialog, trigger);
    });
  });

  window.addEventListener('click', (event) => {
    if (event.target === dialog) {
      close(dialog, trigger);
    }
  }); 
});



//  INFO UTILISATEUR
// var formModifInfoUser = document.getElementById("form-modif-info-user");
// var btnModifInfoUser = document.getElementById("btn-modifier-info-user");
// var btnCloseFormInfoUser = document.getElementById("btn-close-form-info-user");

// formModifInfoUser.style.display="none"

// btnModifInfoUser.addEventListener("click", ()=>{
//     formModifInfoUser.style.display="block";
// })

function display_form_info_user(id_utilisateur){
    console.log(id_utilisateur);
    var form = document.getElementById("form-modif-info-user" + id_utilisateur);
    console.log(form);
    form.style.display="block";
    var btnOut = document.getElementById("btn-close-form-info-user-out" + id_utilisateur);
    btnOut.style.display="block";
}
function display_form_info_mutation(id_utilisateur){
    console.log(id_utilisateur);
    var form = document.getElementById("form-modif-info-mutation" + id_utilisateur);
    console.log(form);
    form.style.display="block";
    var btnOut = document.getElementById("btn-close-form-info-mutation-out" + id_utilisateur);
    btnOut.style.display="block";
}

function close_form_info_user(id_utilisateur){
    var form = document.getElementById("form-modif-info-user" + id_utilisateur);
    form.style.display="none";
    var btnOut = document.getElementById("btn-close-form-info-user-out" + id_utilisateur);
    btnOut.style.display="none";

}
function close_form_info_mutation(id_utilisateur){
    var form = document.getElementById("form-modif-info-mutation" + id_utilisateur);
    form.style.display="none";
    var btnOut = document.getElementById("btn-close-form-info-mutation-out" + id_utilisateur);
    btnOut.style.display="none";

}
function autreEchelon(id){
    let echel = document.getElementById("echelon"+id).value;
    if(echel === "Autre"){
        document.getElementById("echelon-autre"+id).style.display="block";

    } if(echel === "1" || echel === "2" || echel === "3" ||echel === "4" ||echel === "5" ||echel === "6" ||echel === "7" ||echel === "8" ||echel === "9" ||echel === "10" ||echel === "11"){
        document.getElementById("echelon-autre"+id).style.display="none";
    }

}



function afficher(id){
   
  
   let element = document.getElementById("info-autre"+id);
   
     element.style.display="block";
     element.innerHTML="<label >Autre, vous avez la possibilité d'expliquer le motif :</label><input type='text' class='form-control' id='autre-disponibilite' name='autre_disponibilite'>";

}


function masquer(id){
    document.getElementById("info-autre"+id).style.display="none";
        
}

function autreRemuneration(id){
  let remuneration = document.getElementById("echelle-remuneration"+id).value;
  if(remuneration == "Autre"){
      document.getElementById("autre-remuneration"+id).style.display="block";

  } if(remuneration === "Certifié" || remuneration === "Agrégé" || remuneration === "PLP"){
      document.getElementById("autre-remuneration"+id).style.display="none";
  }

}


