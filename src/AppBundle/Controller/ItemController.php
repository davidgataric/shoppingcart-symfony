<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends Controller
{

    /**
     * @Route("/loginPage")
     */
    public function loginPageAction(Request $request)
    {
        return $this->render("item/login.html.php");
    }

    /**
     * @Route("/registerPage")
     */
    public function registerPageAction(Request $request)
    {
        return $this->render("item/register.html.php");
    }

    /**
     * @Route("/register")
     */
    public function registerAction(Request $request)
    {
        $username = $request->get("username");
        $password = $request->get("password");

        $mysqli = $this->connectToDB();

        $statement = $mysqli->prepare("INSERT INTO gad_user(username, password) VALUES(?, ?)");
        $statement->bind_param("ss", $username, $password);
        $statement->execute();

        return $this->redirect("list");
    }

    /**
     * @Route("/comment")
     */
    public function commentAction(Request $request)
    {
        $username = strval($request->get("username"));
        $password = $request->get("password");
        $comment = $request->get("comment");
        $itemId = $request->get("item");

        $mysqli = $this->connectToDB();

        $statement1 = $mysqli->prepare("SELECT * FROM gad_user WHERE username = ?");
        $statement1->bind_param("s", $username);
        $statement1->execute();
        $user = $statement1->fetch();

        if ($user[2] == $password) {

            $statement2 = $mysqli->prepare("INSERT INTO gad_comments(comment, userId, itemId) VALUES(?, ?, ?)");
            $statement2->bind_param("sii", $comment, $userId, $itemId);
            $statement2->execute();

            return $this->redirect("detail?id=" . $itemId);
        }
    }

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

    /**
     * @Route("/detail")
     */
    public function detailAction(Request $request)
    {
        $idForDetail = intval($request->get("id"));

        $mysqli = $this->connectToDB();

        $sql = "SELECT * FROM gad_items WHERE id = " . intval($idForDetail);
        $result = $mysqli->query($sql);

        $item = $result->fetch_array(MYSQLI_ASSOC);

        return $this->render("item/detail.html.php", ["item" => $item]);
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
