<?php
echo'
<section class="menu">
  <nav class="menu__nav">
    <ul class="menu__ul">
      <li id="menu-inicio" class="menu__li">
        <a href="inicio.php" class="menu__link">
          <span class="menu__cube"></span>
          <span class="menu__txt">Início</span>
        </a>
      </li>

			';

      // <li id="menu-pedidos" class="menu__li">
      //   <a href="pedidos.html" class="menu__link">
      //     <span class="menu__cube"></span>
      //     <span class="menu__txt">Pedidos</span>
      //   </a>
      // </li>

      // <li id="menu-clientes" class="menu__li">
      //   <a href="clientes.html" class="menu__link">
      //     <span class="menu__cube"></span>
      //     <span class="menu__txt">Clientes</span>
      //   </a>
      // </li>

			echo'
      <li id="menu-produtos" class="menu__li">
        <a href="produtos.php" class="menu__link">
          <span class="menu__cube"></span>
          <span class="menu__txt">Produtos</span>
        </a>
      </li>

      <li id="menu-categorias" class="menu__li">
        <a href="categorias.php" class="menu__link">
          <span class="menu__cube"></span>
          <span class="menu__txt">Categorias</span>
        </a>
      </li>';

      // <li id="menu-relatorios" class="menu__li">
      //   <a href="relatórios.html" class="menu__link">
      //     <span class="menu__cube"></span>
      //     <span class="menu__txt">Relatórios</span>
      //   </a>
      // </li>

      // <li id="menu-empresa" class="menu__li">
      //   <a href="empresa.html" class="menu__link">
      //     <span class="menu__cube"></span>
      //     <span class="menu__txt">Empresa</span>
      //   </a>
      // </li>
      // <li id="menu-usuarios" class="menu__li">
      //   <a href="usuarios.html" class="menu__link">
      //     <span class="menu__cube"></span>
      //     <span class="menu__txt">Usuários</span>
      //   </a>
      // </li>
    echo '
    </ul>
  </nav>

  <div class="usuario">

    <h2 class="usuario__titulo">Usuario: '.$usuario['nome'].'</h2>
    <h2 class="usuario__titulo">Empresa: '.$empresa['nome_fantasia'].'</h2>
    <!-- ALTERAR SENHA -->
    <a href="alterar-senha.php" class="usuario__link">
      <p class="usuario__link-texto">Alterar Senha</p>
    </a>
    <!-- SAIR DO SISTEMA -->
    <a href="#" class="usuario__link" id="logout">
      <p class="usuario__link-texto">Logout</p>
    </a>
  </div>
</section>';

?>