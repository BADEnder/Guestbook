
let myform = document.querySelector("#myform")

let password = document.querySelector("#password")
let password_again= document.querySelector("#password_again")
let user = document.querySelector("#user")
let name = document.querySelector("#name")
let email = document.querySelector("#email")

// console.log(myform)
// console.log(password)
// console.log(user)
// password.addEventListener("keyup", ()=>{
//     name.value = password.value
// })



myform.addEventListener("submit", (event)=>{
    if(user.value.trim() == ""){
        event.preventDefault()
        alert("User is empty")
    }
    else if(name.value.trim() == ""){
        event.preventDefault()
        alert("Name is empty")
    }
    else if(email.value.trim() == ""){
        event.preventDefault()
        alert("Email is empty")
    }
    else if(password.value !== password_again.value){
        event.preventDefault()
        alert("Passwords are different!")
    }

})

// myform.addEventListener("submit", (event) => {
//     event.preventDefault()
//     console.log("event submitted.")
// })