document.addEventListener('DOMContentLoaded', ()=>{
    if (document.querySelector('#formLogin')) {
        let formLogin = document.querySelector('#formLogin');

        formLogin.addEventListener('submit', (e)=>{
            e.preventDefault()

            let strEmail = document.querySelector('#txtEmail').value
            let strPassword = document.querySelector('#txtPassword').value

            if(strEmail == "" || strPassword == ""){
                Swal.fire({
                    title: "Ingresar",
                    text: "Por favor, escribe usuario y contraseña",
                    icon: "error"
                })
                return false
            }else{
                frmData = new FormData(formLogin)
                fetch(base_url + '/login/loginUser', {
                    method: "POST",
                    body: frmData
                })
            }
        })
    }
})