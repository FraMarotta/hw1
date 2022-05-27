function checkPassword(event) { 
    const passwordInput = event.currentTarget; 
    var regularExpression = /^(?=.*[0-9])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,16}$/; 
    if (!(passwordInput.value.length >= 8 && regularExpression.test(passwordInput.value))) 
        document.querySelector('#psw').classList.remove('msg'); 
    else 
        document.querySelector('#psw').classList.add('msg'); 
}
function onPromise(response){
    return response.json();
}
function onJson(json){
    console.log(json);
    if(json === 1){
        document.querySelector('#usr').classList.remove('msg'); 
    }
    else 
        document.querySelector('#usr').classList.add('msg'); 
}
function checkUsername(event){
    console.log("check_user");
    const input = event.currentTarget;
    fetch("check_username.php?q=" + input.value).then(onPromise).then(onJson);
}

function showPassword(event){
    var x = event.currentTarget.parentNode.querySelector("input[name='password']");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
document.querySelector("input[name='Password']").addEventListener('blur', checkPassword);
document.querySelector("input[name='Username']").addEventListener('blur', checkUsername);
document.querySelector('#show').addEventListener('click', showPassword);