function guardarDatos(){
    function Persona(Nombre, Email, Mensaje){
        this.Nombre=Nombre;
        this.Email=Email;
        this.Mensaje=Mensaje;
    }


    var inputsNombre = document.getElementById ("Nombre").value;
    var inputsEmail = document.getElementById("Email").value;
    var inputsMensaje = document.getElementById("Mensaje").value;
    
    nuevaPersona = new Persona(inputsNombre, inputsEmail, inputsMensaje);
    agregar();
    document.getElementById("Nombre").value="";
    document.getElementById("Email").value="";
    document.getElementById("Mensaje").value="";
    document.getElementById("Nombre").focus();
}

baseDatos=[];
function agregar(){
    baseDatos.push(nuevaPersona);
    console.log(baseDatos)
}