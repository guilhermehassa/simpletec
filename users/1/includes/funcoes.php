<?php 

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
		global $con;

		
		//PESQUISA TOTAL PRODUTOS
		$pesquisa='SELECT * FROM tb_produto WHERE tb_categoria_cd_categoria='.$categoria[0];
		$select=mysqli_query($con,$pesquisa);
		
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
		global $con;

		//PESQUISA CATEGORIA
		$pesquisa='SELECT * FROM tb_categoria WHERE cd_categoria='.$produto[2];
		$select=mysqli_query($con,$pesquisa);
		$categoria=mysqli_fetch_row($select);

		//PESQUISA FOTO(S)
		$pesquisa='SELECT * FROM tb_foto_produto WHERE tb_produto_cd_produto='.$produto[0];
		$select=mysqli_query($con,$pesquisa);
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

?>