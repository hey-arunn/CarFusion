// login page js 
let email = document.getElementById('email');
let pass = document.getElementById('password');
let eyeicon = document.getElementById('eyeicon');

eyeicon.onclick = function () {
    if (pass.type == "password") {
        pass.type = "text";
        eyeicon.src = "eye-open.png";
    } else {
        pass.type = "password";
        eyeicon.src = "eye-close.png";
    }
};

// signup button 
document.querySelector('#continue-button').onclick = () => {
    if (email.value === "" || pass.value === "") {
        alert("empty field not allowed");
    } else {
        alert("login successful");
        document.querySelector('.login-form-container').classList.remove('active');
        document.querySelector('.login-btn').classList.add('remove');
        document.querySelector('#user-panel').classList.add('active');
        // document.querySelector('.usermenu').classList.add('active');
        email.value = "";
        pass.value = "";
    }
};

// document.querySelector('#user-icon').onclick = () => {
//     document.querySelector('.usermenu').classList.add('active');
//     document.querySelector('#user-icon').onclick = () => {
//         document.querySelector('.usermenu').classList.remove('active');   
//     }
// }

// humburge after login
document.querySelector('#user-icon').onclick = () => {
    const userMenu = document.querySelector('.usermenu');
    if (userMenu.classList.contains('active')) {
        userMenu.classList.remove('active');
    } else {
        userMenu.classList.add('active');
    }
};




// signup js 
let signup_username = document.getElementById('signup-username');
let mobileno = document.getElementById('mobile-no');
let signup_email = document.getElementById('signup-email');
let signup_pass = document.getElementById('signup-pass');
let signup_conform_pass = document.getElementById('signup-conform-pass');
let signup_button = document.getElementById('signup-button');
let checkbox = document.getElementById('checkbox');
let eyeicon1 = document.getElementById('eyeicon1');
let eyeicon2 = document.getElementById('eyeicon2');
let user_icon= document.getElementById('user-icon');

// eye img for password 
eyeicon1.onclick = function () {
    if (signup_pass.type == "password") {
        signup_pass.type = "text";
        eyeicon1.src = "eye-open.png";
    } else {
        signup_pass.type = "password";
        eyeicon1.src = "eye-close.png";
    }
};
// eye img for  conform password
eyeicon2.onclick = function () {
    if (signup_conform_pass.type == "password") {
        signup_conform_pass.type = "text";
        eyeicon2.src = "eye-open.png";
    } else {
        signup_conform_pass.type = "password";
        eyeicon2.src = "eye-close.png";
    };
};
// signup button 
document.querySelector('#signup-button').onclick = () => {
    if (checkConditions()) {
        alert('signup sucessfull');
        document.querySelector('.signup-form-container1').classList.remove('active');
        // document.querySelector('#login-btn').classList.add('remove');
        // document.querySelector('#login-btn').classList.add('removed');
        // document.querySelector('#user-panel').classList.add('active');
    }
};

signup_conform_pass.addEventListener('input', () => {
    checkConditions();
});

function checkConditions() {
    let pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (signup_username.value === "" || signup_username.value.length > 10) {
        signup_username.classList.add('active');
        if (signup_username.value === "") {
            signup_username.value = "";
            document.getElementById('signup-username').placeholder = "name is required";
        }
        if (signup_username.value.length > 10) {
            signup_username.value = "";
            document.getElementById('signup-username').placeholder = "maximum 10 characters";
        }
    } else {
        signup_username.classList.remove('active');
    }

    if (mobileno.value.length !== 10) {
        mobileno.classList.add('active');
        if (mobileno.value.length !== 10) {
            mobileno.value = "";
            document.getElementById('mobile-no').placeholder = "require 10 digit number";
        }
    } else {
        mobileno.classList.remove('active');
    }

    if (signup_email.value === "") {
        signup_email.classList.add('active');
    } else {
        signup_email.classList.remove('active');
    }

    if (signup_pass.value === "" || !pattern.test(signup_pass.value)) {
        signup_pass.classList.add('active');
    } else {
        signup_pass.classList.remove('active');
    }

    if (signup_conform_pass.value === "") {
        signup_conform_pass.classList.add('active');
        signup_button.disabled = true;
    }
    if (signup_conform_pass.value !== signup_pass.value) {
        signup_conform_pass.classList.add('active');
        signup_button.disabled = true;
    } else {
        signup_conform_pass.classList.remove('active');
        signup_button.disabled = false;
    }

    return (
        signup_username.value !== "" &&
        signup_username.value.length <= 10 &&
        mobileno.value.length === 10 &&
        signup_email.value !== "" &&
        pattern.test(signup_pass.value) &&
        signup_conform_pass.value === signup_pass.value
    );
}

signup_username.value = "";
mobileno.value = "";
signup_email.value = "";
signup_pass.value = "";
signup_conform_pass.value = "";


// generate otp for gorgot password
document.querySelector('#generate-otp').onclick = () => {
    let otp_array = [];    
    let otp = Math.floor(Math.random()*10);
    // otp_store.push(otp);
    let otp2 = Math.floor(Math.random()*10);
    // otp_store.push(otp2);
    let otp3 = Math.floor(Math.random()*10);
    // otp_store.push(otp3);
    let otp4 = Math.floor(Math.random()*10);
    otp_array.push(otp4,otp2,otp3,otp);
      real_otp =otp_array.join("");
    alert("your otp is : " +real_otp);
}

// validate otp 
document.querySelector('#validate-otp').onclick = () => {
    let value_of_otp = document.getElementById('inputed-otp');
    if(value_of_otp.value.trim() !== real_otp){
        document.querySelector('#inputed-otp').classList.add('active');
        value_of_otp.value ="";
        document.querySelector('#inputed-otp').placeholder=" incorrect otp";
    }else{
        document.querySelector('#inputed-otp').classList.remove('active');
        alert('otp is correct');
        // value_of_otp.value ="";

    }
}

// validation for password in forgot password 
document.querySelector('#forgot-password-submit').onclick = () =>
{
    let new_password = document.getElementById('new-password');
    let conform_new_password = document.querySelector('conform-new-password');

    // if()
    if (new_password.value === "" || !pattern.test(new_password.value)) {
        new_password.classList.add('active');
        // if else for both 
        new_password.value ="";
        document.querySelector('#new-password').placeholder="required";
    } else {
        new_password.classList.remove('active');
    }
}
