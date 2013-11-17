<!doctype html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Audio Transformer</title>

        <link href="data:image/gif;" rel="icon" type="image/x-icon" />

        <!-- Bootstrap -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body itemscope itemtype="http://schema.org/WebApplication">

        <?php include 'app.php'; ?>

        <div class="container">
            <div class="header">
                <noindex>
                <ul class="nav nav-pills pull-right">
                    <li><a href="?fill">Fill</a></li>
                    <li><a href="?scroll">Scroll</a></li>
                    <li><a href="?normalize">Normalize</a></li>
                </ul>
                </noindex>

                <h1 itemprop="name">Audio Transformer</h1>
            </div>

            <div id="demo">
                <div id="waveform">
                    <div class="progress progress-striped active" id="progress-bar">
                        <div class="progress-bar progress-bar-info"></div>
                    </div>

                    <!-- Here be the waveform -->
                </div>

                <div class="controls">
                    <button class="btn btn-primary" data-action="back">
                        <i class="glyphicon glyphicon-step-backward"></i>
                        Backward
                    </button>

                    <button class="btn btn-primary" data-action="play">
                        <i class="glyphicon glyphicon-play"></i>
                        Play
                        /
                        <i class="glyphicon glyphicon-pause"></i>
                        Pause
                    </button>

                    <button class="btn btn-primary" data-action="forth">
                        <i class="glyphicon glyphicon-step-forward"></i>
                        Forward
                    </button>

                    <button class="btn btn-primary" data-action="toggle-mute">
                        <i class="glyphicon glyphicon-volume-off"></i>
                        Toggle Mute
                    </button>

                    <div class="mark-controls">
                        <button class="btn btn-success" data-action="green-mark">
                            <i class="glyphicon glyphicon-flag"></i>
                            Set green mark
                        </button>

                        <button class="btn btn-danger" data-action="red-mark">
                            <i class="glyphicon glyphicon-flag"></i>
                            Set red mark
                        </button>
                    </div>
                </div>

                <!--drag and drop file! -->
                <p class="lead pull-center" id="drop">
                    Drag'n'drop your favorite
                    <i class="glyphicon glyphicon-music"></i>-file
                    here!
                </p>
            </div>

            <div class="row marketing">
                <div class="col-lg-6">
                    <!--visualizations??-->
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>

            <div class="footer row">
                <div class="col-sm-12">
                    <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a>
                </div>

                <div class="col-sm-7">
                    Built by me using <span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Text" property="dct:title" rel="dct:type">wavesurfer.js</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="https://github.com/katspaugh/wavesurfer.js" property="cc:attributionName" rel="cc:attributionURL">katspaugh</a> which is licensed under a&nbsp;<a style="white-space: nowrap" rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.
                </div>

                <div class="col-sm-5">
                    <div class="pull-right">
                        <noindex>
                        Demo music track is <a href="http://freemusicarchive.org/music/Thick_Business/Smoothest_Runes/Smoothest_Runes" rel="nofollow"><b>Smoothest Runes</b> <span class="muted">by</span>&nbsp;<b>Thick Business</b></a>. Thanks!
                        </noindex>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/lib/wavesurfer.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/trivia.js"></script>


    </body>
</html>
