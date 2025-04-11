<?php
declare(strict_types=1);

namespace App\AocTasks\HelperClasses;

class Grid
{

	public $grid = [];

	public $width = 0;
	public $height = 0;

	public $pos_x = null;
	public $pos_y = null;

	public function setGrid($grid_array) {
		$this->grid = $grid_array;
		$this->height = count($grid_array);
		$this->width = count($grid_array[0]);
		return;
	}

	public function getGrid() {
		return $this->grid;
	}

	public function setCurCell($value) {
		$this->grid[$this->pos_y][$this->pos_x] = $value;
		return;
	}

	public function setCell($x, $y, $value) {
		$this->grid[$y][$x] = $value;
		return;
	}

	public function getCurCell() {
		return $this->getCell($this->pos_x, $this->pos_y);
	}

	public function getCell($x, $y) {
		if (($x < 0) || ($x >= $this->width)) {
			// out of bounds
			return null;
		}
		if (($y < 0) || ($y >= $this->height)) {
			// out of bounds
			return null;
		}
		return [
			'x' => $x,
			'y' => $y,
			'value' => $this->grid[$y][$x],
		];
	}

	public function setPos($x, $y) {
		$this->pos_x = $x;
		$this->pos_y = $y;
	}

	public function getPos() {
		return [
			'x' => $this->pos_x,
			'y' => $this->pos_y,
		];
	}

	public function findCells($value) {
		$positions = [];
		for ($y = 0; $y < $this->height; $y++) {
			for ($x = 0; $x < $this->width; $x++) {
				if ($this->grid[$y][$x] == $value) {
					$positions[] = $this->getCell($x, $y);
				}
			}
		}
		return $positions;
	}

	public function up() {
		$x = $this->pos_x;
		$y = $this->pos_y-1;
		return $this->getCell($x, $y);
	}

	public function down() {
		$x = $this->pos_x;
		$y = $this->pos_y+1;
		return $this->getCell($x, $y);
	}

	public function left() {
		$x = $this->pos_x-1;
		$y = $this->pos_y;
		return $this->getCell($x, $y);
	}

	public function right() {
		$x = $this->pos_x+1;
		$y = $this->pos_y;
		return $this->getCell($x, $y);
	}

	public function moveUp() {
		$this->pos_y--;
		return;
	}

	public function moveDown() {
		$this->pos_y++;
		return;
	}

	public function moveLeft() {
		$this->pos_x--;
		return;
	}

	public function moveRight() {
		$this->pos_x++;
		return;
	}

	public function upLeft() {
		$x = $this->pos_x-1;
		$y = $this->pos_y-1;
		return $this->getCell($x, $y);
	}

	public function upRight() {
		$x = $this->pos_x+1;
		$y = $this->pos_y-1;
		return $this->getCell($x, $y);
	}

	public function downLeft() {
		$x = $this->pos_x-1;
		$y = $this->pos_y+1;
		return $this->getCell($x, $y);
	}

	public function downRight() {
		$x = $this->pos_x+1;
		$y = $this->pos_y+1;
		return $this->getCell($x, $y);
	}

	public function getAdjacentCells($include_diagonals = false) {
		$tmp = [];
		$tmp[] = $this->up();
		$tmp[] = $this->down();
		$tmp[] = $this->left();
		$tmp[] = $this->right();
		if ($include_diagonals) {
			$tmp[] = $this->upLeft();
			$tmp[] = $this->upRight();
			$tmp[] = $this->downLeft();
			$tmp[] = $this->downRight();
		}

		$cells = [];
		foreach ($tmp as $cell) {
			if ($cell !== null) {
				$cells[] = $cell;
			}
		}

		return $cells;
	}

	public function findInAdjacentCells($value, $include_diagonals = false) {
		$cells = $this->getAdjacentCells($include_diagonals);
		foreach ($cells as $i => $cell) {
			if ($cell['value'] != $value) {
				unset($cells[$i]);
			}
		}
		return $cells;
	}

	public function findInAdjacentCellsRegex($regex_pattern, $include_diagonals = false) {
		$cells = $this->getAdjacentCells($include_diagonals);
		foreach ($cells as $i => $cell) {
			if (!preg_match($regex_pattern, $cell['value'])) {
				unset($cells[$i]);
			}
		}
		return $cells;
	}

}
