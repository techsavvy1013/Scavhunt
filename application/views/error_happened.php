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
            <div class="login-box-body" style='margin-top:150px; width:650px;'>
            <h1><p class="login-box-msg" id="entryTitle">Something went wrong... <br/><br/>Please contact administrator.</p></h1>
                
                
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </body>
</html>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script language="javascript">
    var console_log = "<?php echo $console_log; ?>";
    console.log('Error Log.....');
    console.log(console_log);
</script>