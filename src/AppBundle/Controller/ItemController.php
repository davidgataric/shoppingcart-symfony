<?php


namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ItemController extends Controller
{

    /**
     * @Route("/list")
     */
    public function listAction(Request $request)
    {
        $mysqli = $this->connectToDB();

        $sql = "SELECT * FROM gad_items";
        $result = $mysqli->query($sql);

        $row = $result->fetch_all();

        return $this->render("item/item.html.php", ["items" => $row]);

    }

    /**
     * @Route("/add")
     */
    public function addAction(Request $request)
    {
        $itemCount = $request->get("amount");
        $itemName = $request->get("name");

        $mysqli = $this->connectToDB();

        $statement = $mysqli->prepare("INSERT INTO gad_items(amount, name) VALUES(?, ?)");
        $statement->bind_param("is", $itemCount, $itemName);
        $statement->execute();

        return $this->redirect("list");

    }

    /**
     * @Route("/delete")
     */
    public function deleteAction(Request $request)
    {
        $idToDelete = intval($request->get("id"));

        $mysqli = $this->connectToDB();

        $statement = $mysqli->prepare("DELETE FROM gad_items WHERE id = ?");
        $statement->bind_param("i", $idToDelete);
        $statement->execute();

        return $this->redirect("list");

    }

    /**
     * @Route("/edit")
     */
    public function editAction(Request $request)
    {
        $idToEdit = intval($request->get("id"));

        $mysqli = $this->connectToDB();

        $sql = "SELECT * FROM gad_items WHERE id = " . intval($idToEdit);
        $result = $mysqli->query($sql);

        $item = $result->fetch_array(MYSQLI_ASSOC);

        return $this->render("item/edit.html.php", ["item" => $item]);

    }

    public function connectToDB()
    {
        $dbhost = "login-67.hoststar.ch";
        $dbuser = "inf17d";
        $dbpass = "j5TQh!zmMtqsjY3";
        $db = "inf17d";
        $conn = new \mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

        return $conn;
    }
}
