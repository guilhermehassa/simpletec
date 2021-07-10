<html lang="pt-br">
  <head>

    <meta charset="UTF-8">
    <meta name="description" content="simpleTEC - Tecnologia simplificada.">
    <meta name="keywords" content="catalogo, pagina web, catalogo virtual">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="simpleTEC">

    <title>login -> simpleTEC</title>

    <link rel="shortcut icon" href="../assets/img/cube-icon.png" />

    <!-- RESETAR ESTILOS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">

    <!-- ESTILOS COMUNS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/login.css">

    

  </head>
  <body>

    <main>
      <img src="../assets/img/logo_transp.png" class="login__logo">
      <section class="login">
        <h1 class="login__titulo">
          <span class="cube login__cube"></span>
          login
          
        </h1>
        <form class="login__form" method="POST" action="logar.php">
          
          <div class="login__content-empresa">
            <fieldset class="login__fieldset login__login" name="login">
              <legend class="login__legend">Login</legend>
              <input type="text" name="login" class="login__input input__login" required>
            </fieldset>

            <fieldset class="login__fieldset login__arroba" name="@">
              <legend class="login__legend">@</legend>
            </fieldset>

            <fieldset class="login__fieldset login__empresa" name="login">
              <legend class="login__legend">Empresa</legend>
              <input type="text" name="empresa" class="login__input input__empresa" required>
            </fieldset>
          </div>

          <fieldset class="login__fieldset login__senha" name="empresa">
            <legend class="login__legend">Senha</legend>
            <input type="password" name="senha" class="login__input" required>
          </fieldset>

          <input type="submit" value="acessar" class="login__submit">
        </form>

        <a href="esqueceu-senha.php" class="login__esqueceu">Esqueceu sua senha? Clique Aqui!</a>
      </section>
    </main>

  </body>

</html>
    