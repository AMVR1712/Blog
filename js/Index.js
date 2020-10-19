$("#msgLogin").hide();
function login(){
    //u = document.getElementById("user").value;
    u = $("#user").val();
    p = document.getElementById("pass").value;

    if(u == "admin" & p == "123"){
        location.href="inicio.html";
    }else{
        $("#msgLogin").fadeIn(1000);
        $("#msgLogin").html("Error de usuario/contraseña");
    }
}