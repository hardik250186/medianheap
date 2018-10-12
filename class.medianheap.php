<?php
class MedianHeap{
	private $lowerHeap;
	private $higherHeap;
	
	private $numbers = [];
	
	public function __construct($numbers = null)
	{
		$this->lowerHeap = new SplMaxHeap();
		$this->higherHeap = new SplMinHeap();
	
		if (count($numbers)) {
			$this->insertArray($numbers);   
		}
	}
	public function insertArray ($numbers) {
		foreach($numbers as $number) {
			$this->insert($number);
		}
	}
	public function insert($number)
	{
		$this->numbers[] = $number;
		if ($this->lowerHeap->count() == 0 || $number < $this->lowerHeap->top()) {
			$this->lowerHeap->insert($number);
		} else {
			$this->higherHeap->insert($number);
		}
		$this->balance();
	}
	protected function balance()
	{
		$biggerHeap = $this->lowerHeap->count() > $this->higherHeap->count() ? $this->lowerHeap : $this->higherHeap;
		$smallerHeap = $this->lowerHeap->count() > $this->higherHeap->count() ? $this->higherHeap : $this->lowerHeap;
	
		if ($biggerHeap->count() - $smallerHeap->count() >= 2) {
			$smallerHeap->insert($biggerHeap->extract());
		}
	}
	public function getMedian()
	{
		if (!count($this->numbers)) {
			return null;
		}
		$biggerHeap = $this->lowerHeap->count() > $this->higherHeap->count() ? $this->lowerHeap : $this->higherHeap;
		$smallerHeap = $this->lowerHeap->count() > $this->higherHeap->count() ? $this->higherHeap : $this->lowerHeap;
	
		if ($biggerHeap->count() == $smallerHeap->count()) {
			return ($biggerHeap->top() + $smallerHeap->top())/2;
		} else {
			return $biggerHeap->top();
		}
	}
}
?>