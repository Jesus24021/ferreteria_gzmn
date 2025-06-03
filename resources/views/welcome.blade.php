<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/constructor.png" />
    <title>Ferretería Guzmán - Home</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
      }

      header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #b07132;
        color: white;
        padding: 1rem 2rem;
      }

      header img {
        width: 50px;
        height: 50px;
        margin-right: 1rem;
      }

      header h1 {
        font-size: 2rem;
        margin: 0;
      }

      .logo-container {
        display: flex;
        align-items: center;
      }

      header a {
        color: white;
        background: #ff6f00;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
      }

      section {
        padding: 2rem;
        max-width: 1000px;
        margin: auto;
      }

      section h2,
      section h3 {
        color: #1b4f72;
        margin-bottom: 1rem;
      }

      .mision-vision {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-top: 2rem;
      }

      .card {
        background: #f4f4f4;
        border-left: 5px solid #00796b;
        padding: 1rem;
        border-radius: 8px;
        text-align: left;
      }

      .card:nth-child(2) {
        border-left-color: #f57c00;
      }

      .categorias ul {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
      }

      .categorias li {
        background: #ffffff;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .productos {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1rem;
      }

      .producto {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
      }

      .producto img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 0.5rem;
      }

      iframe {
        width: 100%;
        height: 300px;
        border: none;
        border-radius: 8px;
      }

      footer {
        background: #b07132;
        color: white;
        text-align: center;
        padding: 1rem;
        margin-top: 2rem;
      }
    </style>
  </head>
  <body>
    <header>
      <div class="logo-container">
        <img src="img/constructor.png" alt="Logo" />
        <h1>Ferretería Guzmán</h1>
      </div>
      <a href=" {{ route('login') }}">Login</a>
    </header>

    <section class="bienvenida">
      <h2>¡Bienvenido a Ferretería Guzmán!</h2>
      <p>
        Ofrecemos soluciones confiables para tus proyectos con productos de
        calidad y atención personalizada.
      </p>

      <div class="mision-vision">
        <div class="card">
          <h3>Misión</h3>
          <p>
            Ofrecer a nuestros clientes productos de ferretería de calidad a
            precios competitivos, brindando un servicio confiable, ágil y
            profesional que satisfaga sus necesidades tanto en el hogar como en
            la industria.
          </p>
        </div>
        <div class="card">
          <h3>Visión</h3>
          <p>
            Ser la ferretería líder en la región por excelencia en el servicio
            al cliente, variedad de productos y compromiso con la mejora
            continua, apoyando el desarrollo de nuestros colaboradores y la
            comunidad.
          </p>
        </div>
      </div>
    </section>

    <section class="categorias">
      <h2>Categorías</h2>
      <ul>
        <li>Herramientas Manuales y Construcción</li>
        <li>Herramientas de Aire</li>
        <li>Herramientas Manuales</li>
        <li>Herramientas para Auto</li>
        <li>Cuidado del Jardin</li>
        <li>Set de Herramientas</li>
        <li>Cerrajeria</li>
        <li>Plomeria y Grifería</li>
          <li>Herramientas para Soldar</li>
          <li>Herramientas para Cables</li>
          <li>Pintura y Accesorios</li>
          <li>Seguridad Industrial</li>
      </ul>
    </section>

    <section>
      <h2>Productos Destacados</h2>

      <div class="productos">
        <div class="producto">
          <img src="img/Martillo.jpg" alt="Martillo" />
          <h4>Martillo de acero</h4>
        </div>
        <div class="producto">
          <img src="img/Taladro.jpg" alt="Taladro" />
          <h4>Taladro eléctrico</h4>
        </div>
        <div class="producto">
          <img src="img/Pintura.jpg" alt="Pintura" />
          <h4>Pintura blanca 1L</h4>
        </div>
        <div class="producto">
          <img src="img/Cinta.jpg" alt="Cinta" />
          <h4>Cinta aislante</h4>
        </div>
      </div>
    </section>

    <section>
      <h2>Ubicación</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.710897542651!2d-98.357636!3d19.2390089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfd0fe271d7c7d%3A0xcdb4c175f975ce0d!2sSan%20Miguel%20Xochitecatitla%2C%20Tlaxcala%2C%2090712!5e0!3m2!1ses!2smx!4v1687362831771"
        allowfullscreen=""
        loading="lazy"
      ></iframe>
    </section>
    <footer>
      <p>&copy; 2025 Ferretería Guzmán. Todos los derechos reservados.</p>
    </footer>
  </body>
</html>
