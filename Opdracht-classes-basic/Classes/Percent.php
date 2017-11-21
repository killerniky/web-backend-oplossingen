<?php
	class Percent{
		public $relative;
		public $hundred;
		public $nominal;
		
		public function __construct($new,$unit){
			$this->relative=($new/$unit);
			$this->hundred=$this->relative * 100;			
			if($this->relative>1){
				$this->nominal='postive';
			}
			else if($this->relative==1){
				$this->nominal='status-quo';
			}
			else if($this->relative<1){
				$this->nominal='negative';
			}
			$this->formatNumber($this->relative);
			$this->formatNumber($this->hundred);
		}
		public function formatNumber($number){
			return floatval(number_format($number, 2, '.', ' '));
		}
	}

?>