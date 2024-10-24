function controlTag(e){
    tecla = (document.HTMLAllCollection) ? e.keyCode : e.which
    if (tecla == 8) return true
    else if (tecla == 0 || tecla == 9) return true
    patron = /[0-9\s]/
    n = String.fromCharCode(tecla)
    return patron.test(n)
}

function testText(txtString){
    let stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü]+$/)
    if(stringText.test(txtString)){
        return true
    }else{
        return false
    }
}

function testEntero(intCant){
    let intCantidad = new RegExp(/^([0-9])*$/)
    if(intCantidad.test(intCant)){
        return true
    }else{
        return false
    }
}

function emailValidate(email){
    let stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/)
    if(stringEmail.test(email)==false){
        return false
    }else{
        return true
    }
}

//

function fntValidText(){
    let validText = document.querySelectorAll(".validText")
    validText.forEach((el)=>{
        el.addEventListener('keyup', ()=>{
            let inputValue = el.value
            if (!testText(inputValue)) {
                el.classList.remove('is-valid')
                el.classList.add('is-invalid')
            }else{
                el.classList.remove('is-invalid')
                el.classList.add('is-valid')
            }
        })
    })
}

function fntValidNumber(){
    let validNumber = document.querySelectorAll(".validNumber")
    validNumber.forEach((el)=>{
        el.addEventListener('keyup', ()=>{
            let inputValue = el.value
            if (!testEntero(inputValue)){
                el.classList.add('is-invalid')
            }else{
                el.classList.remove('is-invalid')
            }
        })
    })
}

function fntValidEmail(){
    let validEmail = document.querySelectorAll(".validEmail")
    validEmail.forEach((el)=>{
        el.addEventListener('keyup', ()=>{
            let inputValue = el.value
            if(!emailValidate(inputValue)){
                el.classList.remove('is-valid')
                el.classList.add('is-invalid')
            }else{
                el.classList.remove('is-invalid')
                el.classList.add('is-valid')
            }
        })
    })
}

window.addEventListener('load', ()=>{
    fntValidText()
    fntValidEmail()
    fntValidNumber()
})