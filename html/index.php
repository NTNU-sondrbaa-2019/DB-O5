<?php

// show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// define data
define("DATA", "../Disney.xml");
define("QUERIES", "../.queries");

// define output
define("TITLE", "SBA - NTNU 2019 - DB O5");
define("FORMAT", "<div class='alert alert-info'><h4 class='alert-heading'><strong>Query:</strong> %s</h4><hr><p><strong>Result:</strong> %s nodes, %s</p></div>");

require_once("../lib/queries.class.php");

// load XML document and parse using xpath
$doc = new DOMDocument();
$doc->load(DATA);
$xpath = new DOMXPath($doc);

$queries = new Queries();

foreach (explode("\n", file_get_contents(QUERIES)) as $query) if (!empty($query)) $queries->add_query($query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?= TITLE ?></title>
  </head>
  <body>
  <div class="container mt-3">
      <header>
          <h1><?= TITLE ?></h1>
      </header>
      <?php foreach ($queries->get_queries() as $query) printf(FORMAT, $query, $length = $xpath->query($query)->length, (!$length) ? "evaluated value: " . $xpath->evaluate($query) : "not evaluated") ?>
      <footer>
          Made by Sondre Benjamin Aasen
      </footer>
  </div>
  </body>
</html>
