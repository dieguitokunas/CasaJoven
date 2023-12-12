const consultasLink = document.getElementById("consultas-link");

consultasLink.addEventListener("click", function () {
  const consultas = document.getElementById("consultas");
  if (consultas.classList.contains("consultasCerrado")) {
    if (detalles.classList.contains("detallesAbierto")) {
        detalles.classList.remove("detallesAbierto");
        detalles.classList.add("detallesCerrado");
      }
      personas.classList.add("personasCerrado");
      personas.classList.remove("personas");
      personasLink.classList.remove("active");
      consultas.classList.remove("consultasCerrado");
      consultas.classList.add("consultasAbierto");
      consultasLink.classList.add("active");
    }
  });
  document.addEventListener("DOMContentLoaded", function () {
    const paginado = document.getElementById("paginado-consulta");
    const tablaCons = document.getElementById("consultas-tabla");
  
  paginado.addEventListener("click", function (event) {
    event.preventDefault();
    const pagina = event.target.textContent;

    cargarConsultas(pagina);
  });



  const formfiltro = document.getElementById("filtro-form");


  formfiltro.addEventListener("submit", function (e) {
    e.preventDefault();
    consultasFiltradas();
  });
  function consultasFiltradas() {
    const consulta = formfiltro.elements["consulta-filtro"].value;
    const fechaFiltro = formfiltro.elements["fecha-carga"].value;
    const xhrFiltro = new XMLHttpRequest();
    xhrFiltro.open(
      "GET",
      "db/obtener_consultas.php?enviarFiltro=&consulta-filtro=" + consulta+"&fecha-carga="+ fechaFiltro,
      true
    );
    xhrFiltro.onload = function () {
      if (xhrFiltro.status >= 200 && xhrFiltro.status < 300) {
        document.getElementById("consultas-tabla").innerHTML =
          xhrFiltro.responseText;
          console.log(fechaFiltro);
      }
    };
    xhrFiltro.send();
  }

  function cargarConsultas(pagina) {
    const xhrCons = new XMLHttpRequest();
    xhrCons.open(
      "GET",
      "db/obtener_consultas.php?consultas-pagina=" + pagina,
      true
    );

    xhrCons.onload = function () {
      if (xhrCons.status >= 200 && xhrCons.status < 300) {
        tablaCons.innerHTML = xhrCons.responseText;
      }
    };
    xhrCons.send();
  }

  cargarConsultas(1);

 
});
