<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <link rel="stylesheet" href="style.css"> 
   <title>Pagina Principal</title>
</head>
    <body>
     <div class="head">
        <div class="logo">
         <a href="index.php"> Logo</a>
        </div>
        
        <body>
        
        <?php
    session_start(); 
    ?>

<body>
    <div class="container">
    
        <?php if (isset($_SESSION['user_email'])): ?>
            
            <p>¡Bienvenido, <?php echo $_SESSION['user_email']; ?>!</p>
            <a href="logout.php" class="btn">Cerrar sesión</a>
        <?php else: ?>
            
            <div class="btn-container">
                <a href="login.php" class="btn">Iniciar sesión</a>
                <a href="register.php" class="btn">Registrarse</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

</body>
</html>
<nav class="navbar">
    <a href="index.php">Inicio</a>
    <a href="#">Nosotros</a>
    <a href="#">Contacto</a>
    <a href="form_profes.php">Publicar Información</a>
    <a href="ver_profesores.php">Ver Profesores</a> 
</nav>

    </div>

    <header class="content header">
        <h2 class="title">Particoolares</h2>
        <p>
       
Particoolares es una plataforma ideal para conectar a estudiantes con profesores particulares.
 Facilita la búsqueda de tutores según necesidades y horarios,
  y permite a los docentes ofrecer sus servicios de manera sencilla,
 optimizando el proceso de enseñanza-aprendizaje.
        </p>
<div class="btn-home">
    <a href="#" class="btn"> Saber mas</a>
</div>
    </header>


    <section class="content sau">

        <h2 class="title">Ventajas</h2>

        <p>
        ¿Porque usar particoolares?
        </p>

        <div class="box-container">

            <div class="box">
                <i class="fab fa-angular"></i>
                <h3>Rapidez</h3>
                <p> 
                    Podras encontrar al profesor ideal que tanto buscabas en tan solo 2 clicks.
                </p>
            </div>
            <div class="box">
                <i class="fab fa-apple"></i>
                <h3>comunicacion</h3>
                <p> 
                    Podras comunicarte rapidamente via email con el profesor gracias a la informacion que suban ellos. 
                </p>
            </div>
            <div class="box">
                <i class="fab fa-android"></i>
                <h3>variedad</h3>
                <p> 
                    En esta fabulosa web podras encontrar al profesore de la materia que necesites, 
                    ya que a esta web se suman miles de profesores. 
                </p>
            </div>

        </div>
    </section>

    <section class="content about">
        <h2 class="title">nosotros</h2>
        <p>
        Particoolares nació porque nos dimos cuenta de lo difícil que es encontrar un profesor particular rápidamente. 
        La plataforma busca simplificar este proceso,
         conectando a estudiantes con docentes disponibles de manera fácil y eficiente.
        </p>
        <a href="#" class="btn"> saber mas</a>

    </section>

    <section class="content price">
        <article class="contain">
            <h2 class="title">Clases</h2>
            <p>
            Las clases particulares son una herramienta esencial para el aprendizaje, ya que ofrecen 
            una atención personalizada que permite a los estudiantes avanzar a su propio ritmo. 
            A diferencia de las clases tradicionales, los tutores pueden enfocarse específicamente 
            en las necesidades de cada alumno, resolviendo dudas y reforzando conceptos clave. 
            Esto no solo mejora el rendimiento académico, sino que también aumenta la confianza del estudiante, 
            permitiéndole comprender mejor las materias que antes le resultaban complicadas. 
            Las clases particulares se adaptan a diferentes estilos de aprendizaje, 
            haciendo que el proceso educativo sea más efectivo y motivador.
            </p>
            <a href="#" class="btn">Contacto</a>

        </article>

    </section>
</body>
</html>




