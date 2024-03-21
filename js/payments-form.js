const email = document.getElementById('email');
const address = document.getElementById('address');
const city = document.getElementById('city');
const area = document.getElementById('area');
const postcode = document.getElementById('postcode');
const fullname = document.getElementById('name');
const num = document.getElementById('num');
const expDate = document.getElementById('expDate');
const cvv = document.getElementById('cvv');
const paymentForm = document.getElementById('payment-form');



//only allows numeric [0-9] values or backspace as input
function filterDigits(input){
    var value = String.fromCharCode(input.which);
    var key = input.key;
    if(!(/[0-9]/.test(value)) && !(key=="Backspace")){
        input.preventDefault();
    }
}

function dateFormat(evnt){
    expValue = expDate.value;
    switch (expValue.length){
        case 1:
            expDate.style.borderColor = "red";
            break;
        case 2:
            expValue=expValue.slice(0,2) + '/';
            expDate.value = expValue;
            break;
        case 5:
            expDate.style.borderColor = "green";
            break;
        case 3:
            if (evnt.key =="Backspace"){
                expDate.value = expValue.slice(0,2);
            }
            break;
     }   
}

function cardFormat(evnt){
    if (!(evnt.key=="Backspace")){
        numValue = num.value;
        switch (numValue.length){
            case 4:
                numValue = numValue.slice(0,4) + ' ';
                num.value = numValue;
                break;
            case 9:
                num.value = numValue + ' ';
                break;
            case 14:
                num.value = numValue + ' ';
                break;
        }
    }
}


cvv.addEventListener("keyup", e=>{
    filterDigits(e);
    setBorder(cvv,3);
});
num.addEventListener("keydown", e=>{
    filterDigits(e);
    cardFormat(e);
});
num.addEventListener("keyup", e=>{
    setBorder(num, 19);
});
expDate.addEventListener("keyup", e=>{
    filterDigits(e);
    dateFormat(e);
    setBorder(expDate,5);
});

paymentForm.addEventListener("submit", e =>{
    showError = false;
    lengthValidate(email, 0, e);
    lengthValidate(address, 0, e);
    lengthValidate(city, 0, e);
    lengthValidate(area, 0, e);
    lengthValidate(postcode, 5, e);
    lengthValidate(fullname, 0, e);
    lengthValidate(num, 18, e);
    lengthValidate(expDate, 4, e);
    lengthValidate(cvv, 2, e);
    if(showError){
        alert('Please fill in all details!');
    }
});



function lengthValidate(element, min_length, evnt){
    var store_val = element.value;
    if(store_val.length <= min_length){
        evnt.preventDefault();
        showError = true;
    }
}

function setBorder(element, length){
    if (element.value.length >= length){
        element.style.borderColor = "green";
    }
    else{
        element.style.borderColor = "red";
    }
}

