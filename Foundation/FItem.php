<?php
class FItem extends FDatabase{
    private static $table = 'item';
    private static $class = 'FItem';
    private static $values = "(:Item_ID, :Prodotto, :quantita, :Ordine_ID)";

   
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
    //metodo che permette l'inserimento di un nuovo elemento nel db
    //da modificare in base agli attributi  
    public static function bind($stmt, EItem $item){
        $stmt->bindValue(':Item_ID',null,PDO::PARAM_INT);
        $stmt->bindValue(':Prodotto',$item->getProdotto(), PDO::PARAM_STR);  
        $stmt->bindValue(':quantita',$item->getQuantita(), PDO::PARAM_INT);
        $stmt->bindValue(':Ordine_ID',$item->getOrdine(), PDO::PARAM_INT);

    }
    //store di un elemento 
    public static function insert($elemento) {
        $db = parent::getInstance();
        $id = $db->insertDB(self::class,$elemento );
        $elemento ->setId($id);
    }
    //verifica l'esistenza di un elemento  sul db
    public static function exist($field, $id) {
        $ris = false;
        $db = parent::getInstance();
        $result = $db->existDB(self::$class,$field, $id);
        if($result!=null)
            $ris = true;
        return $ris;
    }
     //elimina una determinata elemento  nel db in base all'ID
     public static function delete($field, $id) {
        $db = parent::getInstance();
        $result = $db->deleteDB(self::$class,$field, $id);
        if($result)
            return true;
        else
            return false;
    }
    //update di una determinata elemento  nel db, permette di aggiornare alcuni campi di una elemento  
    public static function update($field, $newvalue, $primkey, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $primkey, $val);
        if ($result) return true;
        else return false;
    }

}