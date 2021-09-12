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

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <nav class="navbar navbar-custom navbar-fixed-top" id="navbar-custom">
    </nav>
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
    <section id="blog-main">
        <div class="container">
            <div class="row">
                <!-- Sidebar Column -->
                <div class="sidebar col-md-4">
                    <div class="well">
                        <div class="leaderboard-container">
                            <h5><span>LEADERBOARD</span></h5>
                            <div style="text-align:left">
                                <?php
                                for ($i = 0; $i < count($leaderBoard); $i++) {
                                    $one = $leaderBoard[$i];
                                    $number = $i + 1;
                                    echo "<div>
                                                    <span>
                                                        $number. $one->team_name .... $one->points
                                                    </span>
                                                </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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
    var gamecode = eval("<?php echo $gamecode; ?>");
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

    function submit_answer() {
        var imageCaptured = $("#image_captured").val();
        var inpAnswer = $("#inp_answer").val();

        if (imageCaptured == "" || inpAnswer == "") {
            alert("Please submit a photo or an answer.");
            return;
        }

        var post_url = "<?php echo base_url(); ?>submitHuntAnswer";
        $.post(
            post_url, {
                playerId: playerId,
                teamId: teamId,
                huntId: huntId,
                challengeId: chgId,
                imageCaptured: imageCaptured,
                inpAnswer: inpAnswer
            },
            function(res) {
                res = JSON.parse(res);
                if (res.chgType == 2 || res.chgType == 3) {
                    let msg = res.points ? "Correct Answer!" : "Wrong Answer!";
                    displaySuccess(res.points ? 1 : 0, msg);
                } else {
                    let msg = "This challenge needs to be judged!";
                    displaySuccess(0, msg);
                }
                if (!$("#submitType")[0].checked && !res.points)
                    return;
                setTimeout(gotoNextChallenge, 3000);
            }
        );

    }

    function gotoNextChallenge() {
        let submitType = $("#submitType")[0].checked;
        $("#inp_cur_chg_num").val(cur_chg_num + 1);
        var form = $("form#answerSubmit");
        if (cur_chg_num < chg_count - 1) {
            form.attr("action", "<?php echo base_url(); ?>gotoHuntGame/?gc=" + gamecode + "&submitType=" + submitType);
        } else {
            form.attr("action", "<?php echo base_url(); ?>endHuntGame/?gc=" + gamecode + "&submitType=" + submitType);
        }
        form.submit();
    }

    function viewFeedback(chgNum) {
        window.location = "<?php echo base_url(); ?>viewFeedback/?gc=" + gamecode + "&cn=" + chgNum;
        // window.open("<?php echo base_url(); ?>viewFeedback/?gc=" + gamecode + "&cn=" + chgNum);
    }

</script>