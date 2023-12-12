document.addEventListener("DOMContentLoaded", function () {
    const agregar = document.getElementById("agregar");
    const modalInsertar = document.getElementById("modal-insertar");
    const closeForm = document.getElementById("closeInsertar")
    const insertarPersonaButton = document.getElementById("insertarPersonaButton");
    agregar.addEventListener("click", function () {
        modalInsertar.focus()
        if (modalInsertar.classList.contains("modalInsertar")) {
            modalInsertar.classList.remove("modalInsertar");
            modalInsertar.classList.add("modalInsertarAbierto")
        } else {
            modalInsertar.classList.remove("modalInsertarAbierto")
            modalInsertar.classList.add("modalInsertarPausa");
            setTimeout(function () {
                modalInsertar.classList.remove("modalInsertarPausa");
                modalInsertar.classList.add("modalInsertar");
            }, 100);
        }
    })
    closeForm.addEventListener("click", function () {
        modalInsertar.classList.remove("modalInsertarAbierto")
        modalInsertar.classList.add("modalInsertarPausa");
        setTimeout(function () {
            modalInsertar.classList.remove("modalInsertarPausa");
            modalInsertar.classList.add("modalInsertar");
        }, 100);
    })

    const modalconsulta = document.getElementById("modalconsulta")
    const tipoIdenInsertar = document.getElementById("tipo_identificacionInsertar")
    const dniInsertar = document.getElementById("dniInsertar")
    const nombreInsertar = document.getElementById("nombreInsertar")
    const apellidoInsertar = document.getElementById("apellidoInsertar")
    const sexoInsertar = document.getElementById("sexoInsertar")
    const fechaInsertar = document.getElementById("fechaInsertar")
    const nacionalidadInsertar = document.getElementById("nacionalidadInsertar")

        tipoIdenInsertar.addEventListener("change",function(){

            switch(tipoIdenInsertar.value){
                case is ="DNI":
                    dniInsertar.type="number";
                    break;
                    case is ="Pasaporte":
                    dniInsertar.type="text";
                    break;
                }
                
            
        })

        dniInsertar.addEventListener("keypress",function(){
        })

    insertarPersonaButton.addEventListener("click", function (event) {
        if (tipoIdenInsertar.value === "") {
            tipoIdenInsertar.style.border = "solid red 2px";
            alert("El campo de tipo de identificación está vacío. Por favor, introdúcelo.");
        }


        if (dniInsertar.value === "") {
            dniInsertar.style.border = "solid red 2px";
            alert("El campo de número de identificación está vacío. Por favor, introdúcelo.");
        }

        if (nombreInsertar.value === "") {
            nombreInsertar.style.border = "solid red 2px";
            alert("El campo de nombre está vacío. Por favor, introdúcelo.");
        }
        if (apellidoInsertar.value === "") {
            apellidoInsertar.style.border = "solid red 2px";
            alert("El campo de apellido está vacío. Por favor, introdúcelo.");
        }
        if (fechaInsertar.value === "") {
            fechaInsertar.style.border = "solid red 2px";
            alert("El campo de fecha de nacimiento está vacío. Por favor, introdúcelo.");
        }
        if (sexoInsertar.value === "") {
            sexoInsertar.style.border = "solid red 2px";
            alert("El campo de sexo está vacío. Por favor, introdúcelo.");
        }
        if (nacionalidadInsertar.value === "") {
            nacionalidadInsertar.style.border = "solid red 2px";
            alert("El campo de nacionalidad está vacío. Por favor, introdúcelo.");
        }
        if (nacionalidadInsertar.value !== "" &&
            sexoInsertar.value !== "" &&
            fechaInsertar.value !== "" &&
            apellidoInsertar.value !== "" &&
            nombreInsertar.value !== "" &&
            dniInsertar.value !== "" &&
            tipoIdenInsertar.value !== "") {

            if (modalconsulta.classList.contains("modalConsulta")) {
                modalconsulta.classList.remove("modalConsulta")
                modalconsulta.classList.add("modalConsultaAbierto")
                tipoIdenInsertar.disabled = true
                dniInsertar.readOnly = true
                nombreInsertar.readOnly = true
                apellidoInsertar.readOnly = true
                fechaInsertar.disabled = true
                sexoInsertar.disabled = true
                nacionalidadInsertar.disabled = true
                insertarPersonaButton.disabled = true
                nacionalidadInsertar.style.border = "none";
                sexoInsertar.style.border = "none";
                fechaInsertar.style.border = "none";
                apellidoInsertar.style.border = "none";
                nombreInsertar.style.border = "none";
                dniInsertar.style.border = "none";
                tipoIdenInsertar.style.border = "none";
            } else {
                modalconsulta.classList.remove("modalConsultaAbierto")
                modalconsulta.classList.add("modalConsulta")
                tipoIdenInsertar.disabled = false
                dniInsertar.readOnly = false
                nombreInsertar.readOnly = false
                apellidoInsertar.readOnly = false
                fechaInsertar.disabled = false
                sexoInsertar.disabled = false
                nacionalidadInsertar.disabled = false
                insertarPersonaButton.disabled = false


            }
        }
        event.preventDefault();
    })

    const regresar = document.getElementById("regresarInsertar");
    const enviarInsertar = document.getElementById("enviarInsertar");
    regresar.addEventListener("click", function (event) {
        event.preventDefault();
        modalconsulta.classList.remove("modalConsultaAbierto")
        modalconsulta.classList.add("modalConsulta")
        tipoIdenInsertar.disabled = false
        dniInsertar.readOnly = false
        nombreInsertar.readOnly = false
        apellidoInsertar.readOnly = false
        fechaInsertar.disabled = false
        sexoInsertar.disabled = false
        nacionalidadInsertar.disabled = false
        insertarPersonaButton.disabled = false
    })
    const consultaInsertar = document.getElementById("consultaInsertar");
    const otraConsultaInsertar = document.getElementById("otraConsultaInsertar");

    enviarInsertar.addEventListener("click", function (event) {
        tipoIdenInsertar.disabled = false
        fechaInsertar.disabled = false
        sexoInsertar.disabled = false
        nacionalidadInsertar.disabled = false
        if (consultaInsertar.value === "") {
            event.preventDefault();
            alert("Seleccione una consulta válida");
            consultaInsertar.style.border = "solid red";

        }


    });

})