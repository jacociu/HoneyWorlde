<?php
class FCarta_Di_Credito extends FDatabase {
    private static $table = 'carta_di_credito';
    private static $class = 'FCarta_di_credito';
    private static $values = "(:Id,:Proprietario,:Numero,:Scadenza,:CVV)";

   
    public static function getClass(): string
    {
        return self::$class;
    }

  
    public static function getTable(): string
    {
        return self::$table;
    }

    public static function getValues(): string
    {
        return self::$values;
    }
    //metodo che permette l'inserimento di una nuova carta di credito nel db
    //da modificare in base agli attributi della carta di credito
    public static function bind($stmt, ECArta_Di_CRedito $carta_Di_Credito){
        $stmt->bindValue(':Id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':Proprietario',$carta_Di_Credito->getProprietario(), PDO::PARAM_STR);  
        $stmt->bindValue(':Numero',$carta_Di_Credito->getNumero(), PDO::PARAM_INT);
        $stmt->bindValue(':Scadenza',$carta_Di_Credito->getScadenza(), PDO::PARAM_INT);
        $stmt->bindValue(':CCV',$carta_Di_Credito->getCCV(), PDO::PARAM_INT);
    }
    //store di una carta
    public static function insert($carta) {
        $db = parent::getInstance();
        $id = $db->insertDB(self::class,$carta);
        $carta->setId($id);
    }
    //verifica l'esistenza di una carta sul db
    public static function exist($field, $id) {
        $ris = false;
        $db = parent::getInstance();
        $result = $db->existDB(self::$class,$field, $id);
        if($result!=null)
            $ris = true;
        return $ris;
    }
     //elimina una determinata carta nel db in base all'ID
     public static function delete($field, $id) {
        $db = parent::getInstance();
        $result = $db->deleteDB(self::$class,$field, $id);
        if($result)
            return true;
        else
            return false;
    }
    //update di una determinata carta nel db, permette di aggiornare alcuni campi di una carta 
    public static function update($field, $newvalue, $primkey, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $primkey, $val);
        if ($result) return true;
        else return false;
    }
}