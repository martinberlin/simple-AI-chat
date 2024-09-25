<?php
require ("config.php");
$request = $_POST['request'];
$image_url = $_POST['image'];
if (empty($request)) {echo("Empty request, please ask a real question!");exit();}
if (empty($image_url)) {echo("Empty image, please upload an image");exit();}
//setup the request, you can also use CURLOPT_URL
$curl = curl_init($apiurl);

// Returns the data/output as a string instead of raw data
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);


$input = str_replace(["_QUESTION_","_IMAGEURL_"], [$request, $image_url], $tem_img);

//Set the headers
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $_ENV['GITHUB_TOKEN']
));

curl_setopt($curl, CURLOPT_POSTFIELDS, $input);

// get stringified data/output. See CURLOPT_RETURNTRANSFER
$data = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
// close curl resource to free up system resources
curl_close($curl);

if ($status == 200) {
    $dec = json_decode($data,true);
    if (is_array($dec['choices'])) {
        $choices = $dec['choices'][0];
        $Parsedown = new Parsedown();
        echo $Parsedown->text($choices['message']['content']);
    } else {
        echo "Could not parse API response. More: ";
        print_r($dec);
    }
} else {
    echo "There was an error in the request. Status: $status";
}
