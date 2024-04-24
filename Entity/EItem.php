<?php

/*classe che modella gli elementi nel carrello 
 *costituita da prodotto e una quantita desiderata
 */
class EItem
{
    //Attributi
    public $Item_ID;
    public $prodotto;
    public $quantita;
    public $ordine_ID;

    //costruttore
    public function __construct($prodotto, $quantita)
    {
        $this->prodotto = $prodotto;
        $this->quantita = $quantita;

    }


    //metodi get
    public function getProdotto()
    {
        return $this->prodotto;
    }
    public function getQuantita()
    {
        return $this->quantita;
    }
    public function getOrdine()
    {
        return $this->ordine_ID;
    }
    public function getId()
    {
        return $this->Item_ID;
    }

    //metodi set

    public function setQuantita($quantita)
    {
        $this->quantita = $quantita;
    }
    public function setProdotto($prodotto)
    {
        $this->prodotto = $prodotto;
    }
    public function setOrdine($ordine_ID)
    {
        $this->ordine_ID = $ordine_ID;
    }
    public function setId($id)
    {
        $this->Item_ID = $id;
    }
    //trasforma in array gli item dell'ordine
    public function getArray(): array
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $prodotto = $pm::load('FProdotto', array(['nomeProdotto', '=', $this->prodotto]));
        $prezzo = $prodotto->getPrezzo();
        $arr = array($this->prodotto, $this->quantita, $prezzo * $this->quantita);

        return $arr;

    }



}