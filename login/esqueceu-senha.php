<html lang="pt-br">
  <head>

    <meta charset="UTF-8">
    <meta name="description" content="simpleTEC - Tecnologia simplificada.">
    <meta name="keywords" content="catalogo, pagina web, catalogo virtual">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="simpleTEC">

    <title>Resetar senha -> simpleTEC</title>

    <link rel="shortcut icon" href="../assets/img/cube.png" />

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
          esqueceu sua senha
          
        </h1>
        <form class="login__form" method="POST" action="resetar-senha.php">
          
          <div class="login__content-empresa">
            <fieldset class="login__fieldset login__login" name="login">
              <legend class="login__legend">Login</legend>
              <input type="text" name="login" class="login__input input__login" required>
            </fieldset>

            <fieldset class="login__fieldset login__arroba" name="@">
              <legend class="login__legend"></legend>
            </fieldset>

            <fieldset class="login__fieldset login__empresa" name="login">
              <legend class="login__legend">Empresa</legend>
              <input type="text" name="empresa" class="login__input input__empresa" required>
            </fieldset>
          </div>

          <div class="login__content-empresa login__senha">
            <fieldset class="login__fieldset login__login" name="codigo">
              <legend class="login__legend">Codigo da empresa</legend>
              <input type="text" name="codigoEmpresa" class="login__input" required>
            </fieldset>

            <fieldset class="login__fieldset login__arroba" name="@">
              <legend class="login__legend"></legend>
            </fieldset>

            <fieldset class="login__fieldset login__login" name="codigo">
              <legend class="login__legend">E-Mail do seu usuário</legend>
              <input type="mail" name="emailUsuario" class="login__input" required>
            </fieldset>
          </div>

          <input type="submit" value="resetar senha" class="login__submit">
        </form>

        <a href="index.php" class="login__esqueceu">Voltar</a>
      </section>
    </main>

  </body>

</html>
    