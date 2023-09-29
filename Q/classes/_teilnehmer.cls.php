<?php
class teilnehmer extends person {
	private
		int $tnnr;
	
	function __construct(string $vn, string $nn, int $tag, int $tnnr) {
		parent::__construct($vn,$nn,$tag);
		$this->tnnr = $tnnr;
	}
	
	public function tnnr_get():int {
		return $this->tnnr;
	}
	
	public function name_tag_get():string {
		return $this->vn." ".$this->nn.", ".$this->tag;
	}
}
?>