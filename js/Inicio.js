temas = [{id:'1',tema:'Programacion'}, 
        {'id':'2','tema':'Calculo'}];

temasId = 2;
idaeliminar = 0;
idaeditar = 0;
consulta();
//actualizar();
console.log(temas);

function agregarTema(){
    let tema = $("#tema").val();
    $.getJSON("Add_Temas.php", {nombre:tema}).done(function(Datos){
        if(Datos.resp == "Si"){
            consulta();
        }else{
            $('.toast').toast('show');
        }
    });

    /*let tema = $("#tema").val();
    temasId ++;
    nuevoTema = {'id':temasId+"",'tema':tema};
    temas.push(nuevoTema);
    console.log(temas);
    actualizar();*/
}

function actualizar(){
    $("#tablaTemas").html('');
    for(let i = 0 ; i < temas.length; i++){
        let fila = "<tr><td>" + temas[i].id + "</td><td><a onclick=ver ("+ temas[i] + ", \'"+ temas[i].id + ")'>" + temas[i].tema + "</td>";
        fila = fila + "<td><button onclick='editarTema("+ temas[i].id +");' class='btn btn-primary' data-toggle='modal' data-target='#modificaTema'>";
        fila += "<i class='material-icons align-middle'>edit</i></button>";
        fila += "<button onclick='eliminarTema("+ temas[i].id +");' class='btn btn-danger' data-toggle='modal' data-target='#eliminaTema'>";
        fila += "<i class='material-icons align-middle'>cancel</i></button></td></tr>";
        //console.log(fila);
        $("#tablaTemas").append(fila);
    }
    
}

function editarTema(idTema){
    for(let i = 0 ; i < temas.length; i++){
        if(temas[i].id==idTema){
            $("#temaEditar").val(temas[i].tema);
            idaeditar = idTema;
            break;
        }
    }
}

function eliminarTema(idtema){
    idaeliminar = idtema;
}

function confirmaEliminar(){
    $.GetJSON("Del_Temas.php", {id:idaeliminar}).done(function (Datos){
        if(Datos.resp == "Si"){
            consulta();
        }else{

        }
    });

    /*for(let i = 0 ; i < temas.length; i++){
        if(temas[i].id==idaeliminar){
            temas.splice(i,1);
            break;
        }
    }
    actualizar();*/
}

function guardaCambios(){
    $.GetJSON("Mod_Temas.php", {id:idaeditar, nombre:nom}).done(function (Datos){
        if(Datos.resp == "Si"){
            consulta();
        }else{
            alert("No hay cambios");
        }
    });

    /*for(let i = 0 ; i < temas.length; i++){
        if(temas[i].id==idaeditar){
            temas[i].tema = $("#temaEditar").val();
            break;
        }
    }
    actualizar();*/
}


/* Conexión a Base de Datos */
/* Consulta */

function consulta(){
    $.GetJSON("Con_Temas.php").done(function (Datos){
        temas = Datos;
        actualizar();
    }).fail(function(e){
        console.log(e);
    });
}

function ver(Tema){
    sessionStorage.setItem("idtema", tema.id);
    sessionStorage.setItem("tema", tema.tema);
    location.href="Mensajes.php";
}