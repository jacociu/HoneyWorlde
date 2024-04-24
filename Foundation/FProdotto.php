<?php

class FProdotto extends FDatabase{
    private static $table = 'prodotto';
    private static $class = 'FProdotto';
    //da modificare in  base ai campi del prodotto
    private static $values = '(:Prodotto_ID, :nomeProdotto, :Prezzo)';

    public static function getTable(): string
    {
        return self::$table;
    }

    public static function getClass(): string
    {
        return self::$class;
    }

    public static function getValues(): string
    {
        return self::$values;
    }

    public static function bind($stmt, EProdotto $Prodotto)
    {
        $stmt->bindValue(':Prodotto_ID',null,PDO::PARAM_INT);
        $stmt->bindValue(':nomeProdotto', $Prodotto->getNomeProdotto(), PDO::PARAM_STR);
        $stmt->bindValue(':Prezzo', $Prodotto->getPrezzo(), PDO::PARAM_INT);
        
        
    }
    //salva prodotto nel db
    public static function insert($object){
        $db = parent::getInstance();
        $id = $db->insertDB(self::$class, $object);
        $object->setId($id);
    }
    // Metodo che carica un prodotto dal DB sulla base di un dato attributo

    public static function loadByField($parametri = array(), $ordinamento = '', $limite = ''){
        $prodotto = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(), $parametri, $ordinamento, $limite);
        if (sizeof($parametri) > 0) {
            $rows_number = $db->getRowNum(static::getClass(), $parametri);

        } else {
            $rows_number = $db->getRowNum(static::getClass());
        }
        if(($result != null) && ($rows_number == 1)) {
            $prodotto = new EProdotto($result['Prodotto_ID'], $result['nomeProdotto'], $result['Prezzo']);  
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $prodotto = array();
                for($i = 0; $i < count($result); $i++){
                    $prodotto[] = new EProdotto($result[$i]['Prodotto_ID'], $result[$i]['nomeProdotto'],$result[$i]['Prezzo']);
                }
            }
        }
        return $prodotto;
    }

//update di un prodotto nel db
    public static function update($field, $newvalue, $pk, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $pk, $val);
        if ($result) return true;
        else return false;
    }
    //elimina prodotto dal db in base all'idprodotto
    public static function delete($field, $id){
        $db = parent::getInstance();
        $result = $db->deleteDB(self::getClass(), $field, $id);;
        if ($result) return true;
        else return false;
    }
    //verifica l'esistenza di un determinato prodotto
    public static function exist($field, $id){
        $db = parent::getInstance();
        $result = $db->existDB(self::getClass(), $field, $id);
        if ($result != null) return true;
        else return false;
    }
    //cerca un determinato prodotto nel db
    public static function search($parametri=array(), $ordinamento='', $limite=''){
        $db = parent::getInstance();
        $result = $db->searchDB(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }
 // Metodo che restituisce il numero di tuple risultanti di una query
    public static function getRows($parametri = array(), $ordinamento = '', $limite = ''){
        $db = parent::getInstance();
        $result = $db->getRowNum(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }

// Metodo che carica tutti i valori di un determinato attributo della tabella prodotto

    public static function loadDefCol($columns=array(), $ordinamento = '', $limite = '') {
        $db = parent::getInstance();
        $result = $db->loadDefColDB(self::$class, $columns, $ordinamento, $limite);
        return $result;
    }
    /** Metodo che produpera dal db tutte le istanze che contengono il parametro passato in input
     */
    public static function loadByParola($parola){
        $prodotto = null;
        $db = parent::getInstance();
        $result=$db->ricercaProdotto($parola, static::getClass(), "nomeProdotto");
        $rows_number = $db->prodRows($parola, static::getClass(), "nomeProdotto");
        if(($result!=null) && ($rows_number== 1)) {
            $prodotto = new EProdotto( $result ['Prodotto_ID'], $result['NomeProdotto'],$result['prezzo']);
        }
        else {
            if(($result!=null) && ($rows_number > 1)){
                $prodotto = array();
                for($i=0; $i<count($result); $i++){
                    $prodotto[] = new EProdotto( $result[$i]['Prodotto_ID'], $result[$i]['nomeProdotto'],$result[$i]['Prezzo']);
            }
        }    
    }
    return $prodotto;
}

}

