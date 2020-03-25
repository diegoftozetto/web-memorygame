<?php

class gameBoard
{

	function gameBoard()
	{
		$this->board = array();
		$this->boardAux = array();
	}

	function setBoard($info)
	{
		array_push($this->board, $info);
	}

	function clearBoard()
	{
		 unset($this->board);
		 unset($this->boardAux);
	}

	function setBoardAll($board)
	{
		$this->board = $board;
	}

	function getBoard()
	{
		return $this->board;
	}

	function setBoardAux($nmPiece, $value)
	{
		$this->boardAux['piece'.$nmPiece] = $value;
	}

	function getBoardAux()
	{
		return $this->boardAux;
	}
}

?>
