function validarCredenciales() {
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;
  
    if (usuario === "admin" && contrasena === "admin") {
      document.getElementById("mensaje").innerHTML = "Credenciales válidas. Redirigiendo...";
      setTimeout(() => { window.location.href = "./index.php"; }, 1000);
    } else {
      document.getElementById("mensaje").innerHTML = "Credenciales inválidas.";
    }
  }