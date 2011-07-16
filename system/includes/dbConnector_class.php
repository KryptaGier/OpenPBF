<?php
/**
 * Klasa tworzaca połączenie z bazą danych
 * Data: 16.07.2011
 *
 * @author Marcin
 */
class PDOConnector
{  
    public $db;
    
    public function __construct()
    {
    	include (BASE_DIR.'config.php');
    	$this -> db_prefix = $PREF;
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db.'', $user, $password, array(
            PDO::ATTR_PERSISTENT => true));
        $pdo -> exec('SET NAMES utf8');
        $this -> db = $pdo;
    }
}
?>
