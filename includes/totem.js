document.addEventListener("DOMContentLoaded", function () {
  const continuar = document.getElementById("continuar");
  const botonVolver = document.getElementById("volver");
  const primerForm = document.getElementById("primer-form");
  const segundoForm = document.getElementById("segundo-form");
  const formConsultas = document.getElementById("consultas-form");
  const mostrarSoloConsulta = document.getElementById("mostrarSoloConsulta");
  const volverPersonas = document.getElementById("volver-a-personas");

  const tipoIden = document.getElementById("tipo_identificacion");
  const numIden = document.getElementById("num_identificacion");
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const sexo = document.getElementById("sexo");
  const fecha = document.getElementById("fecha");
  const nacionalidad = document.getElementById("nacionalidad");
  const consulta= document.getElementById("consulta");
  const otracons= document.getElementById("otra-cons");

    const fechaActual = new Date();

    fechaActual.setFullYear(fechaActual.getFullYear()-16);

    const fechaMinima=fechaActual.toISOString().slice(0,10);

    fecha.setAttribute("max",fechaMinima)
    fecha.setAttribute("min","1900-01-01");

  function mostrarConsulta() {
    if (primerForm.classList.contains("primer-form")) {
      primerForm.classList.remove("primer-form");
      primerForm.classList.add("primer-form-cerrado");
      segundoForm.classList.remove("segundo-form");
      segundoForm.classList.add("segundo-form-abierto");
    } else {
      primerForm.classList.remove("primer-form-cerrado");
      primerForm.classList.add("primer-form");
      segundoForm.classList.remove("segundo-form-abierto");
      segundoForm.classList.add("segundo-form");
    }
  }

  function mostrarPersona() {
    if (segundoForm.classList.contains("segundo-form")) {
      primerForm.classList.remove("primer-form");
      primerForm.classList.add("primer-form-cerrado");
      segundoForm.classList.remove("segundo-form");
      segundoForm.classList.add("segundo-form-abierto");
    } else {
      primerForm.classList.remove("primer-form-cerrado");
      primerForm.classList.add("primer-form");
      segundoForm.classList.remove("segundo-form-abierto");
      segundoForm.classList.add("segundo-form");
    }
  }
  numIden.disabled = true;

  numIden.addEventListener("input", function(){
    const valorValido = /^[0-9]+$/.test(numIden.value);
    if (!valorValido) {
      alert("Ingrese solo numeros");
      numIden.value = "";
      numIden.style.border = "solid red";
    
  }
})
  numIden.addEventListener("change", function(){
    if( numIden.value.length < 8){

      alert("Ingrese una longitud válida");
      numIden.style.border = "solid red";
      numIden.value="";
      numIden.focus();
     } else {
       numIden.style.border = "none";
     }

  })


  fecha.addEventListener("focusout",function(){
    const fechaIngresada=fecha.value
    const partesFecha=fechaIngresada.split("-");
    
        const año=parseInt(partesFecha[0]);
        
        if (año > 2007) {
            alert("Ingrese una fecha válida igual o anterior al 01-01-2007");
            fecha.value = "";
            fecha.style.border = "solid red";
            fecha.focus();
        }else{
            fecha.style.border = "none";
        }
    

  })


  tipoIden.addEventListener("change", function (e) {
    switch (e.target.value) {
      case "DNI":
        numIden.disabled = false;
        numIden.type = "text";
        numIden.value = "";
        numIden.readOnly = false;
        numIden.maxLength = 8;
        numIden.placeholder = "Ingrese su DNI sin puntos ni separaciones";
        break;
      case "No tiene":
        numIden.disabled = false;
        numIden.type = "text";
        numIden.value = "No tiene";
        numIden.readOnly = true;
        break;
      case "Pasaporte":
        numIden.disabled = false;
        numIden.type = "text";
        numIden.value = "";
        numIden.readOnly = false;
        numIden.placeholder = "Ingrese su numero de pasaporte";
        break;
    }
  });


  nombre.addEventListener("input", function () {
    const valorValido = /^[a-zA-Z ]*$/.test(nombre.value);
    if (!valorValido) {
      alert("Ingrese solo letras");
      nombre.value = "";
      nombre.style.border = "solid red";
    }
  })

  apellido.addEventListener("input", function () {
    const valorValido = /^[a-zA-Z ]*$/.test(apellido.value);
    if (!valorValido) {
      alert("Ingrese solo letras");
      apellido.value = "";
      apellido.style.border = "solid red";
    }
  })

  fecha.addEventListener("input",function(){
    const valorValido = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/.test(fecha.value);
    if (!valorValido) {
      alert("Ingrese una fecha valida");
      fecha.value = "";
      fecha.style.border = "solid red";
    }
  })


  continuar.addEventListener("click", function (e) {
    e.preventDefault();
    

     if (tipoIden.value === "") {
      alert("Seleccione un tipo de identificación");
      tipoIden.style.border = "solid red";
    }
    if (numIden.value === "") {
      alert("Introduce un número de identificación");
      numIden.style.border = "solid red";
    }
    if (nombre.value === "") {
      alert("Introduce un nombre");
      nombre.style.border = "solid red";
    }
    if (apellido.value === "") {
      alert("Introduce un apellido");
      apellido.style.border = "solid red";
    }
    if (sexo.value === "") {
      alert("Introduce un sexo");
      sexo.style.border = "solid red";
    }
    if (fecha.value === "") {
      alert("Introduce una fecha de nacimiento");
      fecha.style.border = "solid red";
    }
    if (nacionalidad.value === "") {
      alert("Introduce una nacionalidad");
      nacionalidad.style.border = "solid red";
    }
    if (
      tipoIden.value !== "" &&
      numIden.value !== "" &&
      nombre.value !== "" &&
      apellido.value !== "" &&
      sexo.value !== "" &&
      fecha.value !== "" &&
      nacionalidad.value !== ""
    ) {
      tipoIden.style.border = " none";
      numIden.style.border = "none";
      nombre.style.border = "none";
      apellido.style.border = "none";
      sexo.style.border = "none";
      fecha.style.border = "none";
      nacionalidad.style.border = "none";
      mostrarConsulta();
    }

  });

  botonVolver.addEventListener("click", function (event) {
    event.preventDefault();
    mostrarPersona();
  });
  mostrarSoloConsulta.addEventListener("click", function (event) {
    event.preventDefault();
    if (primerForm.classList.contains("primer-form")) {
      primerForm.classList.remove("primer-form");
      primerForm.classList.add("primer-form-cerrado");
      formConsultas.classList.remove("consultas-form");
      formConsultas.classList.add("consultas-form-abierto");
    } else {
      primerForm.classList.remove("primer-form-cerrado");
      primerForm.classList.add("primer-form");
      formConsultas.classList.add("consultas-form");
      formConsultas.classList.remove("consultas-form-abierto");
    }
  });
  volverPersonas.addEventListener("click", function (event) {
    event.preventDefault();
    if (primerForm.classList.contains("primer-form")) {
      primerForm.classList.remove("primer-form");
      primerForm.classList.add("primer-form-cerrado");
      formConsultas.classList.remove("consultas-form");
      formConsultas.classList.add("consultas-form-abierto");
    } else {
      primerForm.classList.remove("primer-form-cerrado");
      primerForm.classList.add("primer-form");
      formConsultas.classList.add("consultas-form");
      formConsultas.classList.remove("consultas-form-abierto");
    }
  });
  
  const enviar=document.getElementById("EnviarRegistro");
enviar.addEventListener("click",function(event){
  if(consulta.value===""){
    event.preventDefault()
    alert("Ingrese una consulta, en caso de no tener ninguna de las mencionadas en la lista,seleccione ninguna y escriba su consulta en el campo de abajo ");
    consulta.style.border="solid red";
  }
})

const soloConsulta=document.getElementById("enviarSoloConsulta");
const numeroConsulta=document.getElementById("numero_identificacionConsulta");
const consultaConsulta=document.getElementById("consultaConsulta");
const otraConsultaConsulta=document.getElementById("otraConsultaConsulta");
numeroConsulta.maxLength=8;

otraConsultaConsulta.addEventListener("input",function(event){
  const valorValido = /^[a-zA-Z]+$/.test(otraConsultaConsulta.value);
  if (!valorValido) {
    alert("Ingrese solo letras");
    numeroConsulta.value = "";
    numeroConsulta.style.border = "solid red";
  }
})

soloConsulta.addEventListener("click",function(e){
  
  tipoIden.disabled=true;
  numIden.disabled=true;
  nombre.disabled=true;
  apellido.disabled=true;
  sexo.disabled=true;
  fecha.disabled=true;
  nacionalidad.disabled=true;
  consulta.disabled=true;
  otracons.disabled=true;


  if(numeroConsulta.value===""){
    e.preventDefault();
    alert("Ingrese su DNI o numero de pasaporte. En caso de no tener ninguno, escriba 'No tengo'")
    numeroConsulta.style.border="solid red";
  }else{
    numeroConsulta.style.border="none";
  }
  if(consultaConsulta.value===""){
    e.preventDefault();
    alert("Ingrese una consulta, en caso de no tener ninguna de las mencionadas en la lista,seleccione ninguna y escriba su consulta en el campo de abajo ");
    consultaConsulta.style.border="solid red";
  }else{
    consultaConsulta.style.border="none";
  }



}

)
});