var $loading = document.querySelector('.loading');
var btnmodify = document.querySelectorAll('.btnModify');




modifyBiographie
btnmodify.forEach((el)=>{
    el.onclick = function(event){
         event.preventDefault();
         var dataToModify = event.target.value;
         console.log(dataToModify);
         if(dataToModify == "userInfo") modifyUserinfo();
         else if (dataToModify == "biographie") modifyUserBiographie();
         else if (dataToModify == "skills") addUserSkill();
         else if (dataToModify == "diplome") addUserDiplome();
         else if (dataToModify == "ImgProfile") modifyImg();
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

function addUserSkill(){
    //remove badge aucun Skill if exist
    var badgeNotSkill = document.querySelector(".badge-notSkill");

    if(badgeNotSkill){
        badgeNotSkill.remove();
    }

    var fomUserinfo = document.querySelector('#addSkillsForm');
    var formData  = new FormData(fomUserinfo);
    $loading.style.display = "flex";
    axios.post('/profile/modify/skills',{
        skill : formData.get('skillName'),
    }).then(function(resultat){
        if(resultat.data.success){
            displaySuccess("Success");
            const skill = formData.get('skillName');
            document.getElementsByClassName('list-skills')[0].innerHTML += 
            `<span class="badge badge-default mr-1"> ${skill} </span>`;
        }
        else{
            displatError();
        }
    }).catch((error) => {
        displatError();
    })
}

function addUserDiplome(){
    //remove no diplome
    var noDiplom = document.querySelector(".noDiplom");
    if(noDiplom){
        noDiplom.remove();
    }
    var fomUserinfo = document.querySelector('#addDiplomForm');
    var formData  = new FormData(fomUserinfo);
    $loading.style.display = "flex";
    axios.post('/profile/modify/diplome',{
        diplomeName : formData.get('diplomName'),
        annee : formData.get('annee'),
        etablissement : formData.get('etablissement'),
    }).then(function(resultat){
        if(resultat.data.success){
            displaySuccess("Success");
            const diplomeName = formData.get('diplomName');
            const annee = formData.get('annee');
            const etablissement = formData.get('etablissement');
            document.getElementsByClassName('list-diplom')[0].innerHTML +=
                `<div class="diploma-desc">
                        <div class="dot"></div>
                        <i class="ion-ios-briefcase"></i>
                        <p class="diploma-title">
                            <strong>${diplomeName} </strong>
                        </p>
                        <p class="lead">
                                    ${annee}
                        </p>
                        <p class="lead">
                                    ${etablissement}
                        </p>
                    </div>`;
        }
        else{
            displatError();
        }
    }).catch((error) => {
        displatError();
    })
}


function changeImageProfile(formdata) {
    var imgDiv = document.querySelector('.img-user');
    var imgReader = new FileReader();
    imgReader.readAsDataURL(formdata.get('Image'));
    imgReader.onload = (e)=>{
        imgDiv.style.backgroundImage = `url('${e.target.result}')`;
    }
    
}


function modifyImg(){
    var formModifyImage = document.querySelector('#modifyImage');
    var formData  = new FormData(formModifyImage);
    $loading.style.display = "flex";
    axios.post('/profile/modify/ImageProfile',formData,{
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    }).then(function(resultat){
        if(resultat.data.success){
            changeImageProfile(formData);
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


