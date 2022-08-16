
let myform = document.querySelector("#myform")

let password = document.querySelector("#password")
let password_again= document.querySelector("#password_again")
let user = document.querySelector("#user")
let name = document.querySelector("#name")
let email = document.querySelector("#email")

let item_target = document.querySelector(".show_submit_message")

const show_submit_message = (message, background_color="rgb(170, 253, 223)" , shadow="rgb(150, 248, 212)") => {
    item_target.innerText = message
    item_target.style.backgroundColor = background_color
    item_target.style.boxShadow = "0px 0px 10px " + shadow

    item_target.style.display = "flex"
    item_target.style.opacity = 1
    let cur_opi = 1
    setTimeout(()=>{
        let item_target_timeout = setInterval(() => {
            cur_opi -= 0.05
            item_target.style.opacity = cur_opi

            if(cur_opi <= 0){
                clearInterval(item_target_timeout)
                item_target.style.display = "none"
            }
        }, 100);
    
    },3000)
}



myform.addEventListener("submit", (event)=>{
    if(user.value.trim() == ""){
        event.preventDefault()
        show_submit_message("User is empty", "rgb(248, 255, 55)",  "rgb(251, 255, 125)")
    }
    else if(name.value.trim() == ""){
        event.preventDefault()
        show_submit_message("Name is empty", "rgb(248, 255, 55)",  "rgb(251, 255, 125)")
    }
    else if(email.value.trim() == ""){
        event.preventDefault()
        show_submit_message("Email is empty", "rgb(248, 255, 55)",  "rgb(251, 255, 125)")
    }
    else if(password.value.trim() == ""){
        event.preventDefault()
        show_submit_message("Password is empty", "rgb(248, 255, 55)",  "rgb(251, 255, 125)")
    }else if(password.value !== password_again.value){
        event.preventDefault()
        show_submit_message("Passwords are different!", "rgb(248, 255, 55)",  "rgb(251, 255, 125)")
    }

})

if (item_target.innerText.trim() != "" ){

    show_submit_message(item_target.innerText.trim(), "rgb(255, 84, 72)", "rgb(250, 118, 109)")
}

