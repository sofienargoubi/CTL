<?php 
require '../include.php';
session_start();
$Client=new Users() ;
$role=$_SESSION['role'];
$id=$_SESSION['id'];
$clients=$Client->afficher($role,$id);
 $Titre="Change mot de passe";
require 'header.php';
?>

        <!-- Breadcrumbs Area Start -->
      <!--  <div class="breadcrumbs-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					    <div class="breadcrumbs">
					       <h2>My Account</h2> 
					       <ul class="breadcrumbs-list">
						        <li>
						            <a title="Return to Home" href="index.html">Home</a>
						        </li>
						        <li>My Account</li>
						    </ul>
					    </div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- Breadcrumbs Area Start -->
		<!-- My Account Area Start -->
		<div class="my-account-area section-padding">
			<div class="container">
				<div class="section-title2">
					<p><h2>Bienvenue <?= $_SESSION['Nom']?> sur votre compte. </h2></p> 
				</div><br>
			<div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        Mes commandes
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#friends">
                        <i class="blue ace-icon fa fa-users bigger-120"></i>
                        Friends
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#pictures">
                        <i class="pink ace-icon fa fa-picture-o bigger-120"></i>
                        Pictures
                    </a>
                </li>
            </ul>

            <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 center">
                            <span class="profile-picture">
                    <label for="imagepro">    <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="http://bootdey.com/img/Content/avatar/avatar6.png"></label>
                            </span>
                            <input type="file" name="" id="imagepro" class="hidden">

<script type="text/javascript">
  $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-responsive').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".hidden").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".hidden").click();
    });
});
</script>


                            <div class="space space-4"></div>

                            
                        </div><!-- /.col -->
<?php foreach ($clients as $row):?>
    <form action="Modifiermdp.php?id=<?=$row['ID'];?>" method="POST">
                        <div class="col-xs-12 col-sm-9">
                            <h4 class="blue">
                                <span class="middle"><?= $row['Nom']?></span>
                            </h4>

                            <div class="profile-user-info">
                                <div>
                                    Votre actuel mot de passe:
                                        <span><input type="password" name="mdp"></span>
                                   
                                </div><br>
                                <div>
                                    Votre nouveau mot de passe:
                                        <span><input type="password" name="Nouveaumdp"></span>
                                   
                                </div><br>
                                <div>
                                    Confirmer votre nouveau mot de passe:
                                        <span><input type="password" name="mdp"></span>
                                   
                                </div>
                            </div>

                            
                           
                        
                            <div class="profile-info-value">
                            <button class="btn btn-search btn-small" type="submit" name="Changermdp">Changer mot de passe </button>
                        </div>
                        </div>
                        </form>
                        <?php endforeach;?><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-20"></div>

                    
                </div><!-- /#home -->

                <div id="feed" class="tab-pane">
                    <div class="profile-feed row">
                        <div class="col-sm-6">
                            <div class="profile-activity clearfix">
                                <div>
                                    <img class="pull-left" alt="Alex Doe's avatar" src="http://bootdey.com/img/Content/avatar/avatar1.png">
                                    <a class="user" href="#"> Alex Doe </a>
                                    changed his profile photo.
                                    <a href="#">Take a look</a>

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        an hour ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <img class="pull-left" alt="Susan Smith's avatar" src="http://bootdey.com/img/Content/avatar/avatar2.png">
                                    <a class="user" href="#"> Susan Smith </a>

                                    is now friends with Alex Doe.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        2 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>
                                    joined
                                    <a href="#">Country Music</a>

                                    group.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        5 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-picture-o btn-info no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>
                                    uploaded a new photo.
                                    <a href="#">Take a look</a>

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        5 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <img class="pull-left" alt="David Palms's avatar" src="http://bootdey.com/img/Content/avatar/avatar3.png">
                                    <a class="user" href="#"> David Palms </a>

                                    left a comment on Alex's wall.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        8 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>
                                    published a new blog post.
                                    <a href="#">Read now</a>

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        11 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <img class="pull-left" alt="Alex Doe's avatar" src="http://bootdey.com/img/Content/avatar/avatar4.png">
                                    <a class="user" href="#"> Alex Doe </a>

                                    upgraded his skills.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        12 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>

                                    logged in.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        12 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>

                                    logged out.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        16 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>

                                    logged in.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        16 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-12"></div>

                    <div class="center">
                        <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                            <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
                            <span class="bigger-110">View more activities</span>

                            <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div><!-- /#feed -->

                <div id="friends" class="tab-pane">
                    <div class="profile-users clearfix">
                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar6.png" alt="Bob Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-online"></span>
                                            Bob Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">Content Editor</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
                                            <span class="green"> 20 mins ago </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Rose Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-offline"></span>
                                            Rose Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">Graphic Designer</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i>
                                            <span class="grey"> 30 min ago </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="Jim Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-busy"></span>
                                            Jim Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">SEO &amp; Advertising</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 red"></i>
                                            <span class="grey"> 1 hour ago </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar3.png" alt="Alex Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-idle"></span>
                                            Alex Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">Marketing</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
                                            <span class=""> 40 minutes idle </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar4.png" alt="Phil Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-online"></span>
                                            Phil Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">Public Relations</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
                                            <span class="green"> 2 hours ago </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar6.png" alt="Susan Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-online"></span>
                                            Susan Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">HR Management</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
                                            <span class="green"> 20 mins ago </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Jennifer Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-offline"></span>
                                            Jennifer Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">Graphic Designer</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i>
                                            <span class="grey"> 2 hours ago </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="#">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="Alexa Doe's avatar">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="#">
                                            <span class="user-status status-offline"></span>
                                            Alexa Doe
                                        </a>
                                    </div>
                                </div>

                                <div class="popover">
                                    <div class="arrow"></div>

                                    <div class="popover-content">
                                        <div class="bolder">Accounting</div>

                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i>
                                            <span class="grey"> 4 hours ago </span>
                                        </div>

                                        <div class="hr dotted hr-8"></div>

                                        <div class="tools action-buttons">
                                            <a href="#">
                                                <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                            </a>

                                            <a href="#">
                                                <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr hr10 hr-double"></div>

                    <ul class="pager pull-right">
                        <li class="previous disabled">
                            <a href="#">← Prev</a>
                        </li>

                        <li class="next">
                            <a href="#">Next →</a>
                        </li>
                    </ul>
                </div><!-- /#friends -->

                <div id="pictures" class="tab-pane">
                    <ul class="ace-thumbnails">
                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/1/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/2/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/3/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/4/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/5/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/6/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/7/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="#" data-rel="colorbox">
                                <img alt="150x150" src="http://lorempixel.com/200/200/nature/1/">
                                <div class="text">
                                    <div class="inner">Sample Caption on Hover</div>
                                </div>
                            </a>

                            <div class="tools tools-bottom">
                                <a href="#">
                                    <i class="ace-icon fa fa-link"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-paperclip"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-times red"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div><!-- /#pictures -->
            </div>
        </div>
    </div>
				<div class="row">
					<div class="col-md-12">
						<div class="create-account-button pull-left">
							<a href="index.html" class="btn button button-small" title="Home">
								<span>
									<i class="fa fa-chevron-left"></i>
									  Home
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- My Account Area End -->
		<!-- Footer Area Start -->
<?php require "footer.php"?>
        <!-- Footer Area End -->
        <!--Quickview Product Start -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="img/quick-view.jpg">
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h1>Frame Princes Cut Diamond</h1>
                                    <div class="price-box">
                                        <p class="s-price"><span class="special-price"><span class="amount">$280.00</span></span></p>
                                    </div>
                                    <a href="product-details.html" class="see-all">See all features</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons">
                                                <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                                <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                                <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .product-info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Quickview Product-->         
        <!-- all js here -->
        <!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jquery-ui js -->
        <script src="js/jquery-ui.min.js"></script>
        <!-- jquery Counterup js -->
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script> 
        <!-- jquery countdown js -->
        <script src="js/jquery.countdown.min.js"></script>
        <!-- jquery countdown js -->
        <script type="text/javascript" src="venobox/venobox.min.js"></script>
        <!-- jquery Meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>   
        <script>
            new WOW().init();
        </script>
        <!-- scrollUp JS -->        
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- plugins js -->
        <script src="js/plugins.js"></script>
        <!-- Nivo slider js -->
        <script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="lib/home.js" type="text/javascript"></script>
        <!-- main js -->
        <script src="js/main.js"></script>
    </body>
</html>