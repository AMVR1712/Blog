usuarios = [{id:'1', nick:'BlackMask', pass:'171220', activo:'Si', fecha:'2020-09-28'}, 
            {id:'2', nick:'I Need Orbs', pass:'amonoscompa', activo:'No', fecha:'2020-09-28'}];

userid = 2;
idaeliminar = 0;
idaeditar = 0;

actualizar();
console.log(usuarios);

function agregarMensaje(){
    let id=sessionStorage.getItem("idtema");
    let user = $("#tablaUsers").val();
    $.getJSON("/Web Services/Ususarios.php",{operacion:'POST',userid:id,usuarios:user}).done(function(datos){
        if(datos.resp=="si"){
            consulta();
        }else{
            alert ("Error");
        }
    }).fail(function(){
        
    });
    /*let msg = $("#mensaje").val();
    msgId ++;
    nuevoMsg = {id: msgId,tema:'Programacion', mensaje: msg, usuario:'juan', fecha:'2020-09-28'};
    mensajes.push(nuevoMsg);
    console.log(mensajes);
    actualizar();*/
}

function actualizar(){
    $("#tablaUsers").html('');
    for(let i = 0 ; i < usuarios.length; i++){
        let fila = "<tr><td>" + usuarios[i].id + "</td><td>" + "<td><td>" + usuarios[i].nick + "</td><td>" + usuarios[i].pass + "</td><td>" + usuarios[i].activo + "</td><td>" + usuarios[i].fecha +"</td>";
        fila = fila + "<td><button onclick='editarUser("+ usuarios[i].id +");' class='btn btn-primary' data-toggle='modal' data-target='#modificaUser'>";
        fila += "<i class='material-icons align-middle'>edit</i></button>";
        fila += "<button onclick='eliminarUser("+ usuarios[i].id +");' class='btn btn-danger' data-toggle='modal' data-target='#eliminaUser'>";
        fila += "<i class='material-icons align-middle'>cancel</i></button></td></tr>";
        //console.log(fila);
        $("#tablaUsers").append(fila);
    }
    
}

function editarUser(id){
    for(let i = 0 ; i < usuarios.length; i++){
        if(usuarios[i].id==id){
            $("#userEditar").val(usuarios[i].nick);
            idaeditar = id;
            break;
        }
    }
}

function editarPass(pass){
    for(let i = 0 ; i < usuarios.length; i++){
        if(usuarios[i].id==id){
            $("#passEditar").val(usuarios[i].pass);
            idaeditar = id;
            break;
        }
    }
}

function eliminarUser(id){
    idaeliminar = id;
}

function confirmaEliminar(){
    user=$("#eliminaUser").val();
    $.getJSON("/Web Services/Usuarios.php",{operacion:'DELETE',idmsg:idaeliminar}).done(function(datos){
        if(datos.resp=="si"){
            consulta();
        }else{
            alert ("Error");
        }
    });
    /*for(let i = 0 ; i < mensajes.length; i++){
        if(mensajes[i].id==idaeliminar){
            mensajes.splice(i,1);
            break;
        }
    }
    actualizar();*/
}

function guardaCambios(){
    user=$("#userEditar").val();
    $.getJSON("/Web Services/Usuarios.php",{operacion:'PUT',userid:idaeditar,usuarios:user}).done(function(datos){
        if(datos.resp=="si"){
            consulta();
        }else{
            alert ("Error");
        }
    });
    /*for(let i = 0 ; i < mensajes.length; i++){
        if(mensajes[i].id==idaeditar){
            mensajes[i].mensaje = $("#msgEditar").val();
            break;
        }
    }
    actualizar();*/
}

function consulta(){
    let id=sessionStorage.getItem("userid");
    $.getJSON("Web Services/Ususarios.php",{operacion:'GET', userid: id}).done(function(datos){
        mensajes=datos;
        actualizar();
    }).fail(function(){
        
    });
}