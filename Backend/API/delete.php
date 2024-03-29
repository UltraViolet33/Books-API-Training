<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-requested-With');
require "../vendor/autoload.php";

use App\Models\Book;

$book = new Book();
$data = json_decode(file_get_contents("php://input"));
$errorMesg = array('error' => "Error, book not deleted");
$succesMsg = array('success' => "Book deleted");

if (empty($data->idBook) || !is_numeric($data->idBook)) {
    echo json_encode($errorMesg);
    return;
}

if (!$book->getOneBook($data->idBook)) {
    echo json_encode(["invalidID" => "This book does not exists"]);
    return;
}


if ($book->deleteBook($data->idBook)) {
    echo json_encode($succesMsg);
} else {
    echo json_encode($errorMesg);
}
