<?php

class memory
{
	var $dg;
	var $gp;
	var $gb;

	//Board
	var $lin;
	var $col;
	var $url;
	var $board;
	var $nmImg;

	function memory()
	{
		/*Construtor*/
		$this->nmImg = 50;
		$this->initMemory();
	}

	function initMemory()
	{
		if(isset($_SESSION['datagame']))
		{
			if(!isset($this->dg))
				$this->dg = unserialize($_SESSION['datagame']);

			if(!isset($this->gp) && !isset($this->gb))
			{
				if(isset($_SESSION['gamePlayer']) && isset($_SESSION['gameBoard']))
				{
					$this->gp = unserialize($_SESSION['gamePlayer']);
					$this->gb = unserialize($_SESSION['gameBoard']);
				}
				else
				{
					$this->gp = new gamePlayer();
					$_SESSION['gamePlayer'] = serialize($this->gp);
					$this->gb = new gameBoard();
					$_SESSION['gameBoard'] = serialize($this->gb);
				}
			}

			if(isset($this->dg) && isset($this->gp) && isset($this->gb))
				$this->loadGame(); //Carrega Jogo
			else
			{
				echo "<b>Erro!! Preencha as Configurações Iniciais do Jogo</b> (<a href=\"../index.php\">Configurar</a>).";
				session_destroy();
			}
		}
		else
		{
			echo "<b>Erro!! Preencha as Configurações Iniciais do Jogo</b> (<a href=\"../index.php\">Configurar</a>).";
			session_destroy();
		}
	}

	function loadGame()
	{
		//Barra do Menu
		$this->menuBar();

    //Inciar Tabuleiro
    $this->initBoard();
	}

	function menuBar()
	{
			echo "<nav id=\"navMenu\" class=\"navbar navbar-expand-lg navbar-light\">";
      echo "<a class=\"navbar-brand\">";
      echo "<img src=\"img/system/memory-icon.png\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\">";
      echo "Jogo da Memória";
      echo "</a>";
      echo "<ul class=\"navbar-nav\">";
      echo "<li class=\"nav-item\">";
      echo "<a class=\"nav-link\"><b>Nível: </b>".$this->dg->getLevel()."</a>";
      echo "</li>";
      echo "</ul>";
      echo "<ul class=\"navbar-nav\">";
      echo "<li class=\"nav-item\">";
      echo "<a class=\"nav-link\"><b>Estilo: </b>".$this->dg->getCategory()."</a>";
      echo "</li>";
      echo "</ul>";
      echo "<ul class=\"navbar-nav\">";
      echo "<li class=\"nav-item\">";
      echo "<a href=\"../index.php\" class=\"ml-3 btn btn-info\">Voltar</a>";
      echo "</li>";
      echo "</ul>";
  		echo "</nav>";
	}

	function dataPlayer($n, $namePlayer, $avatarPlayer, $hits, $hitsRound, $errors)
	{
    echo "<div class=\"p-2 my-flex-item\">";
		echo "<div class=\"card\" style=\"width: 18rem;\">";
		echo "<div class=\"sidebar text-center\">";
		echo "<img src=\"../img/avatar".$avatarPlayer.".png\" class=\"img-circle mt-3\" width=\"120\" height=\"110\">";
		echo "<h6>JOGADOR ".$n."</h6>";
		echo "</div>";
		echo "<div class=\"card-body\">";
		echo "<h5 class=\"card-title\">".$namePlayer."</h5>";
		echo "<p class=\"card-text\">";
		echo "<img src=\"../img/ok.png\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\">";
		echo "<b>Acertos: </b>".$hits;
		echo "</p>";
		echo "<p class=\"card-text\">";
		echo "<img src=\"../img/no.png\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\">";
		echo "<b>Erros: </b>".$errors;
		echo "</p>";
		echo "<p align=\"center\">------------------------------</p>";
		echo "<p class=\"card-text\">";
		echo "<img src=\"../img/score.png\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\">";
		echo "<b>Pnts. Rodada: </b>".$hitsRound;
		echo "</p>";
		echo "<p align=\"center\">------------------------------</p>";

		if($n == 1)
		{
			if($this->gp->getInfo()['player'] == 1)
				echo "<span class=\"badge badge-success\"><h6>Sua vez de jogar!</h6></span>";
			else
				echo "<span class=\"badge badge-danger\"><h6>Espere! Não é sua vez :)</h6></span>";
		}
		else
		{
			if($this->gp->getInfo()['player'] == 2)
				echo "<span class=\"badge badge-success\"><h6>Sua vez de jogar!</h6></span>";
			else
				echo "<span class=\"badge badge-danger\"><h6>Espere! Não é sua vez :)</h6></span>";
		}

		echo "</div>";
		echo "</div>";
		echo "</div>";
	}

	function clear()
	{
		if ($this->gp->getInfo()['hits2'] > $this->gp->getInfo()['hits1'])
			$this->gp->setPlayer(2);
		else
			$this->gp->setPlayer(1);

		$this->gp->setHits('hits1', 0);
		$this->gp->setHits('hits2', 0);
		$this->gp->setHits('erros1', 0);
		$this->gp->setHits('erros2', 0);
		$this->gp->setWon(0);
		$this->gp->setNewGame(0);

		$this->gb->clearBoard();
		$this->gb->gameBoard();

		$_SESSION['gameBoard'] = serialize($this->gb);
		$_SESSION['gamePlayer'] = serialize($this->gp);
	}

	function initBoard()
	{
		if($this->dg->getLevel() == "Fácil")
		{
			$this->lin = 2;
			$this->col = 4;
		}
		elseif($this->dg->getLevel() == "Médio")
		{
			$this->lin = 4;
			$this->col = 6;
		}
		else
		{
			$this->lin = 5;
			$this->col = 8;
		}

		if($this->dg->getCategory() == "Filmes")
		{
			$this->url = "../img/Movies/";
		}
		else if($this->dg->getCategory() == "Séries")
		{
			$this->url = "../img/Series/";
		}
		else if($this->dg->getCategory() == "Jogos Eletrônicos")
		{
			$this->url = "../img/Games/";
		}
		else if($this->dg->getCategory() == "Músicas")
		{
			$this->url = "../img/Music/";
		}
		else
		{
			$this->url = "../img/Cartoon/";
		}

		if($this->gp->getInfo()['newGame'] == 0)
			$this->board = $this->gb->getBoard();
		else
			$this->clear();

		if(!isset($_GET['piece']))
		{
			if(empty($this->board))
			{
				$tam = ($this->lin*$this->col)/2;

				$numbers = range(1, $this->nmImg);
				srand((float)microtime()*1000000);
				shuffle($numbers);
				$numbers = array_slice($numbers, 0, $tam);

				$letra = "a.";
				for($i=0; $i<2;$i++)
				{
					shuffle($numbers);
					foreach ($numbers as $number)
					{
				    	$this->gb->setBoard($letra.$number);
					}

				    $letra = "b.";
				}

				$this->board = $this->gb->getBoard();
				shuffle($this->board);

				$this->gb->setBoardAll($this->board);
				$_SESSION['gameBoard'] = serialize($this->gb);
			}
		}
		else
			$this->game(); //Verifica Jogada

		if($this->gp->getInfo()['hits1']+$this->gp->getInfo()['hits2'] == (count($this->board)/2))
		{
			echo "<div class=\"alert alert-success\" role=\"alert\">";
			if($this->gp->getInfo()['hits1']> $this->gp->getInfo()['hits2'])
			{
				echo "Parabéns!! Jogador 1 é o vencedor :)";
				$hr = $this->gp->getInfo()['hitsR1'];
				$hr += 1;
				$this->gp->setHitsRound('hitsR1', $hr);
			}
			elseif ($this->gp->getInfo()['hits2'] > $this->gp->getInfo()['hits1'])
			{
				echo "Parabéns!! Jogador 2 é o vencedor :)";
				$hr = $this->gp->getInfo()['hitsR2'];
				$hr += 1;
				$this->gp->setHitsRound('hitsR2', $hr);
			}
			else
				echo "Ocorreu um empate :(";

			echo "<a href=\"jogo.php\" class=\"ml-5 btn btn-primary\">Jogar Novamente</a>";
			echo "</div>";

			$this->gp->setNewGame(1);
			$_SESSION['gamePlayer'] = serialize($this->gp);

		}

		echo "<div class=\"d-flex justify-content-between\">";
		//Info do Jogador 1
    $this->dataPlayer(1, $this->dg->getNamePlayer1(), $this->dg->getAvatarPlayer1(), $this->gp->getInfo()['hits1'], $this->gp->getInfo()['hitsR1'], $this->gp->getInfo()['erros1']);

    	//Monta Tabuleiro
		$this->board();

    	//Info do Jogador 2
		$this->dataPlayer(2, $this->dg->getNamePlayer2(), $this->dg->getAvatarPlayer2(), $this->gp->getInfo()['hits2'], $this->gp->getInfo()['hitsR2'], $this->gp->getInfo()['erros2']);

		echo "</div>";
	}

	function board()
	{

		if($this->gp->getInfo()['moves'] == 2) header("refresh: 0.3");

		echo "<table cellspacing=\"0px\" cellpadding=\"2px\" class=\"mt-4\" border=\"4px groove\" align=\"center\">";

		$aux = 0;
		for ($l=0; $l<$this->lin; $l++)
		{
			echo "<tr>";
			for ($c=0; $c<$this->col; $c++)
			{
				echo "<td>";
				$nmPeca =  $this->gb->getBoard()[$c+($l*$this->col)];

				if(isset($this->gb->getBoardAux()['piece'.$nmPeca]))
				    echo $this->gb->getBoardAux()['piece'.$nmPeca];
				else
				{
					echo "<a href=\"jogo.php?piece=".$nmPeca."\">";
					echo "<img src='../img/card.png' height='150' width='110'/>";
					echo "</a>";
				}

				echo "</td>";
			}
			echo "</tr>";
		}

		echo "</table>";
	}

	function togglePlayer()
	{
		if($this->gp->getInfo()['player'] == 1)
			$this->gp->setPlayer(2);
		else
			$this->gp->setPlayer(1);
	}

	function game()
	{
		if($this->gp->getInfo()['won'] == 0)
		{
			$nmMoves = $this->gp->getInfo()['moves'];
			if($nmMoves != 2)
			{
				if($this->gp->getInfo()['P1'] != $_GET['piece'])
				{
					$nmMoves++;
					$this->gp->setMoves($nmMoves);

					for($l = 0; $l < $this->lin; $l++)
					{
						for($c = 0; $c < $this->col; $c++)
						{
							$nmPeca = $this->board[$c+($l*$this->col)];
							if($_GET['piece'] == $nmPeca)
								$this->gb->setBoardAux($nmPeca, "<img src='".$this->url."(".explode(".", $_GET['piece'])[1].").jpg' height='150' width='110'/>");
						}
					}

					if($nmMoves == 1) $this->gp->setPiece("P1", $_GET['piece']);
					if($nmMoves == 2) $this->gp->setPiece("P2", $_GET['piece']);
				}
			}
			else
			{
				$P1 = $this->gp->getInfo()['P1'];
				$P2 = $this->gp->getInfo()['P2'];

				if(isset($P1) && isset($P2))
				{
					$pos1 = explode(".", $P1);
					$pos2 = explode(".", $P2);

					if($pos1[1] == $pos2[1])
					{
						if($this->gp->getInfo()['player'] == 1)
						{
							$hits = $this->gp->getInfo()['hits1'];
							$hits++;
							$this->gp->setHits('hits1', $hits);
						}
						else
						{
							$hits = $this->gp->getInfo()['hits2'];
							$hits++;
							$this->gp->setHits('hits2', $hits);
						}
					}
					else
					{
						if($this->gp->getInfo()['player'] == 1)
						{
							$erros = $this->gp->getInfo()['erros1'];
							$erros++;
							$this->gp->setErros('erros1', $erros);
						}
						else
						{
							$erros = $this->gp->getInfo()['erros2'];
							$erros++;
							$this->gp->setErros('erros2', $erros);
						}

						$this->togglePlayer();

						for($l = 0; $l < $this->lin; $l++)
						{
							for($c = 0; $c < $this->col; $c++)
							{
								$nmPeca = $this->board[$c+($l*$this->col)];
								if($this->gp->getInfo()['P1'] == $nmPeca || $this->gp->getInfo()['P2'] == $nmPeca)
									$this->gb->setBoardAux($nmPeca, "<a href=\"jogo.php?piece=".$nmPeca."\"><img src='../img/card.png' height='150' width='110'/></a>");
							}
						}
					}


					$this->gp->setMoves(0);
					$this->gp->setPiece("P1", "");
					$this->gp->setPiece("P2", "");
				}
			}

			$_SESSION['gameBoard'] = serialize($this->gb);
			$_SESSION['gamePlayer'] = serialize($this->gp);
		}
	}
}

?>
