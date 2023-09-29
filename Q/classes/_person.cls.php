<?php
class person {
	private string
		$vn,
		$nn;
	private int $tag;
	private ?string $farbe;
	
	function __construct(string $vn, string $nn, int $tag, ?string $farbe=null) {
		$this->vn = $vn;
		$this->nn = $nn;
		$this->tag = $tag;
		$this->farbe = $farbe;
	}
	
	public function farbe_get():string {
		return $this->farbe;
	}
	
	public function farbe_set(string $farbe):void {
		$this->farbe = $farbe;
	}
	
	public function name_get():string {
		return $this->vn." ".$this->nn;
	}
}
?>