<?php 
declare(strict_types=1);
require(__DIR__ .'/../cars_fns.php');

use PHPUnit\Framework\TestCase;

final class CarTest extends TestCase
{
    public function testConnect(): void
    {
        $pdo = \TecholutionTask\QuickDB::getInstance();
        $this->assertInstanceOf(
            'PDO',
            $pdo
        );
    }

    public function testMakes(): void
    {
        $allCars = \TecholutionTask\Car::findByCriteria();
        $makes = \TecholutionTask\Car::findUniqueMakes($allCars);
        $this->assertEquals(2,
            count($makes)
        );
    }

    public function testModels(): void
    {
	$models = \TecholutionTask\Car::findByCriteria(array('make' => 'Ford'));
        $this->assertEquals(2,
            count($models)
        
        );

	$models = \TecholutionTask\Car::findByCriteria(array('make' => 'Acura'));
        $this->assertEquals(2,
            count($models)
            
        );
    }
}


