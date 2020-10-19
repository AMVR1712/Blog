usuarios = [{id:'1', nick:'BlackMask', pass:'171220', activo:'Si', fecha:'2020-09-28'}, 
            {id:'2', nick:'I Need Orbs', pass:'amonoscompa', activo:'No', fecha:'2020-09-28'}];

userid = 2;
idaeliminar = 0;
idaeditar = 0;

actualizar();
console.log(usuarios);

function agregarNick(){
    let nickU = $("#nick").val();
    let passw = $("#pass").val();
    userid ++;
    nuevoUser = {id: userid, nick: nickU, pass: passw, activo:'No', fecha:'2020-09-28'};
    usuarios.push(nuevoUser);
    console.log(usuarios);
    actualizar();
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
    for(let i = 0 ; i < usuarios.length; i++){
        if(usuarios[i].id==idaeliminar){
            usuarios.splice(i,1);
            break;
        }
    }
    actualizar();
}

function guardaCambios(){
    for(let i = 0 ; i < usuarios.length; i++){
        if(usuarios[i].id==idaeditar){
            usuarios[i].nick = $("#userEditar").val();
            usuarios[i].pass = $("#passEditar").val();
            break;
        }
    }
    actualizar();
}