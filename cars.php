<?php 

require(__DIR__ . '/cars_fns.php');

// JSON callback for supplying models based on make request param.
if (isset($_GET['make'])) {
    $cars = \TecholutionTask\Car::findByCriteria(array('make' => $_GET['make']));
    header('Content-Type: application/json');
    echo json_encode($cars);
    exit();
}

// Send output to browser
\TecholutionTask\render_view();
exit();

