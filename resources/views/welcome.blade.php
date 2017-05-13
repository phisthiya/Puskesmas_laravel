<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,700,400' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/intro.css"> <!-- CSS reset -->
    <script src="/js/modernizr.js"></script> <!-- Modernizr -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" href="/images/icon.png">
    <title>Ez Travel</title>

    <style>
        img
        {
            display: block;
            margin: 0 auto;
            -webkit-filter: blur(3px);
            filter: blur(3px);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }
        img:hover
        {
            -webkit-filter: blur(0);
            filter: blur(0);
        }
    </style>
</head>
<body>
<section class="cd-intro">
    <div class="cd-intro-content mask-2 scale">
        <div class="content-wrapper">
            <div>
                <a href="/ez" data-toggle="tooltip" title="Getting Started!">
                    <img src="/images/intro.png" style="width: 90%">
                </a>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script src="/js/jquery-2.1.4.js"></script>
<script>
    jQuery(document).ready(function($){
        //this is used for the video effect only
        if( $('.cd-bg-video-wrapper').length > 0 ) {
            var videoWrapper = $('.cd-bg-video-wrapper'),
                mq = window.getComputedStyle(document.querySelector('.cd-bg-video-wrapper'), '::after').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
            if( mq == 'desktop' ) {
                // we are not on a mobile device
                var	videoUrl = videoWrapper.data('video'),
                    video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
                video.appendTo(videoWrapper);
                video.get(0).play();
            }
        }
    });
</script>
<script>
    t1 = window.setTimeout(function(){ window.location = "/ez"; },2000);
</script>
</body>
</html>