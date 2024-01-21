<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Coloca esto en la sección de head o justo antes de cerrar el body -->
  <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script>



  <title>Login y Register</title>

  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
      font-family: 'Roboto', sans-serif;
    }

    body {
      background-image: url(logo.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
    }

    main {
      width: 100%;
      padding: 20px;
      margin: auto;
      margin-top: 100px;
    }

    .contenedor__todo {
      width: 100%;
      max-width: 800px;
      margin: auto;
      position: relative;
    }

    .caja__trasera {
      width: 100%;
      padding: 10px 20px;
      display: flex;
      justify-content: center;
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      background-color: rgba(0, 128, 255, 0.5);

    }

    .caja__trasera div {
      margin: 100px 40px;
      color: white;
      transition: all 500ms;
    }


    .caja__trasera div p,
    .caja__trasera button {
      margin-top: 30px;
    }

    .caja__trasera div h3 {
      font-weight: 400;
      font-size: 26px;
    }

    .caja__trasera div p {
      font-size: 16px;
      font-weight: 300;
    }

    .caja__trasera button {
      padding: 10px 40px;
      border: 2px solid #fff;
      font-size: 14px;
      background: transparent;
      font-weight: 600;
      cursor: pointer;
      color: white;
      outline: none;
      transition: all 300ms;
    }

    .caja__trasera button:hover {
      background: #fff;
      color: #46A2FD;
    }

    /*Formularios*/

    .contenedor__login-register {
      display: flex;
      align-items: center;
      width: 100%;
      max-width: 380px;
      position: relative;
      top: -185px;
      left: 10px;


      transition: left 500ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
    }

    .contenedor__login-register form {
      width: 100%;
      padding: 80px 20px;
      background: white;
      position: absolute;
      border-radius: 20px;
    }

    .contenedor__login-register form h2 {
      font-size: 30px;
      text-align: center;
      margin-bottom: 20px;
      color: #46A2FD;
    }

    .contenedor__login-register form input {
      width: 100%;
      margin-top: 20px;
      padding: 10px;
      border: none;
      background: #F2F2F2;
      font-size: 16px;
      outline: none;
    }

    .contenedor__login-register form button {
      padding: 10px 40px;
      margin-top: 40px;
      border: none;
      font-size: 14px;
      background: #46A2FD;
      font-weight: 600;
      cursor: pointer;
      color: white;
      outline: none;
    }




    .formulario__login {
      opacity: 1;
      display: block;
    }

    .formulario__register {
      display: none;
    }



    @media screen and (max-width: 850px) {

      main {
        margin-top: 50px;
      }

      .caja__trasera {
        max-width: 350px;
        height: 300px;
        flex-direction: column;
        margin: auto;
      }

      .caja__trasera div {
        margin: 0px;
        position: absolute;
      }


      .contenedor__login-register {
        top: -10px;
        left: -5px;
        margin: auto;
      }

      .contenedor__login-register form {
        position: relative;
      }
    }
  </style>
</head>

<body>
  <main>
    <div class="contenedor__todo">
      <div class="caja__trasera">
        <div class="caja__trasera-login">
          <h3>¿Ya tienes una cuenta?</h3>
          <p>Inicia sesión para entrar en la página</p>
          <button id="btn__iniciar-sesion">Iniciar Sesión</button>
        </div>
        <div class="caja__trasera-register">
          <h3>¿Aún no tienes una cuenta?</h3>
          <p>Regístrate para que puedas iniciar sesión</p>
          <button id="btn__registrarse">Regístrarse</button>
        </div>
      </div>

      <!--Formulario de Login y registro-->
      <div class="contenedor__login-register">
        <form action="" class="formulario__login">
          <h2>Iniciar Sesión</h2>
          <input type="text" placeholder="Correo Electronico" />
          <input type="password" placeholder="Contraseña" />
          <button>Entrar</button>
        </form>

        <form action="registro.php" method="POST" class="formulario__register">
          <h2>Regístrarse</h2>
          <input type="text" placeholder="Nombre completo" name="nombre_completo" />
          <input type="text" placeholder="Correo Electronico" name="correo" />
          <input type="text" placeholder="Usuario" name="usuario" />
          <input type="password" placeholder="Contraseña" name="contrasena" />
          <button>Regístrarse</button>
        </form>
      </div>
    </div>
  </main>


  <script>
    // Inicialización del cliente Supabase
    // Asegúrate de reemplazar 'tu_clave_anon_publica' con tu clave pública de Supabase
    // Declarar supabase globalmente
    let supabase = null;/*  */
    document.addEventListener('DOMContentLoaded', (event) => {
      supabase = createClient('https://vqxqfxlmxscizjjgmjkf.supabase.co', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZxeHFmeGxteHNjaXpqamdtamtmIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MDQ0MzMzNzMsImV4cCI6MjAyMDAwOTM3M30.Ivkw8XPJduSXY01X-WY-7NJI3AAcsjGBBaLDOlyUtO0')
    });


    // Ejecutando funciones
    document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
    document.getElementById("btn__registrarse").addEventListener("click", mostrarFormularioRegistro);
    window.addEventListener("resize", anchoPage);

    // Declarando variables
    var formulario_login = document.querySelector(".formulario__login");
    var formulario_register = document.querySelector(".formulario__register");
    var contenedor_login_register = document.querySelector(".contenedor__login-register");
    var caja_trasera_login = document.querySelector(".caja__trasera-login");
    var caja_trasera_register = document.querySelector(".caja__trasera-register");

    // FUNCIONES
    // FUNCIONES PARA LA INTERFAZ DE USUARIO
    function mostrarFormularioLogin() {
      formulario_login.style.display = "block";
      formulario_register.style.display = "none";
      // Ajustes adicionales para cajas traseras si es necesario
      caja_trasera_register.style.opacity = "1";
      caja_trasera_login.style.opacity = "0";
    }

    function mostrarFormularioRegistro() {
      formulario_register.style.display = "block";
      formulario_login.style.display = "none";
      // Ajustes adicionales para cajas traseras si es necesario
      caja_trasera_login.style.opacity = "1";
      caja_trasera_register.style.opacity = "0";
    }

    function anchoPage() {
      console.log("Ancho de la página: " + window.innerWidth);

      if (window.innerWidth > 850) {
        console.log("Mostrar caja trasera y formulario en pantalla ancha");
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
      } else {
        console.log("Mostrar caja trasera y formulario en pantalla estrecha");
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";
      }
    }

    async function iniciarSesion() {
      const email = document.querySelector(".formulario__login [type='text']").value;
      const password = document.querySelector(".formulario__login [type='password']").value;

      try {
        const { user, session, error } = await supabase.auth.signIn({
          email: email,
          password: password
        });

        if (error) throw error;
        alert('Inicio de sesión exitoso');
        // Aquí podrías redirigir al usuario o realizar otra acción
        console.log('Usuario inició sesión:', user);
      } catch (error) {
        alert('Error al iniciar sesión: ' + error.message);
      }
    }

    // Esta función maneja tanto la visibilidad del formulario como la lógica de registro

    async function register() {
      const email = document.querySelector(".formulario__register [name='correo']").value;
      const password = document.querySelector(".formulario__register [name='contrasena']").value;
      const fullName = document.querySelector(".formulario__register [name='nombre_completo']").value;
      const username = document.querySelector(".formulario__register [name='usuario']").value;

      try {
        const { user, session, error } = await supabase.auth.signUp({
          email: email,
          password: password
        }, {
          data: {
            full_name: fullName,
            username: username // Asegúrate de que 'username' es un campo permitido en tu configuración de Supabase.
          }
        });

        if (error) throw error;
        alert('Registro exitoso. Verifica tu correo electrónico para activar la cuenta.');
        console.log('Usuario registrado:', user);
      } catch (error) {
        alert('Error en el registro: ' + error.message);
      }
    }


    // Manejador de eventos para el botón de iniciar sesión
    document.getElementById("btn__iniciar-sesion").addEventListener("click", mostrarFormularioLogin);

    // Manejador de eventos para el botón de registrarse
    document.getElementById("btn__registrarse").addEventListener("click", mostrarFormularioRegistro);

    // Asignación del evento onclick directamente en el botón de submit del formulario de login
    document.querySelector(".formulario__login button").onclick = function (event) {
      event.preventDefault(); // Previene la recarga de la página
      iniciarSesion();
    };

    // Asignación del evento onclick directamente en el botón de submit del formulario de registro
    document.querySelector(".formulario__register button").onclick = function (event) {
      event.preventDefault(); // Previene la recarga de la página
      register();
    };

  </script>


</body>

</html>