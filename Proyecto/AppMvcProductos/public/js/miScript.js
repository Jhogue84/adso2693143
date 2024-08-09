let formEliminar = document.querySelector("#formEliminar");
function eliminar(id) {
  let respuesta = confirm("Desea eliminar el registro con id " + id);
  if (respuesta) {
    formEliminar.submit();
  }
}

console.log("fetch");

fetch("http://localhost/appmvcproductos/public/marcas")
  .then((res) => res.json().toString.name)
  .then((data) => console.log(data));
//.catch((e) => console.log(e));

function mostrar() {
  const url = "http://localhost/appmvcproductos/public/marcas";

  fetch("http://localhost/appmvcproductos/public/marcas")
    .then((response) => response.text())
    .then((text) => {
      console.log("Texto recibido:", text); // Imprimir el texto recibido
      try {
        const data = JSON.parse(text);
        console.log("Datos JSON:", data);
      } catch (e) {
        console.error("Error al analizar JSON:", e);
      }
    })
    .catch((error) => {
      console.error(
        "There has been a problem with your fetch operation:",
        error
      );
    });
}
