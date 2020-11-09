$("#msgLogin").hide();
function login(){
    //u = document.getElementById("user").value;
    u = $("#user").val();
    p = document.getElementById("pass").value;

    $.getJSON("Login.php",{user:u,pass:p}).done(function(datos){
        console.log(datos);
        if(datos.resp=="Si"){
            location.href="Inicio.php";
        }else{
            $("#msgLogin").fadeIn(1000);
            $("#msgLogin").html("Error de usuario/contraseña");
        }
    });
    
}