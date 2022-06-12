<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Controller;
use App\Working;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$url = 'http://dreamary.ml:666';
$uri = $_SERVER['REQUEST_URI'];

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
$twig = new Environment($loader);
$control = new Controller($twig);
$work= new Working;

$control -> dop_form();
$control->Show($work->show());
$control -> dop_form2();

$id = $_GET['id'];
$name = $_GET['name'];
$tale = $_GET['tale'];
$price = $_GET['price'];
$action = $_GET['add'];

        settype($name, "string");
        $mystring = $name;
        $findme   = '<';
        $pos1 = strpos($mystring, $findme); 
        
        settype($tale, "string");
        $mystring = $tale;
        $findme   = '<';
        $pos2 = strpos($mystring, $findme); 
        
        settype($price, "string");
        $mystring = $price;
        $findme   = '<';
        $pos3 = strpos($mystring, $findme);  
        
        settype($action, "string");
        $mystring = $action;
        $findme   = '<';
        $pos4 = strpos($mystring, $findme);



//Поиск по айди
$Id = $_POST['id'];
if ($Id != '') {
    $control->Poisk($work->poisk($Id));
}
//Поиск по цене
$Pr = $_POST['price'];
if ($Pr != '') {
    $control->Poisk($work->poiskPrice($Pr));
}

//Удаление и добавление записи
if ($id != '' && $name != '' && $tale != '' && $price != '' 
&& $pos1===false && $pos2===false && $pos3===false && $pos4===false)
{
$coffee = new Working;
$coffee->setId($id);
$coffee->setName($name);
$coffee->setTale($tale);
$coffee->setPrice($price);

 if (isset($_GET['add'])){
    $coffee->save();}
 if (isset($_GET['delete'])){
     $coffee->del($id);
  }  
    header('Refresh: 0; url=index.php'); 
}




