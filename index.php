<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

<div class="container">
    <div class="row">

<?php
// Step 1: Set Notion API Endpoint and API Key
// Replace the API_KEY with your Notion API key
$apiKey = '';
$databaseId = "";

// Set up the curl request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.notion.com/v1/databases/$databaseId/query");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{}");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $apiKey",
    "Notion-Version: 2022-06-28",
    "Content-Type: application/json"
));

// Execute the curl request and decode the response
$response = curl_exec($ch);
// var_dump($response);
$data = json_decode($response, true);

// Check for errors
if (isset($data["error"])) {
    echo "<p>Error: " . $data["error"]["message"] . "</p>";
} else {
    // Display success message
    echo "<p>Success! Data fetched from Notion database.</p>";

   
 // Loop through the results
foreach ($data["results"] as $row) {
    // Get the values for the "Artist", "Title" and "Media" keys
    $artist = isset($row["properties"]["Artist"]["title"][0]["plain_text"]) ? $row["properties"]["Artist"]["title"][0]["plain_text"] : "";
    $title = isset($row["properties"]["Title"]["rich_text"][0]["plain_text"]) ? $row["properties"]["Title"]["rich_text"][0]["plain_text"] : "";
    $media = isset($row["properties"]["Media"]["multi_select"][0]["name"]) ? $row["properties"]["Media"]["multi_select"][0]["name"] : "";

?>


  <div class="col-sm-3 mb-2">
    <div class="card">

  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo "Title: $title<br>"; ?></h5>
    <p class="card-text">T<?php echo "Artist: $artist"; ?></p>
    <p class="card-text"><small class="text-muted"><?php echo "Media: $media<br>"; ?></small></p>
  </div>
</div>

</div>


<?php
}
}

?>
</div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add console log message -->
<script>
$(document).ready(function() {
    console.log("API results fetched successfully.");
});
</script>