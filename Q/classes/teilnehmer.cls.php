<?php
class teilnehmer extends person {
	private int $tnnr;
	
	function __construct(string $vn, string $nn, int $tag, int $tnnr) {
		parent::__construct($vn,$nn,$tag,"xxx");
		
		$this->tnnr = $tnnr;
	}
	
	public function name_tag_tnnr_get():string {
		$erg = $this->vn . " " . $this->nn . ", " . $this->tag . ", " . $this->tnnr . ", farbe=" . $this->farbe;
		return $erg;
	}
}
?>