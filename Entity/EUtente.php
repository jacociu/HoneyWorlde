<?php

/******************************************************
 * Classe che modella l'Utente Utente (registrato) 
 *****************************************************/

require_once "EUtente.php";


class EUtente implements JsonSerializable
{

	/* Attributi */
	private $Utente_ID;
	private $nome ;
	private $cognome ;
	private $email ;
	private $Password;
	private $ordini = array() ;  # array di oggetti di tipo Ordine, ovvero tutti gli ordini completati
	private $carrello ; # rappresenta l'ordine in corso, non ancora completato
	private $Admin;


	/* Costruttore */
    /**
     * EUtente constructor.
     * @param $cognomeIN
     * @param $passowrdIN
     * @param $emailIN
     * @param $nomeIN
     */
    public function __construct($Nome=null, $Cognome=null, $Password=null, $Email=null,$Admin=null)
	{
        $this->nome=$Nome;
        $this->nognome=$Cognome;
        $this->Password=$Password;
        $this->email=$Email;
	    $this->Admin=$Admin;
     }

	/* Metodo per creare un ordine */
	public function creaOrdine() 
	{
		$this->carrello= new EOrdine();
	}

	/* Metodo di conferma dell'ordine */
	public function confermaOrdine(ECarta_Di_Credito $cartaIN)
	{
		$this->carrello->data = new DateTime("now", new DateTimeZone('Europe/Rome'));
		$this->carrello->pagato = true;
		$this->carrello->carta_di_credito = $cartaIN;
		$this->ordini[] = $this->carrello;
		$this->carrello->calcolaTot();
		$this->creaOrdine();
	}

	public function aggiungiOrdine ( EOrdine $ordineIN)
	{
		$this->ordini[] = $ordineIN;
	}
	public function creaProdotto($nomeIN,  $prezzoIN)
    {
        $prodotto = new EProdotto($nomeIN, $prezzoIN);
		return $prodotto;
        
	}


	//Setters
	public function setNome(  $nomeIN ):void
	{
		$this->nome = $nomeIN;
	}

	public function setCognome( $cognomeIN )
	{
		$this->cognome = $cognomeIN;
	}


	public function setEmail( $emailIN ):void
	{
		$this->email = $emailIN;
	}
	public function setId($id):void
	{
		$this->Utente_ID = $id;
	}

	public function setPassword($PasswordIN):void 
	{
		$this->Password = $PasswordIN;
	}


	//Getters
	public function getNome()
	{
		return $this->nome;
	}

	public function getCognome()
	{
		return $this->cognome;
	}

	public function getEmail()
	{
		return $this->email;
	}


	public function getOrdini()
	{
		return $this->ordini;
	}

	public function getPassword()
    {
        return $this->Password;
    }
	public function getId(){
		return $this->Utente_ID;
	}
	/**
	 * @return mixed 
	 */
	public function getAdmin() {
		return $this->Admin;
	}
	
	/**
	 * @param mixed $Admin 
	 * @return self
	 */
	public function setAdmin( $Admin): void {
		$this->Admin = $Admin;
	}
	public function jsonSerialize()
    {
        return
            [
                'Nome'   => $this->getNome(),
                'Cognome' => $this->getCognome(),
                'Utente_ID'   => $this->getId(),
                'Password'   => $this->getPassword(),
                'Email'   => $this->getEmail()
            ];

    }

}









