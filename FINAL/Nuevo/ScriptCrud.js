  const fileInput = document.getElementById("subir");
  const fileName = document.getElementById("file-name");

  fileInput.addEventListener("change", (event) => {
    if (fileInput.files.length > 0) {
      fileName.textContent = `Archivo seleccionado: ${fileInput.files[0].name}`;
    } else {
      fileName.textContent = "No se ha seleccionado ningún archivo";
    }
  });


  const fileAct = document.getElementById("fileAct");
  const fileNACT = document.getElementById("file-act");

  fileInput.addEventListener("change", (event) => {
    if (fileInput.files.length > 0) {
      fileName.textContent = `Archivo seleccionado: ${fileInput.files[0].name}`;
    } else {
      fileName.textContent = "No se ha seleccionado ningún archivo";
    }
  });
