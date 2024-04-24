<?php
class FOrdine extends FDatabase
{
    private static $table = 'ordine';
    private static $class = 'FOrdine';
    private static $values = '(:Ordine_ID, :Totale, :Pagato, :Data, :Indirizzo, :Nome, :Cognome)';

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

    public static function bind($stmt, Eordine $ordine)
    {
        $stmt->bindValue(':Ordine_ID', null, PDO::PARAM_INT);
        $stmt->bindValue(':Totale', $ordine->getTotale(), PDO::PARAM_INT);
        $stmt->bindValue(':Pagato', $ordine->getPagato(), PDO::PARAM_INT);
        $stmt->bindValue(':Data', $ordine->getData(), PDO::PARAM_STR);
        $stmt->bindValue(':Indirizzo', $ordine->getIndirizzo(), PDO::PARAM_STR);
        $stmt->bindValue(':Nome', $ordine->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':Cognome', $ordine->getCognome(), PDO::PARAM_STR);

    }
    public static function insert($object)
    {
        $db = parent::getInstance();
        $id = $db->insertDB(self::$class, $object);
        $object->setId($id);
    }
    public static function update($field, $newvalue, $pk, $val)
    {
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $pk, $val);
        if ($result)
            return true;
        else
            return false;
    }
    //elimina ordine dal db in base all'idordine
    public static function delete($field, $id)
    {
        $db = parent::getInstance();
        $result = $db->deleteDB(self::getClass(), $field, $id);
        ;
        if ($result)
            return true;
        else
            return false;
    }
    //verifica l'esistenza di un determinato ordine
    public static function exist($field, $id)
    {
        $db = parent::getInstance();
        $result = $db->existDB(self::getClass(), $field, $id);
        if ($result != null)
            return true;
        else
            return false;
    }
    //cerca un determinato ordine nel db
    public static function search($parametri = array(), $ordinamento = '', $limite = '')
    {
        $db = parent::getInstance();
        $result = $db->searchDB(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }
    // Metodo che restituisce il numero di tuple risultanti di una query
    public static function getRows($parametri = array(), $ordinamento = '', $limite = '')
    {
        $db = parent::getInstance();
        $result = $db->getRowNum(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }

    // Metodo che carica tutti i valori di un determinato attributo della tabella ordine

    public static function loadDefCol($columns = array(), $ordinamento = '', $limite = '')
    {
        $db = parent::getInstance();
        $result = $db->loadDefColDB(self::$class, $columns, $ordinamento, $limite);
        return $result;
    }
    // Metodo che carica un ordine dal DB sulla base di un dato attributo

    public static function loadByField($parametri = array(), $ordinamento = '', $limite = '')
    {
        $ordine = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(), $parametri, $ordinamento, $limite);
        if (sizeof($parametri) > 0) {
            $rows_number = $db->getRowNum(static::getClass(), $parametri);

        } else {
            $rows_number = $db->getRowNum(static::getClass());
        }
        if (($result != null) && ($rows_number == 1)) {
            $ordine = new EOrdine();
        } else {
            if (($result != null) && ($rows_number > 1)) {
                $ordine = array();
                for ($i = 0; $i < count($result); $i++) {
                    $ordine[] = new EOrdine();
                }
            }
        }
        return $ordine;
    }
}