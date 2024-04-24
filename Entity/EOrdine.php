<?php
/*
 *classe che modella l'oggetto di tipo Ordine
 */
class EOrdine
{
    //Attributi
    public $ordine_ID;
    //associazione 1 a molti
    public $item = array();
    //associazione 1 a 1
    public $carta_di_credito;
    public $totale;
    public $pagato;
    public $data;
    public $indirizzo_spedizione;
    public $nome;
    public $cognome;

    /* costruttore  */
    public function __construct()
    {
    }
    /* metodo che calcola il totale */

    public function calcolaTot()
    {
        $tot = 0;
        foreach ($this->item as &$value) {
            $tot += ($value->getProdotto()->getPrezzo() * $value->getQuantita());
        }
        $this->totale = $tot;
    }
    public function addItem($prodotto, $quantita)
    {
        $prov = false; # booleano per scoprire se tentiamo di aggiungere unprodotto già presente nell'ordine
        foreach ($this->item as &$value) {
            if ($value->prodotto == $prodotto) {
                $value->quantita = $quantita; # se trova un prodotto già presente aggiorna la quantità
                $prov = true;
            }
        }
        if ($prov == false) # se invece non trova doppioni aggiunge un nuovo Item
            $this->item[] = new EItem($prodotto, $quantita);

    }
    public function confermaOrdine(ECarta_Di_Credito $cartaIN, $indirizzoIN, $totaleIN, $nomeIN, $cognomeIN)
    {
        $this->indirizzo_spedizione = $indirizzoIN;
        $this->data = new DateTime("now", new DateTimeZone('Europe/Rome'));
        $this->nome = $nomeIN;
        $this->cognome = $cognomeIN;
        $this->totale = $totaleIN;
        $this->pagato = 1;
        $this->carta_di_credito = $cartaIN;
    }

    //GETTERS

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data->format('Y-m-d');
    }

    /**
     * @return mixed
     */
    public function getTotale()
    {
        return $this->totale;
    }

    public function getId()
    {
        return $this->ordine_ID;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getCognome()
    {
        return $this->cognome;
    }
    /**
     * @return bool
     */
    public function getPagato()
    {
        return $this->pagato;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo_spedizione;
    }

    /**
     * @return mixed
     */
    public function getCartaDiCredito()
    {
        return $this->carta_di_credito->getNumero();
    }

    //SETTERS
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }
    public function setId($id)
    {
        $this->ordine_ID = $id;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function setTotale($totale)
    {
        $this->totale = $totale;
    }
    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo_spedizione = $indirizzo;
    }
    public function setPagato($pagato)
    {
        $this->pagato = $pagato;
    }
    public function setCarta($carta)
    {
        $this->carta_di_credito = $carta;
    }



    /**
     * per ogni elemento di EItem restituisce un array con in coda il totale.
     *
     * @return array
     */
    public function getArrayItem()
    {
        $tot = 0;
        $i = 0;
        foreach ($this->item as $value) //per ogni item (prodotto e quantita) restituisce un array con (prodotto, quantita e subtotale)
        {
            $arr[$i] = $value->getArray();
            $tot += $arr[$i][2];
            $i++;
        }
        $arr[] = $tot;//mette in coda all'array il totale
        return $arr;
    }
}