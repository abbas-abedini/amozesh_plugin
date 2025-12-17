/*
		Designed by: SELECTO
		Original image: https://dribbble.com/shots/5311359-Diprella-Login
*/

/*
    Designed by: SELECTO
    Original image: https://dribbble.com/shots/5311359-Diprella-Login
*/

let switchCtn = document.querySelector("#switch-cnt");
let switchC1 = document.querySelector("#switch-c1");
let switchC2 = document.querySelector("#switch-c2");
let switchCircle = document.querySelectorAll(".switch__circle");
let switchBtn = document.querySelectorAll(".switch-btn");
let aContainer = document.querySelector("#a-container");
let bContainer = document.querySelector("#b-container");
let allButtons = document.querySelectorAll(".submit");

let getButtons = (e) => e.preventDefault();

let changeForm = (e) => {
    switchCtn.classList.add("is-gx");
    setTimeout(function(){
        switchCtn.classList.remove("is-gx");
    }, 1500);

    switchCtn.classList.toggle("is-txr");
    switchCircle[0].classList.toggle("is-txr");
    switchCircle[1].classList.toggle("is-txr");

    switchC1.classList.toggle("is-hidden");
    switchC2.classList.toggle("is-hidden");
    aContainer.classList.toggle("is-txl");
    bContainer.classList.toggle("is-txl");
    bContainer.classList.toggle("is-z200");
}

let mainF = (e) => {
    for (var i = 0; i < allButtons.length; i++)
        allButtons[i].addEventListener("click", getButtons );
    for (var i = 0; i < switchBtn.length; i++)
        switchBtn[i].addEventListener("click", changeForm);
}

window.addEventListener("load", mainF);

// -------------------- AJAX Login & Signup --------------------
jQuery(document).ready(function($){
    // Login
    $('#login-form').on('submit', function(event){
        event.preventDefault();
        let user_email = $('#useremaillogin').val();
        let user_password = $('#userpasslogin').val();
        let hom_url = $('#homeurl').val();
        let alertBox = document.querySelector('.alert');

        $.ajax({
            url: login_signup_ajax_object.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'evemiz_login',
                user_email: user_email,
                user_password: user_password,
            },
            success: function(response){
                if(response.success){
                    // console.log(response.message);
                    alertBox.classList.remove('error');
                    alertBox.classList.add('success');
                    alertBox.innerText = response.data.message;
                    setTimeout(() => {
                        window.location.href = hom_url; 
                    }, 2000);
                } 
                else {
                    alertBox.classList.remove('success');
                    alertBox.classList.add('error');
                    alertBox.innerText = response.data.message;
                }
            },
            error: function(error){
                if(error){
                    alertBox.classList.remove('success');
                    alertBox.classList.add('error');
                    // در PHP پیام خطا در responseJSON.data.message ذخیره می‌شود
                    alert.innerText = error.responseJSON.data.message;
                }
            }
        });
    });

    
    // Signup
    $('#signupform').on('submit', function(event){
    event.preventDefault();
    let user_name = $('#usernamesignup').val();
    let user_email = $('#useremailsignup').val();
    let user_password = $('#userpasssignup').val();
    let hom_url = $('#homeurl').val();
    let alertBox = document.querySelector('.alert');

    $.ajax({
        url: login_signup_ajax_object.ajax_url,
        type: 'POST',
        dataType: 'json',
        data: {
            action: 'evemiz_signup',
            user_name: user_name,
            user_email: user_email,
            user_password: user_password,
        },
        success: function(response){
            if(response.success){
                alertBox.classList.remove('error');
                alertBox.classList.add('success');
                alertBox.innerText = response.data.message;
                setTimeout(() => {
                    // window.location.href = hom_url; 
                    changeForm();
                }, 2000);
            } else {
                alertBox.classList.remove('success');
                alertBox.classList.add('error');
                alertBox.innerText = response.data.message;
            }
        },
        error: function(error){
            if(error && error.responseJSON){
                alertBox.classList.remove('success');
                alertBox.classList.add('error');
                alertBox.innerText = error.responseJSON.data.message || 'خطای ناشناخته';
            }
        }
    });
});
});

