<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-requested-With');
require "../vendor/autoload.php";

use App\Models\Book;

$book = new Book();
$data = json_decode(file_get_contents("php://input"));
$errorMesg = array('error' => "Error, book notf updated");
$succesMsg = array('success' => "Book updated");

if (empty($data->author) || empty($data->title) || !is_numeric($data->idBook) || !isset($data->status)) {
    echo json_encode($errorMesg);
    return;
}

if ($book->updateBook($data)) {
    echo json_encode($succesMsg);
} else {
    echo json_encode($errorMesg);
}
