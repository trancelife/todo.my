<?php
// include __DIR__ . "/vendor/autoload.php";


include __DIR__ . "/src/Http/Request.php";
$db = include __DIR__ . "/app/db.php";
include __DIR__ . "/app/Models/task.php";

use Phpcourses\Http\Request;
$request = new Request();

if ($request->getRoute() == "list") {
    todoList($request, $db);
}

if ($request->getRoute() == "delete") {
    todoDelete($request, $db);
}

if ($request->getRoute() == "add") {
    todoAdd($request, $db);
}

if ($request->getRoute() == "show") {
    todoShow($request, $db);
}

if ($request->getRoute() == "update") {
    todoUpdate($request, $db);
}

function todoList($request, $db)
{
    $pageTitle = "ToDo List";

    $query = $db->query('SELECT id, title, resolved, createdAt
     from tasks');

    $query->setFetchMode(PDO::FETCH_OBJ);  

    include __DIR__."/app/views/list.php";
}

function todoDelete($request, $db)
{   
    $id = $request->getParam("id");

    $query = $db->prepare("DELETE FROM tasks WHERE id = :id");
    $query->execute(array(
        "id" => $id
    ));

    header("Location: /");
}

// http://localhost:12345/?r=add
function todoAdd($request, $db)
{
    // get from $_POST
    $title;
    $data;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // var_dump($_POST);
        $query = $db->prepare("INSERT INTO tasks 
    ( title, resolved, createdAt ) 
    values ( :title, :resolved, :date)");
        $query->execute(array(
            "title" => $request->getPost("title", ""),
            "resolved" => ($request->getPost("resolved", false)) ? 1: 0,
            "date" => date("Y-m-d H:i:s")
        ));
    }

    include __DIR__."/app/views/add.php";
}

function todoShow($request, $db)
{
    $id = $request->getParam("id");

    $query = $db->prepare('SELECT id, title, resolved, createdAt
     FROM tasks WHERE id=:id');

    $query->execute(array(
        "id" => $id
    ));

    $query->setFetchMode(PDO::FETCH_CLASS, 'task');

    $task = $query->fetch();// $row

    include __DIR__."/app/views/show.php";   
}


function todoUpdate($request, $db)
{
    $id = $request->getParam("id");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // var_dump($_POST);
        $query = $db->prepare("UPDATE tasks 
            SET 
                title = :title, 
                resolved = :resolved, 
                createdAt = :createdAt
            WHERE id = :id");

        $query->execute(array(
            "title" => $request->getPost("title", ""),
            "resolved" => ($request->getPost("resolved", false)) ? 1: 0,
            "createdAt" => date("Y-m-d H:i:s"),
            "id" => $id
        ));

        header("Location: /?r=show&id=".$id);
    }

    $query = $db->prepare('SELECT id, title, resolved, createdAt
     FROM tasks WHERE id=:id');

    $query->execute(array(
        "id" => $id
    ));

    $query->setFetchMode(PDO::FETCH_OBJ);

    $task = $query->fetch();// $row

    include __DIR__."/app/views/update.php";
}
