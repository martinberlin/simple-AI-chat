<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="assets/styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/openfile.js"></script>
    <script src="assets/chat.js"></script>
</head>


<body>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Chat</strong></h4>
                        <a class="btn btn-xs btn-secondary" href="#" data-abc="true">AI simple chat</a>
                    </div>


                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
                        <div class="media media-chat" id="response">
                            <img class="avatar" src="assets/img/ai.png">
                            <div class="media-body">
                                <p>Hi</p>
                                <p>I will reply using <b>gpt-4o-mini</b> model. It's only a single reply per question, I won't keep the conversation going like ChatGTP
                                </p>
                            </div>
                        </div>


                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div></div></div>

                    <div class="row">
                    <div class="publisher bt-1 border-light col-md-10">
                        <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                        <textarea id="input" class="form-control" rows="8" placeholder="A S K"></textarea>
                        <button id="chat" class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></button>

                        <span class="publisher-btn file-group">
                          <button class="fa fa-paperclip file-browser" id="openFileButton" title="Analyze image and deliver a description using AI"></button>
                          <input type="file">
                        </span>

                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>