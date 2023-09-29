<?php
class beispielklasse {
	private string $farbe; //Klassenvariable; private: nur innerhalb der Klasse, aber nicht für die Instanzen verfügbar
	private ?int $lz;
	
	function __construct(string $name_in, string $farbe_in, ?int $lz_in=null) {
		//Konstruktorfunktion wird immer dann aufgerufen, wenn eine neue Instanz dieser Klasse mittels "new beispielklasse()" erzeugt wird
		echo('Ich wurde instanziert: der Name lautet ' . $name_in . ', die Farbe ist ' . $farbe_in . ', die Lieblingszahl ist ' . $lz_in . '<br>');
		
		$this->farbe = $farbe_in;
		$this->lz = $lz_in;
	}
	
	public function zeigeLZ():int {
		//Getter-Funktion: get = ermitteln
		//echo('Die Lieblingszahl war ' . $this->lz . '<br>');
		return $this->lz;
	}
	
	public function setzeLZ(?int $lz_in):void {
		//Setter-Funktion: set = setzen
		$this->lz = $lz_in;
	}
}
?>