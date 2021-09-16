<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Team Building | Scavenger Hunt</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/libs/pieceofcake/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- Icon fonts -->
    <link href="<?php echo base_url(); ?>assets/libs/pieceofcake/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/libs/pieceofcake/fonts/flaticons/flaticon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/libs/pieceofcake/fonts/glyphicons/bootstrap-glyphicons.css" rel="stylesheet" type="text/css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url(); ?>assets/libs/pieceofcake/css/style.css" rel="stylesheet">
    <!-- Color Style CSS -->
    <link href="<?php echo base_url(); ?>assets/libs/pieceofcake/styles/sweet.css" rel="stylesheet">
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/pieceofcake/css/plugins.css">

    <!-- Own Style -->
    <link href="<?php echo base_url(); ?>assets/libs/pieceofcake/css/challenge-ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/common.css" rel="stylesheet">

    <!-- Core JavaScript Files -->
    <script src="<?php echo base_url(); ?>assets/libs/pieceofcake/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/pieceofcake/js/bootstrap.min.js"></script>
    <!-- Main Js -->
    <script src="<?php echo base_url(); ?>assets/libs/pieceofcake/js/main.js"></script>
    <!--Other Plugins -->
    <script src="<?php echo base_url(); ?>assets/libs/pieceofcake/js/plugins.js"></script>
    <!-- Prefix free CSS -->
    <script src="<?php echo base_url(); ?>assets/libs/pieceofcake/js/prefixfree.js"></script>

    <script src="<?php echo base_url(); ?>assets/libs/cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/FE_common.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/slizer.js-master/src/Slizer.js"></script>

    <style>
        @font-face {
            font-family: "Hunky Dory";
            src: url("<?php echo base_url(); ?>assets/fonts/HunkyDory-K7yLl.otf") format("opentype");
        }

        @font-face {
            font-family: "Tuckshop Font";
            src: url("<?php echo base_url(); ?>assets/fonts/tuckshop regular.ttf") format("truetype");
        }

        @font-face {
            font-family: "skippy_sharpie";
            src: url("<?php echo base_url(); ?>assets/fonts/skippy_sharpie.ttf") format("truetype");
        }

        .section_title {
            /* font-family: 'skippy_sharpie'; */
            /* font-weight: 700; */
            /* font-size: 1.75em; */
            /* color: rgb(63, 10, 9); */
        }

        .section_content1 {
            /* font-family: 'skippy_sharpie'; */
            /* font-weight: 700; */
            /* font-size: 1.5em; */
            /* color: rgb(248, 227, 191); */
        }

        .section_content2 {
            /* font-family: 'skippy_sharpie'; */
            /* font-weight: 700; */
            /* font-size: 1.5em; */
            /* color: rgb(63, 10, 9); */
            /* color: #5f6fcf; */
        }

        .image-bk {
            /* background: url("<?php echo base_url(); ?>/assets/images/leaderboard-background.jpg"); */
            /* background-repeat: no-repeat; */
            /* background-size: 100% 100%; */
        }

        .well {
            height: calc(100vh - 190px);
            overflow: auto;
        }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <!-- <img src="" width="100%" style="opacity:0.8; position:absolute; max-height:100vh" /> -->

    <!-- Preloader -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object-load" id="object_one"></div>
                <div class="object-load" id="object_two"></div>
                <div class="object-load" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- /preloader -->

    <!-- Section Blog -->
    <section id="blog-main" class="image-bk" style="
        height: 100vh;
        overflow:hidden;
        /* background-color:black; */
    ">
        <div class="container-cancel" style="padding-top:0px; margin:0px;">
            <div class="row" style="margin-top:3px; display:flex; padding-top:1%">
                <!-- Sidebar Column -->
                <!-- <div class="sidebar col-md-4"> -->
                <div style="width: 47%;margin-left: 2%;margin-right: 1%;display: inline-block;">
                    <div class="well">
                        <div class="leaderboard-container">
                            <h5><span class="section_title">LeaderBoard</span></h5>
                            <div style="text-align:left">
                                <?php
                                for ($i = 0; $i < count($leaderBoard); $i++) {
                                    $one = $leaderBoard[$i];
                                    $number = $i + 1;
                                    echo "<div>";
                                    echo "<span class='section_content2'>$number</span> .&nbsp;&nbsp;";
                                    echo "<span class='section_content1'>$one->team_name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "<span class='section_content2'>&nbsp;&nbsp;&nbsp;&nbsp;$one->points</span>";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2"></div> -->
                <!-- <div class="col-md-6"> -->
                <div style="width: 48%;display: inline-block;">
                    <div class="well">
                        <div class="leaderboard-container">
                            <h5><span class='section_title'>Challenges Results</span></h5>
                            <div style="text-align:left">
                                <?php
                                for ($i = 0; $i < count($challengeResults); $i++) {
                                    $one = $challengeResults[$i];
                                    $number = $i + 1;
                                    $playerName = strcmp($one->team_name, 'Solo Team') == 0 ? $one->player_name : $one->team_name;
                                    echo "<div>";
                                    echo    "<span class='section_content2'>Team &nbsp; </span>";
                                    echo    "<span class='section_content1'> $playerName </span>";
                                    echo    "<span class='section_content2'> solves Challenge &nbsp; </span>";
                                    echo    "<span class='section_content1'> $one->chg_name </span>";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="
                position: absolute;/* width: 100vw; */bottom:0px;background-color: black;
                padding-top:20px;padding-bottom:20px;left: 15px;right: 0px;width: 100%;
            ">
                <div id="slidingImage" style="display:flex; overflow: auto">
                    <?php
                    for ($i = 0; $i < count($challengeResults); $i++) {
                        $one = $challengeResults[$i];
                        if (strcmp($one->chg_type, 'Photo') != 0)
                            continue;
                        echo "<img src='$one->result' height='120' />";
                    }
                    ?>
                </div>
            </div>
            <!-- Footer -->
            <!-- <footer class="color-section">
                <div class="row">
                    
                    <div class="col-md-12 text-center">
                        <p style="margin:10px;">Copyright © 2021 Virtual Escape Attractions, LLC.</p>
                    
                        
                        <div class="page-scroll hidden-sm hidden-xs">
                            <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </section>
</body>

</html>
<script language="javascript">
    const object = document.getElementById("slidingImage");
    const slized = new Slizer(object);
    const slized = new Slizer(object, {
        Direction: 'h',
        RoundInterval: 100,
        PixelPerRound: 10
    });




    var playerId = eval("<?php echo $playerId; ?>");
    var huntId = eval("<?php echo $huntId; ?>");
    var teamId = eval("<?php echo $teamId; ?>");
    var chgId = eval("<?php echo $curChallenge->id; ?>");
    var chg_count = eval("<?php echo $chgCount; ?>");
    var cur_chg_num = eval("<?php echo $curChgNum; ?>");
    var cur_chg_type = eval("<?php echo $curChallenge->chg_type_id; ?>");
    var remainTime = eval("<?php echo isset($remainTime) ? $remainTime : ''; ?>");
    var huntInfo = <?php echo json_encode($huntInfo); ?>;

    $(document).ready(function() {
        for (var i = 1; i <= chg_count; i++) {
            $("#chg_num_" + i).text(i);
        }
        if (cur_chg_type == 1) {
            set_webcam();
        }
        startTeamGameCount(remainTime, huntInfo);


        // Poll - getting notifications
        poll_notifications();
    });

    $(window).on('resize', function() {
        //set_webcam();
    });

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $("#chgCaptured").attr("src", data_uri);
            $("#image_captured").val(data_uri);
            $("#mycam").hide();
            $("#chgCaptured").show();
        });
    }

    function reset_webcam() {
        $("#chgCaptured").hide();
        $("#mycam").show();
    }

    function set_webcam() {
        cam_width = $("#hunt_area").width();
        cam_height = Math.floor(cam_width * 3 / 4);

        Webcam.set({
            width: cam_width,
            height: cam_height,
            image_format: 'jpeg',
            jpeg_quality: 100
        });
        Webcam.attach('#mycam');
    }


    function viewFeedback(chgNum) {
        window.location = "<?php echo base_url(); ?>viewFeedback/?gc=" + gamecode + "&cn=" + chgNum;
        // window.open("<?php echo base_url(); ?>viewFeedback/?gc=" + gamecode + "&cn=" + chgNum);
    }
</script>