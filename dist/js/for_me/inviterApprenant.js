// Recuperer tous les elements

// Recuperer apprenant-form
const apprenantForm = document.getElementById('apprenant-form');
// Recuperer apprenant-input
const apprenantInput = document.getElementById('apprenant-input');
// Recuperer apprenant-item
const apprenantItemList = document.getElementById('apprenant-item');

// tableau de tous les apprenants
let apprenants = [];

// instance d'objet 
// const apprenant = {
//     email : "alex@gmail",
//     mdp : Date.now()
// };

apprenantForm.addEventListener('submit', function (event) {
    event.preventDefault();
    ajoutApprenant(apprenantInput.value);
})

function ajoutApprenant(element){
    if (element !== "") {
        const apprenant = {
            email : element,
            mdp : Date.now()
        };

        apprenants.push(apprenant);
        afficherApprenants(apprenants);

        apprenantInput.value = "";
    }
}

function afficherApprenants(apprenants) {
    apprenantItemList.innerHTML = "";

    apprenants.forEach(function(element) {
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <tr>
            <td>${element.email}</td>
            <td>${element.mdp}</td>
            <td><button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button></td>
        </tr>
        `;
        apprenantItemList.append(tr);
    });

}
// encour
function ajouterBD(apprenants) {
    $.ajax({
        method: 'POST',
        url: '../../../controllers/EnregistrementApprenant.php',
        datas: apprenants,
        success: (datas) => {
            if(datas == 'ok') {
                console.log("Tres belle insertion");
            } else {
                console.warn("Wapi!");
            }
        }
    });

    afficherApprenants(apprenants);
}