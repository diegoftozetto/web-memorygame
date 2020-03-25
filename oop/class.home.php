<?php

class home
{

   function home(){ /*Construtor...*/ }

   function verifyForm($data)
   {
   		if(!empty($data['inPlayer1']) && !empty($data['inAvatarPlayer1']) && !empty($data['inPlayer2']) && !empty($data['inAvatarPlayer2']) && !empty($data['inLevel']) && !empty($data['inCategory']))
   		{

   			$dg = new datagame($data['inPlayer1'], $data['inAvatarPlayer1'], $data['inPlayer2'], $data['inAvatarPlayer2'], $data['inLevel'], $data['inCategory']);
   			$_SESSION['datagame'] = serialize($dg);

	   		header("Location: php/jogo.php");
   		}
   }

   function newForm($data)
   {

   		if(!empty($data))
   			$this->verifyForm($data);

		echo "<div class=\"container\">";
		echo "<img class=\"mt-5\" src=\"img/memoryLogo.png\"/>";
		echo "<h5><span class=\"mt-5 badge badge-warning\">Jogadores:</span></h5>";
		echo "<div class=\"mt-3 form-group\">";
		echo "<label for=\"inPlayer1\"><b>Nome do Jogador 1 e Avatar</b></label>";
		echo "<input type=\"text\" class=\"form-control\" name=\"inPlayer1\" id=\"inPlayer1\"  placeholder=\"Informe o nome do Jogador 1\">";
		echo "<div data-toggle=\"buttons\" class=\"mt-2\">";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Man\" name=\"inAvatarPlayer1\" autocomplete=\"off\"> <img src=\"img/avatarMan.png\" width=\"60\" height=\"60\"/></label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Female\" name=\"inAvatarPlayer1\" autocomplete=\"off\"> <img src=\"img/avatarFemale.png\" width=\"60\" height=\"60\"/></label>";
    echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Lgbt\" name=\"inAvatarPlayer1\" autocomplete=\"off\"> <img src=\"img/avatarLgbt.png\" width=\"60\" height=\"60\"/></label>";
		echo "</div>";
		echo "</div>";
		echo "<div class=\"mt-3 form-group\">";
		echo "<label for=\"inPlayer2\"><b>Nome do Jogador 2 e Avatar</b></label>";
		echo "<input type=\"text\" class=\"form-control\" name=\"inPlayer2\"  id=\"inPlayer2\" placeholder=\"Informe o nome do Jogador 2\">";
		echo "<div data-toggle=\"buttons\" class=\"mt-2\">";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Man\" name=\"inAvatarPlayer2\" autocomplete=\"off\"> <img src=\"img/avatarMan.png\" width=\"60\" height=\"60\"/></label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Female\" name=\"inAvatarPlayer2\" autocomplete=\"off\"> <img src=\"img/avatarFemale.png\" width=\"60\" height=\"60\"/></label>";
    echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Lgbt\" name=\"inAvatarPlayer2\" autocomplete=\"off\"> <img src=\"img/avatarLgbt.png\" width=\"60\" height=\"60\"/></label>";
		echo "</div>";
		echo "</div>";
		echo "<h5><span class=\"mt-3 badge badge-primary\">Modo de Jogo:</span></h5>";
		echo "<label class=\"mt-2\"><b>Nível</b></label>";
		echo "<br>";
		echo "<div data-toggle=\"buttons\">";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Fácil\" name=\"inLevel\" autocomplete=\"off\"> Fácil </label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Médio\" name=\"inLevel\" autocomplete=\"off\"> Médio </label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Dificil\" name=\"inLevel\" autocomplete=\"off\"> Difícil </label>";
		echo "</div>";
		echo "<br>";
		echo "<label class=\"mt-1\"><b>Categoria</b></label>";
		echo "<br>";
		echo "<div data-toggle=\"buttons\">";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Filmes\" name=\"inCategory\" autocomplete=\"off\"> Filmes </label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Séries\" name=\"inCategory\" autocomplete=\"off\"> Séries </label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Jogos Eletrônicos\" name=\"inCategory\" autocomplete=\"off\"> Jogos Eletrônicos </label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Músicas\" name=\"inCategory\" autocomplete=\"off\"> Músicas </label>";
		echo "<label class=\"btn btn-outline-secondary form-check-label\"> <input class=\"form-check-input\" type=\"radio\" value=\"Desenhos Animados\" name=\"inCategory\" autocomplete=\"off\"> Desenhos Animados </label>";
		echo "</div>";
		echo "<br>";
		echo "<input type=\"submit\" value=\"Começar Jogo\" class=\"btn btn-info border border-secondary mt-4\">";
		echo "</div>";
   }
}

?>
