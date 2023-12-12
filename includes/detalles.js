document.addEventListener("DOMContentLoaded", function () {
    const tds = document.querySelectorAll("table tbody tr td a[data-dni]");
  
    const personas = document.getElementById("personas");
    const personasLink = document.getElementById("personas-link");
  
  
  
    tds.forEach(function (td) {
      td.addEventListener("click", function (e) {
        e.preventDefault();
        if (detalles.classList.contains("detallesCerrado")) {
          detalles.classList.remove("detallesCerrado");
          detalles.classList.add("detallesAbierto");
          personasLink.classList.remove("active");
          personas.classList.remove("personas");
          personas.classList.add("personasCerrado");
        } else {
          personas.classList.remove("personasCerrado");
          personas.classList.add("personas");
          detalles.classList.remove("detallesAbierto");
          detalles.classList.add("detallesCerrado");
        }
  
        const dni = td.getAttribute("data-dni");
  
        // Realiza una solicitud AJAX para obtener los detalles
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "db/detalles.php?dni=" + dni, true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const detalles = document.getElementById("detalles");
            detalles.innerHTML = xhr.responseText;
          }
        };
        xhr.send();
      });
    });
  });
  