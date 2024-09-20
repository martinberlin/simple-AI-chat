<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require("vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiurl = "https://models.inference.ai.azure.com/chat/completions";

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
                "content": [{"text": "What''s in this image?", "type": "text"}, 
                {"image_url": {"url":"_IMAGEURL_","detail":"medium"}, "type": "image_url"}]
            }
        ],
        "model": "gpt-4o-mini"
}
EOT;
