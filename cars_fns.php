<?php
namespace TecholutionTask;

define('DB_DSN',  'mysql:host=127.0.0.1;dbname=techolution');
define('DB_USER', 'techolution');
define('DB_PASS', 'techolution');

class QuickDB {
   
    private static $objInstance;
   
    /*
     * Class Constructor - Create a new database connection if one doesn't exist
     * Set to private so no-one can create a new instance via ' = new QuickDB();'
     */
    private function __construct() {}
   
    /*
     * Like the constructor, we make __clone private so nobody can clone the instance
     */
    private function __clone() {}
   
    /*
     * Returns DB instance or create initial connection
     * @param
     * @return $objInstance;
     */
    public static function getInstance(  ) {
           
        if(!self::$objInstance){
            self::$objInstance = new \PDO(DB_DSN, DB_USER, DB_PASS);
            self::$objInstance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
       
        return self::$objInstance;
   
    } # end method 
    /*
     * Passes on any static calls to this class onto the singleton PDO instance
     * @param $chrMethod, $arrArguments
     * @return $mix
     */
    final public static function __callStatic( $chrMethod, $arrArguments ) {
           
        $objInstance = self::getInstance();
       
        return call_user_func_array(array($objInstance, $chrMethod), $arrArguments);
       
    } 
}

class Car {

    public function __construct() {

    }
    /**
     * @param array
     */
    public static function findByCriteria(array $criteria = NULL) {
        $where = ' WHERE make = :make';
        $sql = 'SELECT * FROM cars';
        if (!empty($criteria)) {
            $sql .= $where;
        }
        $pdo = \TecholutionTask\QuickDB::getInstance();
        $stmt = $pdo->prepare($sql);
        if (!empty($criteria)) {
            $stmt->bindValue(':make', $criteria['make'], \PDO::PARAM_STR); 
        }
        $stmt->execute();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $cars[] = $row;
        }
        return $cars;
    }

    /**
     * @param array
     */
    public static function findUniqueMakes($allCars) {
        $uniqueMakes = array();
        foreach($allCars as $car) {
            $uniqueMakes[$car['make']] = $car['make'];
        }
        return $uniqueMakes;
    }
}

/**
 * Replace template placeholders with dynamic values
 */
function preprocess_view() {
  $pdo = \TecholutionTask\QuickDB::getInstance();
  $allCars = \TecholutionTask\Car::findByCriteria();

  $makes = '<select id="cars_make" name="make"><option value="">Select Make</option>';
  foreach(\TecholutionTask\Car::findUniqueMakes($allCars) as $make) {
  	$makes .= sprintf('<option value="%s">%s</option>', $make, $make);
  }
  $makes .= '</select>';

  $models = '<select id="cars_model" name="model">';
  foreach ($allCars as $car){
  	$models .= sprintf('<option value="%s">%s</option>', $car['model'], $car['model']);
  }
  $models .= '</select>';

  $output = get_view();
  $output = str_replace('{{car_makes}}', $makes, $output);
  $output = str_replace('{{car_models}}', $models, $output);
  return $output;
}

/**
 * Send HTML header and render page
 */
function render_view() {
	echo preprocess_view();
}

/**
 * Read HTML template from file system into variable for processing
 */
function get_view() {
	ob_start();
	include(__DIR__ . '/cars.html');
	return ob_get_clean();
}
