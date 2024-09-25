<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require("vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiurl = "https://models.inference.ai.azure.com/chat/completions";

// IMAGE Uploads
$webimage_path = $_SERVER['HTTP_HOST'] .'/'. basename(__DIR__) .'/';
$upload_path = "uploads";
$upload_dir = "./{$upload_path}/";
$http_port = ($_SERVER['SERVER_PORT'] == 80) ? 'http://' : 'https://';
$ai_image_describe = "What is in the image?";

$tem_chat = <<<EOT
{
        "messages": [
            {
                "role": "system",
                "content": "You are a helpful assistant."
            },
            {
                "role": "user",
                "content": "_QUESTION_"
            }
        ],
        "model": "gpt-4o-mini"
    }
EOT;

$tem_img = <<<EOT
{
        "messages": [
            {
                "role": "system",
                "content": "You are a helpful assistant that describes images in details."
            },
            {
                "role": "user",
                "content": [{"text": "_QUESTION_", "type": "text"}, 
                {"image_url": {"url":"_IMAGEURL_","detail":"medium"}, "type": "image_url"}]
            }
        ],
        "model": "gpt-4o"
}
EOT;
// OTHER Useful tips
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);