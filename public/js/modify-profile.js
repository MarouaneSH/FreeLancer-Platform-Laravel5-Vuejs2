var $loading = document.querySelector('.loading');
var btnmodify = document.querySelectorAll('.btnModify');




modifyBiographie
btnmodify.forEach((el)=>{
    el.onclick = function(event){
       //  event.preventDefault();
         var dataToModify = event.target.value;
         if(dataToModify == "userInfo") modifyUserinfo();
         else if (dataToModify == "biographie") modifyUserBiographie();
         else if (dataToModify == "skills") addSkillsForm();
    }
});



function modifyUserinfo(){
    var fomUserinfo = document.querySelector('#formUserinfo');
    var formData  = new FormData(fomUserinfo);
    $loading.style.display = "flex"; 
    axios.post('/profile/modify/userInfo',{
        specialite : formData.get('specialite'),
        location : formData.get('location'),
        nom : formData.get('nom'),
        prenom : formData.get('prenom')
    }).then(function(resultat){
        if(resultat.data.success){
            displaySuccess("Success");
        }
        else{
            displatError();
        }
    }).catch((error) => {
        displatError();
    })
    
}

function modifyUserBiographie(){
    var fomUserinfo = document.querySelector('#modifyBiographie');
    var formData  = new FormData(fomUserinfo);
    $loading.style.display = "flex";
    axios.post('/profile/modify/biographie',{
        biographie : formData.get('biographie'),
    }).then(function(resultat){
        if(resultat.data.success){
            displaySuccess("Success");
            document.getElementById("biographie").innerHTML = formData.get('biographie');
        }
        else{
            displatError();
        }
    }).catch((error) => {
        displatError();
    })
}

function addSkillsForm(){
    var fomUserinfo = document.querySelector('#addSkillsForm');
    var formData  = new FormData(fomUserinfo);
    $loading.style.display = "flex";
    axios.post('/profile/modify/skills',{
        skill : formData.get('skillName'),
    }).then(function(resultat){
        if(resultat.data.success){
            displaySuccess("Success");
            document.getElementsByClassName('list-skills')[0].innerHTML += 
            `<span class="badge badge-default"> ${skill} </span>`;
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
