<?php
//classe prodotto base dell'e-commerce
Class EProdotto implements JsonSerializable
{

    //Attributi
    public $Prodotto_ID;
    public $nomeProdotto;
    public $prezzo;

    //costruttore
    public function __construct($id, $nomeProdotto=null,$prezzo=null){
        $this->Prodotto_ID = $id;
        $this->nomeProdotto = $nomeProdotto;
        $this->prezzo = $prezzo;
    }

    //metodi get
    public function getNomeProdotto(){
        return $this->nomeProdotto;
    }
    public function getPrezzo(){
        return $this->prezzo;
    }
    public function getId(){
        return $this->Prodotto_ID;
    }

    //metodi set
    public function setNomeProdotto($nomeProdotto){
        $this->nomeProdotto = $nomeProdotto;
    }
    public function setPrezzo($prezzo){
        $this->prezzo = $prezzo;
    }
    public function setId($id){
        $this->Prodotto_ID = $id;
    }
    public function __toString(){
        return $this->getNomeProdotto();
    }


    public function jsonSerialize()
    {
        return [
            'nome_Prodotto' => $this->nomeProdotto,
            'prezzo' => $this->prezzo
        ];
    }
   
}
