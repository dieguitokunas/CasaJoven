document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("modal");

  const boton = document.querySelectorAll(".editar");
  const idInput = document.getElementById("id");
  const idenInput = document.getElementById("tipo_identificacion");
  const dniInput = document.getElementById("numero_identificacion");
  const nombreInput = document.getElementById("nombre");
  const apellidoInput = document.getElementById("apellido");
  const fechaInput = document.getElementById("fecha");
  const sexoInput = document.getElementById("sexo");
  const nacionalidadInput = document.getElementById("nacionalidad");
  
  const closeModal = document.getElementById("closeEditar");

  function Modal(id, iden, dniEditar, nombre, apellido, fecha, sexo, nacionalidad) {
    if (modal.classList.contains("modal")) {
      modal.classList.remove("modal");
      modal.classList.add("modalAbierto");
      idInput.value = id;
      idenInput.value = iden;
      dniInput.value = dniEditar;
      nombreInput.value = nombre;
      apellidoInput.value = apellido;
      fechaInput.value = fecha;
      sexoInput.value = sexo;
      nacionalidadInput.value = nacionalidad;
    } else {
      modal.classList.remove("modalAbierto");
      modal.classList.add("modalCerrando");
      setTimeout(function () {
        modal.classList.remove("modalCerrando");
        modal.classList.add("modal");
      }, 100);
    }
  }

  closeModal.addEventListener("click", function () {
    modal.classList.remove("modalAbierto");
    modal.classList.add("modalCerrando");
    setTimeout(function () {
      modal.classList.remove("modalCerrando");
      modal.classList.add("modal");
    }, 100);
  });

  
  boton.forEach(function (button) {
    button.addEventListener("click", function () {
      const filas = button.closest("tr");
      const celdas = filas.getElementsByTagName("td");
      const id = celdas[1].textContent;
      const iden = celdas[2].textContent;
      const dniEditar = celdas[3].textContent;
      const nombre = celdas[4].textContent;
      const apellido = celdas[5].textContent;
      const fecha = celdas[6].textContent;
      const sexo = celdas[7].textContent;
      const nacionalidad = celdas[8].textContent;
      Modal(id, iden, dniEditar, nombre, apellido, fecha, sexo, nacionalidad);
    });
  });

  const actualizarButton = document.getElementById("actualizarButton");




  actualizarButton.addEventListener("click", function (event) {
    switch(idenInput.value){
      case is ="":
        event.preventDefault();
        idenInput.style.border="solid red 2px";
        alert("El campo de tipo de identificación está vacío. Por favor, introdúcelo.");
        break;
      }
      switch(dniInput.value){
        case is="":
          dniInput.style.border="solid red 2px";
          event.preventDefault();
          alert("El campo de número de identificación está vacío. Por favor, introdúcelo.");
          break;
        }
        switch(nombreInput.value){
        case is="":
          nombreInput.style.border="solid red 2px";
          event.preventDefault();
          alert("El campo de nombre está vacío. Por favor, introdúcelo.");
          break;
        }
        switch(apellidoInput.value){
        case is="":
          apellidoInput.style.border="solid red 2px";
          event.preventDefault();
          alert("El campo de apellido está vacío. Por favor, introdúcelo.");
          break;
        }
        switch(fechaInput.value){
        case is="":
          fechaInput.style.border="solid red 2px";
          event.preventDefault();
          alert("El campo de fecha de nacimiento está vacío. Por favor, introdúcelo.");
          break;
        }
        switch(sexoInput.value){
        case is="":
          sexoInput.style.border="solid red 2px";
          event.preventDefault();
          alert("El campo de sexo está vacío. Por favor, introdúcelo.");
          break;
        }
        switch(nacionalidadInput.value){
        case is="":
          nacionalidadInput.style.border="solid red 2px";
          event.preventDefault();
          alert("El campo de nacionalidad está vacío. Por favor, introdúcelo.");
          break;
        }
    })
});
