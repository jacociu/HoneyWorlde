<?php 


 // Classe che modella la Carta di Credito

Class ECarta_Di_Credito 
{

 /* Attributi */
 private $id;

 private $proprietario; # stringa che contiene nome e cognome del proprietario
 private $numero; # numero della carta
 private $codice_sicurezza ; # codice di sicurezza di 3 cifre
 private $data_scadenza ; # data di scadenza della carta

 /* Costruttore */

 public function __construct(string $proprietarioIN, string $numeroIN, string $codIN, $meseIN, $annoIN ) # input 5 e input 6 sono due interi (mese ed anno)
 {
	$this->proprietario = $proprietarioIN;
	$this->numero = $numeroIN; # numero compreso tra 13 e 16 cifre. Controllabile con html
	if (strlen($codIN) == 3)
		$this->codice_sicurezza = $codIN;
	else die("Codice non valido");
	$prov = new DateTime("$annoIN-$meseIN-1");
	if ($this->verificaData($prov))
		$this->data_scadenza = $prov;
	else die ("Data Non Valida");
 		

 }


 /* Funzione che verifica che la data di scadenza sia valida.  */
 public function verificaData(DateTime $dateIN) 
 {
	$scadenza = new DateTime("now", new DateTimeZone('Europe/Rome')); # data attuale
	if ($dateIN->diff($scadenza,false)->invert) # uguale ad 1 se la data è successiva a quella attuale, altrimenti 0
	{
		return true;
	}
	else return false;	
 }

 /* Getters ( I Setters non ci sono in quanto la Carta viene inserita solo al momento dell'acquisto) */

 public function getProprietario() : String
 {
	 return $this->proprietario;
 } 

 // restituisce il numero di carta con le ultime  cifre sostituite da 'x'
 public function getNumero(): String
 {
	 return substr_replace($this->numero, "xxxxxxxx", strlen($this->numero) - 12, 12 );
 }

 public function getScadenza() : String
 {
	 return $this->data_scadenza->format("m/Y");
 }
 public function getCCV(){
	return $this ->codice_sicurezza;
 }
public function setId($id){
	$this->id = $id;
}
}