<?php require_once '../_helper.php';
// Mode
try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            addItem();
            break;
        case 'DELETE':
            removeItemByName();
            break;
        case 'PUT':
            updateItemCostByName();
            break;
        case 'GET':
            getItemByName();
            break;
        default:
            outputStatus(2, 'Invalid Mode');
    }
}
catch (Exception $e) {
    $message = $e->getMessage();
    outputStatus(2, $message);
}


function addItem()
{
    if (!isset($_GET['name']) || !isset($_GET['cost']) || !isset($_GET['desc'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $toyName = $_GET['name'];
    $toyDesc = $_GET['desc'];
    $toyCost = $_GET['cost'];
    $result = $mysqli->query("SELECT * FROM toys WHERE title = '{$toyName}';");
    if ($result->num_rows === 1) {
        $message = $toyName . ' already exists';
        outputStatus(1, $message);
    }
    else {
    $query = "INSERT INTO toys (title, description, cost)
        VALUES ('" . $toyName . "', '" . $toyDesc . "', " . $toyCost . ");";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Added ' . $toyName . ' with cost of ' . $toyCost;
        outputStatus(0, $message);
    }
}
function removeItemByName()
{
    if (!isset($_GET['name'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $toyName = $_GET['name'];
    $result = $mysqli->query("SELECT * FROM toys WHERE title = '{$toyName}';");
    if ($result->num_rows === 1) {
        $query = "DELETE FROM toys WHERE title = '" . $toyName . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Removed ' . $toyName;
        outputStatus(0, $message);
    } else {
        $message = $toyName . ' does not exist';
        outputStatus(1, $message);
    }
}
function updateItemCostByName()
{
    if (!isset($_GET['name']) || !isset($_GET['cost'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $toyName = $_GET['name'];
    $toyCost = $_GET['cost'];
    $result = $mysqli->query("SELECT * FROM toys WHERE title = '{$toyName}';");
    if ($result->num_rows === 1) {
        $query = "UPDATE toys SET cost = " . $toyCost . " WHERE title = '" . $toyName . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Updated ' . $toyName . ' with cost of ' . $toyCost;
        outputStatus(0, $message);
    } else {
        $message = $toyName . ' does not exist';
        outputStatus(1, $message);
    }
}
function getItemByName()
{
    if (!isset($_GET['name'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $toyName = $_GET['name'];
    $query = "SELECT * FROM toys WHERE title = '{$toyName}';";
    $result = $mysqli->query($query);
    if ($result->num_rows === 1) {
        foreach ($result as $toy) {
            echo "{status: 0, name: '" . $toy['title'] . "', description: '" . $toy['description'] . "', cost: " . $toy['cost'] . "}";
        }
        $mysqli->close();
    } else {
        $message = $toyName . ' does not exist';
        outputStatus(1, $message);
    }
}
?>