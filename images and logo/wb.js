
let menu= document.querySelector('#menu-btn')
let navbar= document.querySelector('.navbar')

menu.onclick=() =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}
document.querySelector('.login-btn').onclick = () =>{
    document.querySelector('.login-form-container').classList.toggle('active');
    // document.querySelector('login-form').classList.add('active');
}

// document.querySelector('#signup').onclick = () =>{
//     document.querySelector('.login-form-container1').classList.toggle('active');
//     document.querySelector('.login-form-container').classList.remove('active');
// }

document.querySelector('#signup').onclick = (event) => {
    event.preventDefault(); // Prevent the default form submission behavior
    document.querySelector('.signup-form-container1').classList.toggle('active');
    document.querySelector('.login-form-container').classList.remove('active');
}


document.querySelector('#close-login-form').onclick = () =>{
    document.querySelector('.login-form-container').classList.remove('active');
}

document.querySelector('#close-login-form1').onclick = () =>{
    document.querySelector('.signup-form-container1').classList.remove('active');
    document.querySelector('.login-form-container').classList.add('active');

}
// window.onscroll=() =>{

//     if(window.scrollY > 0){
//         document.querySelector('.header').classList.add('active');
//     }else{
//         document.querySelector('.header').classList.remove('active');
//     }
//     menu.classList.remove('fa-times');
//     navbar.classList.remove('active');
// }


// window.onload=() =>{

//     if(window.scrollY > 0){
//         document.querySelector('.header').classList.add('active');
//     }else{
//         document.querySelector('.header').classList.remove('active');
//     }
    
// }

// let forgot = document.getElementById('forgot-password');
// document.querySelector('#check').onclick = () =>{
//     document.querySelector('.forgot-password').classList.add('active');
//     document.querySelector('.login-form-container').classList.remove('active');
// }

// document.querySelector('#close').onclick = () =>{
//     document.querySelector('.forgot-password').classList.remove('active');
//     document.querySelector('.login-form-container').classList.add('active');
// }



var heartIcons = document.querySelectorAll('.heart');

// Loop through each heart icon
heartIcons.forEach(function(icon) {
    icon.addEventListener('click', function() {
        // Toggle heart icon class
        this.classList.toggle('fas');
        this.classList.toggle('far');

        // Toggle heart icon color
        this.classList.toggle('red-heart');
    });
});




