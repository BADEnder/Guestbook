

let send_email_but = document.querySelector("#send_email_but")
// console.log(send_email_but)
send_email_but.addEventListener("click", (event)=>{
    event.preventDefault()
})

const sendEmail = (elem) => {
    let user = document.querySelector("#user")
    if(user.value.trim() == ""){
        alert("You didn't enter the user.")
    }else{
        elem.disabled = true
        setTimeout(()=>{
            elem.disabled = false

        }, 30000)
    }
}

