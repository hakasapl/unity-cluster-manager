<?php

require "../../../resources/config.php";

if (!isset($_GET["state"]) || !isset($_GET["node"])) {
  die("Required parameters are state and node");
}

$hard = isset($_GET["hard"]) && $_GET["hard"] == "true";
$ipmi = new ipmi($sql->getNode($_GET["node"])["ipmi"],IPMI["user"],IPMI["pass"]);

if (!$ipmi->power($_GET["state"], $hard)) {
  die("Error setting state " . $_GET["state"]);
}

?>
