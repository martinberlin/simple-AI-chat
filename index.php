<?php
require("config.php");
$upload_satus = 0;
$upload_error = "";
$upload_url = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    if ($_FILES['image']['error'] >0) {
        $upload_error = $phpFileUploadErrors[$_FILES['image']['error']];
    }
    $file_ext = explode('/', $_FILES['image']['type']);
    $uploadfile = $upload_dir.time().".".$file_ext[1];
    $upload_url = $http_port.$webimage_path.$upload_path.'/'.time().".".$file_ext[1];

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $upload_satus = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script>
        var upload_status = <?=$upload_satus?>;
        var upload_url = '<?=$upload_url?>';
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/openfile.js?t=<?=time() ?>"></script>
    <script src="assets/chat.js?t=<?=time() ?>"></script>

    <link rel="stylesheet" href="assets/styles.css?t=<?=time() ?>">

</head>


<body>

<div class="row">
    <div class="col-md-12">
        <div class="card card-bordered">
            <div class="card-header">
                <h4 class="card-title"><strong>Chat</strong></h4>
                <a class="btn btn-xs btn-secondary" href="#" data-abc="true">AI simple chat</a>
            </div>

            <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:78vh !important;">
                <img id="preload" src="assets/pixel.png">

                <div class="media-chat" id="response">
                    <img class="avatar" src="assets/img/ai.png">
                    <div class="media-body">
                        <p>Hi</p>
                        <?php if ($upload_satus) { ?>
                        <div class="row">
                            <div class="col-md-4">
                            <b><?=$upload_error?></b>
                        <p>Your image: <small><?=$upload_url ?></small><br>
                            <img style="width:50%" src="<?=$uploadfile ?>">
                        </p>
                            </div>
                        </div>
                        <?php } else { ?>
                        <p>I will reply using <b>gpt-4o-mini</b> model. It's only a single reply per question, I won't keep the conversation going like ChatGTP
                        </p>
                        <?php } ?>
                    </div>
                </div>


                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div></div></div>

            <div class="row">

                <div class="publisher bt-1 border-light col-md-10">
                    <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                    <textarea id="input" class="form-control" rows="3" placeholder="A S K"><?=($upload_satus)?$ai_image_describe:'' ?></textarea>
                    <button id="chat" class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></button>

                    <span class="publisher-btn file-group">
                        <form action="index.php" id="upload" method="post" enctype="multipart/form-data">
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                            <input id="selectFile" type="file" name="image" title="Analyze image and deliver a description using AI" >
                            <?php if ($upload_satus) { ?>
                            <a class="form-control" href="index.php">Clear image</a>
                            <?php } ?>
                        </form>
                    </span>

                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>