let showPassLogin = document.querySelector("#btnPassLogin")
let showPassRegister = document.querySelector("#btnPassRegister")

showPassLogin.addEventListener("click", () => {
    let pass = document.querySelector(".pass")

    if(pass.type === "password") {
        pass.type = "text"
    }else {
        pass.type = "password"
    }
})

showPassRegister.addEventListener("click", () => {
    let regPass = document.querySelector(".reg_pass")
    let passRe = (typeof document.querySelector(".pass_re") === "undefined" ? null : document.querySelector(".pass_re")) 

    if(regPass.type === "password") {
        regPass.type = "text"
        passRe.type = "text"
    } else {
        regPass.type = "password"
        passRe.type = "password"
    }
})

