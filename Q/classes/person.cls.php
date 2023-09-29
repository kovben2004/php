<?php
class person {
	protected string
		$vn,
		$nn;
	protected int $tag;
	private ?string $farbe;
	
	function __construct(string $vn, string $nn, int $tag, ?string $farbe=null) {
		$this->vn = $vn;
		$this->nn = $nn;
		$this->tag = $tag;
		$this->farbe = $farbe;
	}
	
	public function name_get():string {
		$n = $this->vn . " " . $this->nn;
		return $n;
	}
	
	public function farbe_set(string $farbe):void {
		$this->farbe = $farbe;
	}
	
	public function farbe_get():string {
		return $this->farbe;
	}
}
?>