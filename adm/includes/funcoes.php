<?php
	function verificaEmpresa($empresa){
		global $con;
		$pesquisa='SELECT * FROM tb_cliente WHERE nm_empresa="'.$empresa.'"';
		$select=mysqli_query($con,$pesquisa);

		if(mysqli_num_rows($select)<=0){
			return 'Empresa não encontrada.';
		}
		else if(mysqli_num_rows($select)>1){
			return 'Duplicata de empresa, contate o administrador do sistema.';
		}
		else{
			$resultado = mysqli_fetch_row($select);
			return $resultado;
		}
	}

	function verificaUsuario($login,$senha,$empresa){
		global $con;
	
		$pesquisa='SELECT * FROM tb_usuario WHERE nm_login_usuario="'.$login.'" AND cd_senha_usuario="'.$senha.'" AND tb_cliente_cd_cliente='.$empresa[0];
		$select=mysqli_query($con,$pesquisa);

		if(mysqli_num_rows($select)<=0){
			return 'Usuário ou senha inválida';
		}
		else if(mysqli_num_rows($select)>1){
			return 'Duplicata de login, contate o administrador do sistema.';
		}
		else{
			$resultado = mysqli_fetch_row($select);
			
			return $resultado;
		}


	}

	function iniciarSessao($usuario,$empresa){
		session_start();

		$_SESSION['empresa_simpleTEC']=$empresa;
		$_SESSION['usuario_simpleTEC']=$usuario;
		echo'
			<script>
				window.location="../adm/index.php";
			</script>
		';
	}

	function nomearEmpresa($empresa){
		$resultado = [
			"codigo" => $empresa[0],
			"nome_fantasia" => $empresa[1],
			"nome_contato" => $empresa[2],
			"endereco" => $empresa[3],
			"telefone1" => $empresa[4],
			"telefone2" => $empresa[5],
			"email" => $empresa[6],
			"arroba" => $empresa[7],
			"nome_bd" => $empresa[8],
			"usuario_bd" => $empresa[9],
			"senha_bd" => $empresa[10],
			"observacao" => $empresa[11],
			"data_inicio_plano" => $empresa[12],
			"plano" => $empresa[13],
			"codigoAutomaticoProduto" => $empresa[14],
		];
		return $resultado;

	}

	function nomearUsuario($usuario){
		$resultado = [
			"codigo" => $usuario[0],
			"empresa" => $usuario[1],
			"nome" => $usuario[2],
			"login" => $usuario[3],
			"senha" => $usuario[4],
			"email" => $usuario[5],
			"telefone" => $usuario[6],
		];
		return $resultado;

	}

	function nomearPlano($cd_plano){
		global $con;
		$pesquisa='SELECT * FROM tb_plano WHERE cd_plano="'.$cd_plano.'"';
		$select=mysqli_query($con,$pesquisa);
		$plano = mysqli_fetch_row($select);

		$resultado = [
			"codigo" => $plano[0],
			"nome" => $plano[1],
			"descricao" => $plano[2],
			"valor" => $plano[3],
			"imagem" => $plano[4],		];
		return $resultado;

	}

	function nomearStatus($vl_status){
		if($vl_status=='A'){
			$resultado = [
				"nome" => 'Ativo(a)',
				"cod" => 'A',
				"icone" => 'ok',
				"CorIcone" => 'blue',
			];
		}
		else if($vl_status=='D'){
			$resultado = [
				"nome" => 'Desativado(a)',
				"cod" => 'D',
				"icone" => 'cancel',
				"CorIcone" => 'blue',
			];
		}
		else{
			$resultado = [
				"nome" => 'ERRO',
				"cod" => 'D',
				"icone" => 'cancel',
				"CorIcone" => 'blue',
			];
		}
		return $resultado;
	}

	function nomearCategoria($categoria){
		global $con_cliente;

		//PESQUISA TOTAL PRODUTOS
		$pesquisa='SELECT * FROM tb_produto WHERE tb_categoria_cd_categoria='.$categoria[0];
		$select=mysqli_query($con_cliente,$pesquisa);
		
		$status = nomearStatus($categoria[2]);

		$resultado = [
			"codigo" => $categoria[0],
			"nome" => $categoria[1],
			"status" => $status['nome'],
			"codigoStatus" => $categoria[2],
			"produtos" => mysqli_num_rows($select),
		];

		return $resultado;
	}

	function nomearProduto($produto){
		global $con_cliente;

		//PESQUISA CATEGORIA
		$pesquisa='SELECT * FROM tb_categoria WHERE cd_categoria='.$produto[2];
		$select=mysqli_query($con_cliente,$pesquisa);
		$categoria=mysqli_fetch_row($select);

		//PESQUISA FOTO(S)
		$pesquisa='SELECT * FROM tb_foto_produto WHERE tb_produto_cd_produto='.$produto[0];
		$select=mysqli_query($con_cliente,$pesquisa);
		$qtdFotos=mysqli_num_rows($select);
		if(mysqli_num_rows($select)>=1){
			while($objeto=mysqli_fetch_row($select)){
				$codigoFotoProduto=$objeto[0];
				$extensaoFotoProduto=$objeto[2];
			}
		}
		else{
			$fotoProduto=0;
		}

		$status = nomearStatus($produto[8]);
		$destaque = nomearStatus($produto[4]);

		$resultado = [
			"codigo" => $produto[0],
			"nome" => $produto[1],
			"codigoCategoria" => $produto[2],
			"nomeCategoria" => $categoria[1],
			"valor" => $produto[3],
			"destaqueCodigo" => $destaque['cod'],
			"destaqueNome" => $destaque['nome'],
			"destaqueIcone" => $destaque['icone'],
			"descricao" => $produto[5],
			"tags" => $produto[6],
			"dataDeCadastro" => $produto[7],
			"statusCodigo" => $produto[8],
			"statusNome" => $status['nome'],
			"statusIcone" => $status['icone'],
			"fotosQuantidade" => $qtdFotos,
			"fotoProdutoCodigo" => $codigoFotoProduto,
			"fotoProdutoExtensao" => $extensaoFotoProduto,
		];

		return $resultado;
	}

	function mostraOpcao($nome,$codigo,$valor){
		if($valor=='A'){$corAtivo = 'blue';}
		else{$corAtivo = 'black';}
		if($valor=='D'){$corDesativado = 'blue';}
		else{$corDesativado = 'black';}

		echo'
		<li class="opcoes-lista__li-opcao">
			<p class="opcoes-lista__li-p">'.$nome.'</p>
		</li>
		
		<li class="opcoes-lista__li">
			<ul class="opcoes-lista__status-list" id="'.$nome.'">
				<p class="invisivel" id="acao">'.$nome.'</p>
				<p class="invisivel" id="objeto">'.$codigo.'</p>
				<li class="opcoes-lista__status-option icon icon__ok--'.$corAtivo.'" id="opcao_lista">
					<span class="invisivel" id="valor">A</span>
					<span class="icon__legend">Ativo</span>
				</li>
				<li class="opcoes-lista__status-option icon icon__cancel--'.$corDesativado.'" id="opcao_lista">
					<span class="invisivel" id="valor">D</span> 
					<span class="icon__legend">Desativado</span>
				</li>
			</ul>
		</li>
		';
	}

	function criarPastaFotoProduto($empresa,$codigoFotoProduto){
		$diretorio = '../../users/'.$empresa.'/fotos/'.$codigoFotoProduto.'/';
		mkdir($diretorio);
		return $diretorio;
	}

	function nomearFoto($nome,$fotoProduto){
		$extensao = strtolower(substr($nome, -4)); //pega a extensao do arquivo
		$novoNome = $fotoProduto . $extensao; //define o nome do arquivo
		return $novoNome;
	}

	function uparFoto($nomeTemporario,$diretorio,$novoNome){
		move_uploaded_file($nomeTemporario, $diretorio.$novoNome); //efetua o upload
	}

	function excluirFoto($empresa,$codigoFoto,$extensao){
		unlink('../../users/'.$empresa.'/fotos/'.$codigoFoto.'/'.$codigoFoto.$extensao);// APAGAR FOTO
		unlink('../../users/'.$empresa.'/fotos/'.$codigoFoto.'/thumb_'.$codigoFoto.$extensao);// APAGAR FOTO
		rmdir('../../users/'.$empresa.'/fotos/'.$codigoFoto.'/'); // APAGAR PASTA
	}

	

	
?>