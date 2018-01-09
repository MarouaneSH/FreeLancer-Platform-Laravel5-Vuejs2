var $loading = document.querySelector('.loading');
var btnSearchMission = document.querySelector('.btnSearchMission');

var parametre = {
    url: 'missions/search',
    categorie: null,
    type:'both',
    minBudget:null,
    maxBudget:null
};

/*var fomrMission = document.querySelector('#formMission');
var formData  = new FormData(fomUserinfo);
*/
/*btnSearchMission.onclick = (e)=>{
    e.preventDefault();
    var formData = new FormData(document.querySelector('#formSearch'));

    if(formData.get('distance') == "on" & formData.get('place') == "on")
        parametre.type = "both";
     else if  (formData.get('distance') == "on")
        parametre.type = "distance";
     else
        parametre.type = "Sur Place";   
    
    parametre.categorie = formData.get("categorie");
    parametre.minBudget= formData.get("minbudget");
    parametre.maxBudget= formData.get("maxbudget");
    searchMissions(parametre);

}*/

function searchMissions(par){    
            $loading.style.display = "flex"; 
            axios.get(par.url,{
                params : {
                    categorie : par.categorie,
                    type : par.type,
                    minBudget : par.minBudget,
                    maxBudget : par.maxBudget,
                }
            }).then(function(resultat){
                if(resultat.data.success){
                    console.log(resultat.data.missions);
                    displaySuccess("Success");
                }
                else{
                    displatError();
                }
            }).catch((error) => {
                displatError();
            })
}


function displaySuccess(message){
    $loading.style.display = "none";
    swal(
        `${message}`,
        '',
        'success'
      );
}


function displatError(){
    $loading.style.display = "none";
    swal(
        'Oops...',
        'Something went wrong!',
        'error'
      )
}
