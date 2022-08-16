
let item_target = document.querySelector(".show_submit_message")

item_target.style.left= "calc(50% - 500px / 2)"
item_target.style.width= "500px"

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


if (item_target.innerText.trim() != "" ){
    show_submit_message(item_target.innerText.trim(), "rgb(255, 84, 72)", "rgb(250, 118, 109)")
}


