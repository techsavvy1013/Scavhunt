<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Scavenger Hunt</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/dist/css/common.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>assets/js/FE_common.js" type="text/javascript"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            .error_Msg{ 
                color:#fa4b2a; 
                padding-left: 10px; 
            } 
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="entryform-box">
            <div class="login-box-body">
            <h1><p class="login-box-msg" id="entryTitle">Please use custom school URL for entry form </p></h1>
                
                
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </body>
</html>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script language="javascript">
    var stdIdRequired = "<?php echo $stdIdRequired; ?>";
    var arrStdIdRequired = [];                            
    jQuery(document).ready(function(){
        $('.error_Msg').hide();
        jQuery("#team_info").hide();
        if (stdIdRequired == "")
            jQuery("#stdId_info").hide();
        else
        {
            arrStdIdRequired = stdIdRequired.split("^");
            setEntryTitle();
        }

        jQuery("#btn_submit").click(function(){
            var e = e || event;
            var form = $("form#entry_form");
            var email = $("#email").val();
            var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (regex_email.test(email))
            {
                $('#email_error').hide();
            }
            else
            {
                $('#email_error').show();
                e.preventDefault();
                return; 
            }

            var fullname = $("#fullname").val();
            if (fullname != "")
            {
                $('#name_error').hide();
            }
            else
            {
                $('#name_error').show();
                e.preventDefault();
                return; 
            }

            var idx = $("#selSchoolId option:selected").index();
            if (arrStdIdRequired[idx] != 0)
            {
                var studentId = $('#studentId').val();
                /*var regex_id = /^[0-9]+$/;
                if (regex_id.test(studentId))
                {
                    $('#std_id_error').hide();
                }
                else
                {
                    $('#std_id_error').show();
                    e.preventDefault();
                    return; 
                }*/
            }

            var playerCount = $("#playersId option:selected").val();
            if (playerCount > 1)
            {
                var teamname = $('#teamname').val();
                if (teamname != "")
                {
                    $('#teamname_error').hide();
                }
                else
                {
                    $('#teamname_error').show();
                    e.preventDefault();
                    return;
                }

                var teamcaptain = $('#teamcaptain').val();
                if (teamcaptain != "")
                {
                    $('#teamcaptain_error').hide();
                }
                else
                {
                    $('#teamcaptain_error').show();
                    e.preventDefault();
                    return;
                }

                var oneMember = false;
                var hasComma = false;
                for (var i=0; i<playerCount - 1; i++)
                {
                    var teammember_id = "#teammember" + (i+1);
                    if ($(teammember_id).val() != "")
                    {
                        oneMember = true;   
                        break;
                    }
                }
                
                if (oneMember == true)
                {
                    $('#teammembers_error').hide();
                }
                else
                {
                    $('#teammembers_error').show();
                    e.preventDefault();
                    return;
                }
                
                var arr_teammembers = [];
                var teammembers = "";
                for (var i=0; i<playerCount - 1; i++)
                {
                    var teammember_id = "#teammember" + (i+1);
                    arr_teammembers.push($(teammember_id).val());
                }
                teammembers = arr_teammembers.join();
                $("#teammembers").val(teammembers);
            }
            
            let result;
            $.ajax({
                url : "<?php echo base_url(); ?>canRegisterForHunt",
                type : 'post',
                async : false,
                data : {schoolId : $("#selSchoolId").val()},
                success : function(res) {
                    res = JSON.parse(res);
                    result = res;
                },
                error : function(res, err) {
                    console.log(err);
                }
            });
            if(!result.status){
                displayError(result.msg);
                return;
            }

            form.attr("action", "<?php echo base_url(); ?>searchTeam/1");
            form.submit();
        });
    });

    var errorMsg = "<?php echo $errorMsg; ?>";
    if (errorMsg != "")
        displayMsg(errorMsg);

    function getTeamInfo(playersNum)
    {
        var playerCount = eval(playersNum);
        if (playerCount == 1)
        {   
            jQuery("#team_info").hide();
        }
        else
        {
            jQuery("#team_info").show();
            jQuery("#teammembers_group").html("");
            var teammembers_group="";
            for (var i=0; i<playerCount - 1; i++)
            {
                teammembers_group += 'Player ' + (i+1) + ': ';
                teammembers_group += '<input id="teammember' + (i+1) + '" type="text" class="form-control" placeholder="Name" name="teammember' + (i+1) + '" required />';
                teammembers_group += '<br>';
            }
            jQuery("#teammembers_group").html(teammembers_group);
        }
    }

    function setEntryTitle()
    {
        $("#entryTitle").text("Player entry form for " + $("#selSchoolId option:selected").text());
        var idx = $("#selSchoolId option:selected").index();
        if (arrStdIdRequired[idx] == 0)
            jQuery("#stdId_info").hide();
        else
            jQuery("#stdId_info").show();
        $("#schoolId").val($("#selSchoolId").val());
    }

</script>