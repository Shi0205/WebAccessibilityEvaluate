<?php  
session_start();
include_once "database.php";

if( $_SESSION['login'] ==  false){
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />

 <title>Web Accessibility Evaluate</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

 <style type="text/css">
   @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

   .fa-2x {
    font-size: 2em;
  }

  .fa {
    position: relative;
    display: table-cell;
    width: 60px;
    height: 36px;
    text-align: center;
    vertical-align: middle;
    font-size:18px;
  }

  body {
    margin: 0;
  }

  .container-fluid {

  }

  .navbar {
    z-index: 1001;
  }

  .main-content {
    margin-top: 10px; /* Adjust the margin-top value to accommodate the navbar height */
    margin-left: 110px;
    margin-right: 50px;
  }

  .main-menu:hover,
  nav.main-menu.expanded {
    width: 250px;
    overflow: visible;
  }

  .main-menu {
    background: #212121;
    border-right: 1px solid #e5e5e5;
    position: fixed;
    top: 56px; /* Adjust the top value to accommodate the navbar height */
    bottom: 0;
    height: 100%;
    left: 0;
    width: 60px;
    overflow: hidden;
    -webkit-transition: width .05s linear;
    transition: width .05s linear;
    -webkit-transform: translateZ(0) scale(1, 1);
    z-index: 1000;
  }

  .main-menu > ul {
    margin: 7px 0;
  }

  .main-menu li {
    position: relative;
    display: block;
    width: 250px;
  }

  .main-menu li > a {
    position: relative;
    display: table;
    border-collapse: collapse;
    border-spacing: 0;
    color: #999;
    font-family: Arial;
    font-size: 14px;
    text-decoration: none;
    -webkit-transform: translateZ(0) scale(1, 1);
    -webkit-transition: all .1s linear;
    transition: all .1s linear;
  }

  .main-menu .nav-icon {
    position: relative;
    display: table-cell;
    width: 60px;
    height: 36px;
    text-align: center;
    vertical-align: middle;
    font-size: 18px;
  }

  .main-menu .nav-text {
    position: relative;
    display: table-cell;
    vertical-align: middle;
    width: 190px;
    font-family: 'Georgia', sans-serif;
  }

  .main-menu > ul.logout {
    position: absolute;
    left: 0;
    bottom: 0;
  }

  .no-touch .scrollable.hover {
    overflow-y: hidden;
  }

  .no-touch .scrollable.hover:hover {
    overflow-y: auto;
    overflow: visible;
  }

  a:hover,
  a:focus {
    text-decoration: none;
  }

  nav {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
  }

  nav ul,
  nav li {
    outline: 0;
    margin: 0;
    padding: 0;
  }

  .main-menu li:hover > a,
  nav.main-menu li.active > a,
  .dropdown-menu > li > a:hover,
  .dropdown-menu > li > a:focus,
  .dropdown-menu > .active > a,
  .dropdown-menu > .active > a:hover,
  .dropdown-menu > .active > a:focus,
  .no-touch .dashboard-page nav.dashboard-menu ul li:hover a,
  .dashboard-page nav.dashboard-menu ul li.active a {
    color: #fff;
    background-color: #000000;
  }

  .area {
    float: left;
    background: #e2e2e2;
    width: 100%;
    height: 100%;
  }

  @font-face {
    font-family: 'Georgia';
    font-style: normal;
    font-weight: 300;

  }

  .sb-nav-fixed {
    .sb-topnav {
      @extend .fixed-top;
      z-index: $zindex-topnav;
    }

    #layoutSidenav {
      #layoutSidenav_nav {
        @extend .fixed-top;
        width: $sidenav-base-width;
        height: 100vh;
        z-index: $zindex-sidenav;

        .sb-sidenav {
          padding-top: $topnav-base-height;

          .sb-sidenav-menu {
            overflow-y: auto;
          }
        }
      }

      #layoutSidenav_content {
        padding-left: $sidenav-base-width;
        top: $topnav-base-height;
      }
    }

  }

  .left-align{
    text-align: left;
  }




</style>
</head>
<body  class="sb-nav-fixed mb-5">
  <?php include_once 'navbar.php'?>
  <div class="main-content">
    <?php 
    try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT * FROM fyp_tbl_user, fyp_tbl_perceivable, fyp_tbl_operable, fyp_tbl_understandable, fyp_tbl_robust WHERE fyp_tbl_user.fld_user_id = fyp_tbl_perceivable.fld_user_id AND fyp_tbl_user.fld_user_id = fyp_tbl_operable.fld_user_id AND fyp_tbl_user.fld_user_id = fyp_tbl_understandable.fld_user_id  AND fyp_tbl_user.fld_user_id = fyp_tbl_robust.fld_user_id AND fyp_tbl_user.fld_user_id = :uid");

     $uid = $_GET['uid'];
     $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);


     $stmt->execute();
     $readrow = $stmt->fetch(PDO::FETCH_ASSOC);

     $non_text_content = $readrow['fld_non_text_content'];
     $audio_only_and_video_only = $readrow['fld_audio_only_and_video_only'];
     $captions = $readrow['fld_captions'];
     $audio_description_or_media_alternative = $readrow['fld_audio_description_or_media_alternative'];
     $info_and_relationships = $readrow['fld_info_and_relationships'];
     $meaningful_sequence = $readrow['fld_audio_description_or_media_alternative'];
     $sensory_characteristics =  $readrow['fld_meaningful_sequence'];
     $use_of_color =  $readrow['fld_use_of_color'];
     $audio_control =  $readrow['fld_audio_control'];

     $sum_per = $non_text_content + $audio_only_and_video_only + $captions + $audio_description_or_media_alternative + $info_and_relationships + $meaningful_sequence + $sensory_characteristics + $use_of_color +  $audio_control;


     $keyboard = $readrow['fld_keyboard']; 
     $no_keybord_trap = $readrow['fld_no_keyboard_trap'];
     $character_key_shortcuts = $readrow['fld_character_key_shortcuts'];
     $timing_adjustable = $readrow['fld_timing_adjustable'];
     $pause_stop_hide = $readrow['fld_non_text_content'];
     $three_flashes_or_below_threshold = $readrow['fld_pause_stop_hide'];
     $bypass_blocks = $readrow['fld_three_flashes_or_below_threshold'];
     $page_titled = $readrow['fld_page_titled'];
     $focus_order = $readrow['fld_focus_order'];
     $link_purpose = $readrow['fld_link_purpose'];
     $pointer_gestures = $readrow['fld_pointer_gestures'];
     $pointer_cancellation = $readrow['fld_pointer_cancellation'];
     $label_in_name = $readrow['fld_label_in_name'];
     $motion_actuation = $readrow['fld_motion_actuation'];

     $sum_ope = $keyboard + $no_keybord_trap + $character_key_shortcuts + $timing_adjustable + $pause_stop_hide + $three_flashes_or_below_threshold + $bypass_blocks + $page_titled + $focus_order + $link_purpose + $pointer_gestures + $pointer_cancellation + $label_in_name + $motion_actuation;

     // Understandable
     $language_of_page = $readrow['fld_language_of_page']; 
     $on_focus = $readrow['fld_on_focus']; 
     $on_input = $readrow['fld_on_input']; 
     $error_identification = $readrow['fld_error_identification']; 
     $labels_or_instruction = $readrow['fld_labels_or_instruction']; 

     $sum_und = $language_of_page + $on_focus + $on_input + $error_identification + $labels_or_instruction;

     // Robust
     $parsing = $readrow["fld_parsing"];
     $name_role_value = $readrow["fld_name_role_value"];

     $sum_rob = $parsing + $name_role_value;

   } catch (PDOException $e) {
     echo "Error: ".$e->getMessage();
   } 
   $conn = null; 
   ?>
   <p class="link_to_main"><a href="admin_standard.php">Standard Rule's User</a> / <?php echo $uid; ?></p>
   <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-12">
        <div class="page-header text-center"><br>
          <h2 class="mb-4">Standard Rule's User</h2>

          <table class="table table-bordered table-striped table-hover">
            <tr>
              <td class="col-xs-6 col-sm-4 col-md-4 col-6" ><strong>User ID:</strong></td>
              <td colspan="2"><?php echo $readrow['fld_user_id']; ?></td>
            </tr>
             <tr>
              <td class="col-xs-6 col-sm-4 col-md-4 col-6" ><strong>Accessibility Rank:</strong></td>
              <td colspan="2"><?php echo $readrow['fld_accessibility']; ?></td>
            </tr>
            <tr>
              <td class=" col-sm-4 col-md-4 col-6" rowspan="2"><strong>Perceivable Rank:</strong></td>
              <td colspan="2"><?php echo $readrow['fld_perceivable']; ?></td>
            </tr>
            <tr>
              <td class="col-6 col-sm-4">
                <p><strong>Fulfill</strong></p>
                <?php if($sum_per == 0){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6 \">";

                  if($non_text_content == 1){
                    echo "<li>1.1.1 Non-text content</li>";
                  }

                  if($audio_only_and_video_only == 1){
                    echo "<li>1.2.1 Audio-only and Video-only (Prerecorded)</li>";
                  }

                  if($captions == 1){
                    echo "<li>1.2.2 Captions (Prerecorded)</li>";
                  }

                  if($audio_description_or_media_alternative == 1){
                    echo "<li>1.2.3 Audio Description or Media Alternative (Prerecorded)</li>";
                  }

                  if($info_and_relationships == 1){
                    echo "<li>1.3.1 Info and Relationships</li>";
                  }

                  if($meaningful_sequence == 1){
                    echo "<li>1.3.2 Meaningful Sequence</li>";
                  }

                  if($sensory_characteristics == 1){
                    echo "<li>1.3.3 Sensory Characteristics</li>";
                  }

                  if($use_of_color == 1){
                    echo "<li>1.4.1 Use of colour</li>";
                  }

                  if($audio_control == 1){
                    echo "<li>1.4.2 Audio Control</li>";
                  }


                  echo "</ul>";
                } 
                ?>
              </td>
              <td class="col-6">
                <p><strong>Not Fulfill</strong></p>
                <?php if($sum_per == 9){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6\">";

                  if($non_text_content == 0){
                    echo "<li>1.1.1 Non-text content</li>";
                  }

                  if($audio_only_and_video_only == 0){
                    echo "<li>1.2.1 Audio-only and Video-only (Prerecorded)</li>";
                  }

                  if($captions == 0){
                    echo "<li>1.2.2 Captions (Prerecorded)</li>";
                  }

                  if($audio_description_or_media_alternative == 0){
                    echo "<li>1.2.3 Audio Description or Media Alternative (Prerecorded)</li>";
                  }

                  if($info_and_relationships == 0){
                    echo "<li>1.3.1 Info and Relationships</li>";
                  }

                  if($meaningful_sequence == 0){
                    echo "<li>1.3.2 Meaningful Sequence</li>";
                  }

                  if($sensory_characteristics == 0){
                    echo "<li>1.3.3 Sensory Characteristics</li>";
                  }

                  if($use_of_color == 0){
                    echo "<li>1.4.1 Use of colour</li>";
                  }

                  if($audio_control == 0){
                    echo "<li>1.4.2 Audio Control</li>";
                  }


                  echo "</ul>";
                } 
                ?>
              </td>
            </tr>
            <tr>
              <td class=" col-sm-4 col-md-4 col-6" rowspan="2"><strong>Operable Rank:</strong></td>
              <td colspan="2"><?php echo $readrow['fld_operable']; ?></td>
            </tr>
            <tr>
              <td class="col-6 col-sm-4">
                <p><strong>Fulfill</strong></p>
                <?php if($sum_ope == 0){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6 \">";

                  if($keyboard == 1){
                    echo "<li>2.1.1  Keyboard</li>";
                  }

                  if($no_keybord_trap == 1){
                    echo "<li>2.1.2  No Keyboard Trap</li>";
                  }

                  if($character_key_shortcuts == 1){
                    echo "<li>2.1.4  Character Key Shortcuts</li>";
                  }

                  if($timing_adjustable == 1){
                    echo "<li>2.2.1  Time Ajdustable</li>";
                  }

                  if($pause_stop_hide == 1){
                    echo "<li>2.2.2  Pause, Stop, Hide</li>";
                  }

                  if($three_flashes_or_below_threshold == 1){
                    echo "<li>2.3.1  Three Flashes or Below Threshold</li>";
                  }

                  if($bypass_blocks == 1){
                    echo "<li>2.4.1  Bypass Block</li>";
                  }

                  if($page_titled == 1){
                    echo "<li>2.4.2  Page Titled</li>";
                  }

                  if($focus_order== 1){
                    echo "<li>2.4.3  Focus Order</li>";
                  }

                  if($link_purpose== 1){
                    echo "<li>2.4.4  Link Purpose ( In Context)</li>";
                  }

                  if($pointer_gestures== 1){
                    echo "<li>2.5.1  Pointer Gestures</li>";
                  }

                  if($pointer_cancellation== 1){
                    echo "<li>2.5.2  Pointer Cancellation</li>";
                  }

                  if($label_in_name== 1){
                    echo "<li>2.5.3  Label in Name</li>";
                  }

                  if($motion_actuation== 1){
                    echo "<li>2.5.4  Motion Actuation</li>";
                  }


                  echo "</ul>";
                } 
                ?>
              </td>
              <td class="col-6">
                <p><strong>Not Fulfill</strong></p>
                <?php if($sum_ope == 14){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6 \">";

                  if($keyboard == 0){
                    echo "<li>2.1.1  Keyboard</li>";
                  }

                  if($no_keybord_trap == 0){
                    echo "<li>2.1.2  No Keyboard Trap</li>";
                  }

                  if($character_key_shortcuts == 0){
                    echo "<li>2.1.4  Character Key Shortcuts</li>";
                  }

                  if($timing_adjustable == 0){
                    echo "<li>2.2.1  Time Ajdustable</li>";
                  }

                  if($pause_stop_hide == 0){
                    echo "<li>2.2.2  Pause, Stop, Hide</li>";
                  }

                  if($three_flashes_or_below_threshold == 0){
                    echo "<li>2.3.1  Three Flashes or Below Threshold</li>";
                  }

                  if($bypass_blocks == 0){
                    echo "<li>2.4.1  Bypass Block</li>";
                  }

                  if($page_titled == 0){
                    echo "<li>2.4.2  Page Titled</li>";
                  }

                  if($focus_order== 0){
                    echo "<li>2.4.3  Focus Order</li>";
                  }

                  if($link_purpose== 0){
                    echo "<li>2.4.4  Link Purpose ( In Context)</li>";
                  }

                  if($pointer_gestures== 0){
                    echo "<li>2.5.1  Pointer Gestures</li>";
                  }

                  if($pointer_cancellation== 0){
                    echo "<li>2.5.2  Pointer Cancellation</li>";
                  }

                  if($label_in_name== 0){
                    echo "<li>2.5.3  Label in Name</li>";
                  }

                  if($motion_actuation== 0){
                    echo "<li>2.5.4  Motion Actuation</li>";
                  }


                  echo "</ul>";
                } 
                ?>
              </td>
            </tr>
            <tr>
              <td class=" col-sm-4 col-md-4 col-6" rowspan="2"><strong>Understandable Rank:</strong></td>
              <td colspan="2"><?php echo $readrow['fld_understandable']; ?></td>
            </tr>
            <tr>
              <td class="col-6 col-sm-4">
                <p><strong>Fulfill</strong></p>
                <?php if($sum_und == 0){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6 \">";

                  if($language_of_page== 1){
                    echo "<li>3.1.1  Language of Page</li>";
                  }

                  if($on_focus == 1){
                    echo "<li>3.2.1  On Focus</li>";
                  }

                  if($on_input == 1){
                    echo "<li>3.2.2  On Input</li>";
                  }

                  if($error_identification == 1){
                    echo "<li>3.3.1  Error Identification</li>";
                  }

                  if($labels_or_instruction == 1){
                    echo "<li>3.3.2  Labels or Instruction</li>";
                  }

                  echo "</ul>";
                } 
                ?>
              </td>
              <td class="col-6">
                <p><strong>Not Fulfill</strong></p>
                <?php if($sum_und == 5){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6 \">";

                  if($language_of_page== 0){
                    echo "<li>3.1.1  Language of Page</li>";
                  }

                  if($on_focus == 0){
                    echo "<li>3.2.1  On Focus</li>";
                  }

                  if($on_input == 0){
                    echo "<li>3.2.2  On Input</li>";
                  }

                  if($error_identification == 0){
                    echo "<li>3.3.1  Error Identification</li>";
                  }

                  if($labels_or_instruction == 0){
                    echo "<li>3.3.2  Labels or Instruction</li>";
                  }

                  echo "</ul>";
                } 
                ?>
              </td>
            </tr>
            <tr>
              <td class=" col-sm-4 col-md-4 col-6" rowspan="2"><strong>Robust Rank:</strong></td>
              <td colspan="2"><?php echo $readrow['fld_robust']; ?></td>
            </tr>
            <tr>
              <td class="col-6 col-sm-4">
                <p><strong>Fulfill</strong></p>
                <?php if($sum_rob == 0){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6 \">";

                  if($parsing== 1){
                    echo "<li>4.1.1  Parsing</li>";
                  }

                  if($name_role_value == 1){
                    echo "<li>4.1.2  Name, Role, Value</li>";
                  }

                  echo "</ul>";
                } 
                ?>
              </td>
              <td class="col-6">
                <p><strong>Not Fulfill</strong></p>
                <?php if($sum_rob == 2){
                  echo "<p>None</p>";
                }else{
                  echo "<ul class=\"left-align col-xs-6 col-sm-6 col-md-6 \">";

                  if($parsing== 0){
                    echo "<li>4.1.1  Parsing</li>";
                  }

                  if($name_role_value == 0){
                    echo "<li>4.1.2  Name, Role, Value</li>";
                  }

                  echo "</ul>";
                } 
                ?>
              </td>
            </tr>
          </table>


        </div>
      </div>

    </div>

  </div>

</div>
<nav class="main-menu">
  <!-- Sidebar content -->
  <ul>
    <li>
      <a href="admin.php">
        <i class="fa fa-home fa-2x"></i>
        <span class="nav-text">
          Dashboard
        </span>
      </a>

    </li>
    <li class="has-subnav">
      <a href="admin_contact.php">
        <i class="bi bi-inbox-fill fa-2x fa"></i>
        <span class="nav-text">
          User Feedback
        </span>
      </a>
    </li>
    <li class="has-subnav">
      <a href="admin_evaluate_method.php">
        <i class="bi bi-table fa-2x fa"></i>
        <span class="nav-text">
          Evaluate Method
        </span>
      </a>
    </li>
    <li class="has-subnav">
      <a href="admin_standard.php">
        <i class="fas fa-check fa-2x fa"></i>
        <span class="nav-text">
          Standard Rule's User
        </span>
      </a>
    </li>
    <li class="has-subnav">
      <a href="admin_adjusted.php">
        <i class="fas fa-adjust fa-2x fa"></i>
        <span class="nav-text">
          Adjusted Rule's User
        </span>
      </a>
    </li>
  </ul>
</nav>

<script type="text/javascript"> 

  console.log(<?php echo json_encode($uid); ?>)

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>


</body>


</html>
