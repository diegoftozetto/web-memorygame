<?php

class datagame 
{
	var $namePlayer1;
	var $avatarPlayer1;
	var $namePlayer2;	
	var $avatarPlayer2;
	var $level;
	var $category;

	function datagame($namePlayer1, $avatarPlayer1, $namePlayer2, $avatarPlayer2, $level, $category)
	{
		$this->namePlayer1 = $namePlayer1;
		$this->avatarPlayer1 = $avatarPlayer1;
		$this->namePlayer2 = $namePlayer2; 
		$this->avatarPlayer2 = $avatarPlayer2;
		$this->level = $level;
		$this->category = $category; 
	}

	function getNamePlayer1()
	{
		return $this->namePlayer1;
	}

	function getAvatarPlayer1()
	{
		return $this->avatarPlayer1;
	}

	function getNamePlayer2()
	{
		return $this->namePlayer2;
	}

	function getAvatarPlayer2()
	{
		return $this->avatarPlayer2;
	}

	function getLevel()
	{
		return $this->level;
	}

	function getCategory()
	{
		return $this->category;
	}
}

?>