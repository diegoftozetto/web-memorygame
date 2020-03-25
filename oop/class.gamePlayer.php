<?php

class gamePlayer
{
	var $info;

	function gamePlayer()
	{
		$this->info = array();
		$this->info['won'] = 0;
		$this->info['newGame'] = 0;
		$this->info['player'] = 1;
		$this->info['moves'] = 0;
		$this->info['hits1'] = 0;
		$this->info['hits2'] = 0;
		$this->info['hitsR1'] = 0;
		$this->info['hitsR2'] = 0;
		$this->info['erros1'] = 0;
		$this->info['erros2'] = 0;
		$this->info['P1'] = "";
		$this->info['P2'] = "";
	}

	function setWon($won)
	{
		$this->info['won'] = $won;
	}

	function setNewGame($status)
	{
		$this->info['newGame'] = $status;
	}

	function setPlayer($player)
	{
		$this->info['player'] = $player;
	}

	function setMoves($moves)
	{
		$this->info['moves'] = $moves;
	}

	function setPiece($key, $value)
	{
		$this->info[$key] = $value;
	}

	function setHits($key, $value)
	{
		$this->info[$key] = $value;
	}

	function setErros($key, $value)
	{
		$this->info[$key] = $value;
	}

	function setHitsRound($key, $value)
	{
		$this->info[$key] = $value;
	}

	function getInfo()
	{
		return $this->info;
	}
}
?>
