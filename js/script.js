if(document.getElementById("close")){
    document.getElementById("close").addEventListener("click", ()=>{
        document.getElementById("success").style.display = "none";
    });
}


let validationForm = document.forms.validationForm;
if(validationForm){
    validationForm.login.addEventListener("focus",()=>{

        if(validationForm.login.required === false){
            validationForm.login.setAttribute('required', '');
        }

    });

    validationForm.name.addEventListener("focus",()=>{

        if(validationForm.name.required === false){
            validationForm.name.setAttribute('required', '');
        }

    });

    validationForm.password.addEventListener("focus",()=>{

        if(validationForm.password.required === false){
            validationForm.password.setAttribute('required', '');
        }

    });
}


