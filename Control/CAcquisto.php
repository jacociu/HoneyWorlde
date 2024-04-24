<?php

/* Classe che delinea i passi per l'acquisto di un prodotto */

class CAcquisto
{
    /**
     * Metodo per la visualizzazione della lista dei prodotti presenti nel database ovvero il catalogo.
     */
    static function esploraProdotti()
    {
        $pm = USingleton::getInstance("FPersistentManager");

        $session = USingleton::getInstance("USession");
        if (CUtente::isLogged()) {
            $utente = unserialize($session->readValue('utente'));
        }
        $view = new VAcquisto();
      $prodotto = $pm::load('FProdotto', array());

        $view->mostraProdotti($prodotto);
    }
    /**
     * Metodo che permette la visualizzazione di un prodotto e di aggiungerlo al carrello con relativa quantità
     */
    static function infoProdotto(int $id)
    {

        $view = new VAcquisto();

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));

        $prodotto = $pm::load('FProdotto', array(['Prodotto_ID', '=', $id]));

        if (isset($prodotto)) {

            $view->mostraInfo($prodotto, $utente);

        } else
            header('Location: /HoneyWorlde');
    }

    /*
     * Aggiunge le quantità di un prodotto al carrello da prodotto.tpl
     */

    public static function Spesa(int $id)
    {
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        $utente = unserialize($session->readValue('utente'));
        $prodotto = $pm::load('FProdotto', array(['Prodotto_ID', '=', $id]));

        if (isset($_SESSION["carrello"]))
            $carrello = unserialize($session->readValue('carrello'));
        else 
            $carrello = new EOrdine();



        if (isset($prodotto)) {
            $quantita = $_POST['quantita'];
            $carrello->addItem($prodotto, $quantita);
            $session->setValue('carrello', serialize($carrello));

        }
        Header('Location:/HoneyWorlde/Acquisto/esploraProdotti');

    }


    public static function Rimuovi($posizione)
    {
        $session = USingleton::getInstance('USession');
        if (isset($_SESSION["carrello"]))
            $carrello = unserialize($session->readValue('carrello'));
        if (count($carrello->item) === 1) {
            $session->destroyValue('carrello');
        } else {

            unset($carrello->item[$posizione]);
            $session->setValue('carrello', serialize($carrello));
        }
        Header('Location:/HoneyWorlde/Acquisto/carrello');

    }

    public static function checkout($totale)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $carrello= unserialize($session->readValue('carrello'));


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           

            $carta = new ECarta_Di_Credito($_POST["Titolare"], $_POST["Carta"], $_POST["codice"], $_POST["Mese"], $_POST["Anno"]);
            $carrello->confermaOrdine($carta, $_POST["Indirizzo"], $totale,$_POST["Nome"],$_POST["Cognome"]);
            $pm::insert($carrello);
            $ordineId=$carrello->getId();
        foreach ($carrello->item as &$value){
            $value->ordine_ID=$ordineId;
            $pm::insert($value);
        }

            $session->destroyValue('carrello'); // cancello la variabile che contiene il carrello
            header('Location:/HoneyWorlde');


        }


    }
    public static function Pagamento($totale)
    {
        $view = new VAcquisto();
        $view->Pagamento($totale);

    }

    static function Carrello()
    {
        $session = USingleton::getInstance("USession");
        if (isset($_SESSION["carrello"])) {
            $carrello = unserialize($session->readValue('carrello'));
            $carrello_esiste = 1;
        } else {
            $carrello = new EOrdine();
            $carrello_esiste = 0;

        }
        $vacquisto = new VAcquisto();
        $carr = $carrello->getArrayItem();
        $vacquisto->Carrello($carr, sizeof($carr), $carrello_esiste);
    }


}