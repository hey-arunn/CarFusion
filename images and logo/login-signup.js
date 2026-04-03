// login page js 
let email = document.getElementById('email');
let pass = document.getElementById('password');
let eyeicon = document.getElementById('eyeicon');

// password eye for login 
eyeicon.onclick = function () {
    if (pass.type == "password") {
        pass.type = "text";
        eyeicon.src = "eye-open.png";
    } else {
        pass.type = "password";
        eyeicon.src = "eye-close.png";
    }
};

// password eye for forgot password
let forgot_password = document.getElementById('forgot-pass'); 
let eyeicon3 = document.getElementById('eyeicon3');
eyeicon3.onclick = function () {
    if (forgot_password.type == "password") {
        forgot_password.type = "text";
        eyeicon3.src = "eye-open.png";
    } else {
        forgot_password.type = "password";
        eyeicon3.src = "eye-close.png";
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



// ---------------------------------------------signup----------------------------------------------------------------
// signup js 
let signup_username = document.getElementById('signup-username');
let mobileno = document.getElementById('mobile-no');
let signup_email = document.getElementById('signup-email');
let signup_pass = document.getElementById('signup-pass');
// // let signup_conform_pass = document.getElementById('signup-conform-pass');
let signup_button = document.getElementById('signup-button');
// // let checkbox = document.getElementById('checkbox');
let eyeicon1 = document.getElementById('eyeicon1');
let signup_state = document.getElementById('signup_state');
let signup_city = document.getElementById('signup_city');
let signup_address = document.getElementById('signup_address');

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

// signup button 
// document.querySelector('#signup-button').onclick = () => {
//     if (checkConditions()) {
//         // alert('signup sucessfull');
//         document.querySelector('.signup-form-container1').classList.remove('active');
//         // document.querySelector('#login-btn').classList.add('remove');
//         // document.querySelector('#login-btn').classList.add('removed');
//         // document.querySelector('#user-panel').classList.add('active');
//     }
// };

// signup_conform_pass.addEventListener('input', () => {
//     checkConditions();
// });

// function checkConditions() {
//     let pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
//     let usernamepattern = /^[A-Za-z].*$/;
    
//     // const nameRegex = /^[A-Za-z\s]+$/;
//     if (signup_username.value === "" || signup_username.value.length > 40 || !usernamepattern.test(signup_username.value)) {
//         signup_username.classList.add('active');
//         if (signup_username.value === "") {
//             signup_username.value = "";
//             document.getElementById('signup-username').placeholder = "Name is required";
//         } else if (signup_username.value.length > 40) {
//             signup_username.value = "";
//             document.getElementById('signup-username').placeholder = "Maximum 10 characters";
//         } else if (!usernamepattern.test(signup_username.value)) {
//             signup_username.value = "";
//             document.getElementById('signup-username').placeholder = "Start with character";
//         }
//     } else {
//         signup_username.classList.add('remove');
//     }
    
     
   

//     if (mobileno.value.length !== 10) {
//         mobileno.classList.add('active');
    
//         if (mobileno.value.length !== 10) {
//             mobileno.value = "";
//             document.getElementById('mobile-no').placeholder = "require 10 digit number";
//         }
//     } else {
//         mobileno.classList.add('remove');
//     }

//     if (signup_email.value === "") {
//         signup_email.classList.add('active');
//     } else {
//         signup_email.classList.add('remove');
//     }

//     if (signup_pass.value === "" || !pattern.test(signup_pass.value)) {
//         signup_pass.classList.add('active');
//     } else {
//         signup_pass.classList.add('remove');
//     }

//    if( signup_state.value === ""){
//         signup_state.classList.add('active');
//    }else{
//     signup_state.classList.add('remove');
//    }

   
//     if( signup_city.value === ""){
//         signup_city.classList.add('active');
//     }else{
//         signup_city.classList.add('remove');
//     }
    
//    if( signup_address.value === ""){
//         signup_address.classList.add('active');
//     }else{
//         signup_address.classList.add('remove');
//     }

   

//     return (
//         signup_username.value !== "" &&
//         signup_username.value.length <= 10 &&
//         mobileno.value.length === 10 &&
//         signup_email.value !== "" &&
//         pattern.test(signup_pass.value) &&
//         signup_address.value !== "" &&
//         signup_city.value !== "" &&
//         signup_state.value !== "" 


//         // signup_conform_pass.value === signup_pass.value
//     );
// }


// signup_username.value = "";
// mobileno.value = "";
// signup_email.value = "";
// signup_pass.value = "";
// signup_conform_pass.value = "";

