temas = [{id:'1',tema:'Programacion'}, 
        {'id':'2','tema':'Calculo'}];

temasId = 2;
idaeliminar = 0;
idaeditar = 0;

actualizar();
console.log(temas);

function agregarTema(){
    let tema = $("#tema").val();
    temasId ++;
    nuevoTema = {'id':temasId+"",'tema':tema};
    temas.push(nuevoTema);
    console.log(temas);
    actualizar();
}

function actualizar(){
    $("#tablaTemas").html('');
    for(let i = 0 ; i < temas.length; i++){
        let fila = "<tr><td>" + temas[i].id + "</td><td>" + temas[i].tema + "</td>";
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
    for(let i = 0 ; i < temas.length; i++){
        if(temas[i].id==idaeliminar){
            temas.splice(i,1);
            break;
        }
    }
    actualizar();
}

function guardaCambios(){
    for(let i = 0 ; i < temas.length; i++){
        if(temas[i].id==idaeditar){
            temas[i].tema = $("#temaEditar").val();
            break;
        }
    }
    actualizar();
}