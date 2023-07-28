<?php 
session_start();
require 'database.php';

if( $_SESSION['login'] ==  true){
 header("Location: admin.php");
}



if(isset($_SESSION["user"])){
  try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // TABLE USER
    $stmt1 = $conn->prepare("SELECT * FROM fyp_tbl_user WHERE fld_user_id = :userid");
    $stmt1->bindParam(':userid', $userid, PDO::PARAM_STR);

    $userid = $_SESSION["user"];
    $stmt1->execute();

    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    if(count($result1) > 0 ){
      foreach($result1 as $row){
        $per = $row["fld_perceivable"];
        $ope = $row["fld_operable"];
        $und = $row['fld_understandable'];
        $rob = $row['fld_robust'];
        $accessibility = $row['fld_accessibility'];

        if($accessibility == 1){
          $progress_level = 100;
        }else{
          $progress_level = (10 - $accessibility)*10;
        }
      }
    }else{
      echo "No results found";
    }

    // TABLE PERCEIVABLE
    $stmt2 = $conn->prepare("SELECT * FROM fyp_tbl_perceivable WHERE fld_user_id = :userid");
    $stmt2->bindParam(':userid', $userid, PDO::PARAM_STR);

    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    

    if(count($result2) > 0){
      foreach($result2 as $row){
        $per_non_text_content = $row["fld_non_text_content"];
        $per_audio_only_and_video_only = $row["fld_audio_only_and_video_only"];
        $per_captions = $row["fld_captions"];
        $per_audio_description_or_media_alternative = $row["fld_audio_description_or_media_alternative"];
        $per_info_and_relationships = $row["fld_info_and_relationships"];
        $per_meaningful_sequence = $row["fld_meaningful_sequence"];
        $per_sensory_characteristics = $row["fld_sensory_characteristics"];
        $per_use_of_color = $row["fld_use_of_color"];
        $per_audio_control = $row["fld_audio_control"];
      }
    }else{
      echo "No results found";
    }

    $per_fulfill = $per_non_text_content + $per_audio_only_and_video_only + $per_captions + $per_audio_description_or_media_alternative + $per_info_and_relationships + $per_meaningful_sequence + $per_sensory_characteristics + $per_use_of_color + $per_audio_control;

    $per_nofulfill = 9 - $per_fulfill;


     // TABLE OPERABLE
    $stmt3 = $conn->prepare("SELECT * FROM fyp_tbl_operable WHERE fld_user_id = :userid");
    $stmt3->bindParam(':userid', $userid, PDO::PARAM_STR);

    $stmt3->execute();
    $result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    

    if(count($result3) > 0){
      foreach($result3 as $row){
        $ope_keyboard = $row["fld_keyboard"];
        $ope_no_keyboard_trap = $row["fld_no_keyboard_trap"];
        $ope_character_key_shortcuts = $row["fld_character_key_shortcuts"];
        $ope_timing_adjustable = $row["fld_timing_adjustable"];
        $ope_pause_stop_hide = $row["fld_pause_stop_hide"];
        $ope_three_flashes_or_below_threshold = $row["fld_three_flashes_or_below_threshold"];
        $ope_bypass_blocks = $row["fld_bypass_blocks"];
        $ope_page_titled = $row["fld_page_titled"];
        $ope_focus_order = $row["fld_focus_order"];
        $ope_link_purpose = $row["fld_link_purpose"];
        $ope_pointer_gestures = $row["fld_pointer_gestures"];
        $ope_pointer_cancellation = $row["fld_pointer_cancellation"];
        $ope_label_in_name = $row["fld_label_in_name"];
        $ope_motion_actuation = $row["fld_motion_actuation"];
      }
    }else{
      echo "No results found";
    }

    $ope_fulfill = $ope_keyboard + $ope_no_keyboard_trap + $ope_character_key_shortcuts + $ope_timing_adjustable + $ope_pause_stop_hide + $ope_three_flashes_or_below_threshold + $ope_bypass_blocks + $ope_page_titled + $ope_focus_order + $ope_link_purpose + $ope_pointer_gestures + $ope_pointer_cancellation + $ope_label_in_name + $ope_motion_actuation;

    $ope_nofulfill = 14 - $ope_fulfill;



     // TABLE UNDERSTANDABLE
    $stmt4 = $conn->prepare("SELECT * FROM fyp_tbl_understandable WHERE fld_user_id = :userid");
    $stmt4->bindParam(':userid', $userid, PDO::PARAM_STR);

    $stmt4->execute();
    $result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    

    if(count($result4) > 0){
      foreach($result4 as $row){
        $und_language_of_page = $row["fld_language_of_page"];
        $und_on_focus = $row["fld_on_focus"];
        $und_on_input = $row["fld_on_input"];
        $und_error_identification = $row["fld_error_identification"];
        $und_labels_or_instruction = $row["fld_labels_or_instruction"];
        
      }
    }else{
      echo "No results found";
    }

    $und_fulfill = $und_language_of_page + $und_on_focus + $und_on_input + $und_error_identification + $und_labels_or_instruction;

    $und_nofulfill = 5 - $und_fulfill;



     // TABLE ROBUST
    $stmt5 = $conn->prepare("SELECT * FROM fyp_tbl_robust WHERE fld_user_id = :userid");
    $stmt5->bindParam(':userid', $userid, PDO::PARAM_STR);

    $stmt5->execute();
    $result5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

    

    if(count($result5) > 0){
      foreach($result5 as $row){
        $rob_parsing = $row["fld_parsing"];
        $rob_name_role_value = $row["fld_name_role_value"];
        
      }
    }else{
      echo "No results found";
    }

    $rob_fulfill = $rob_parsing + $rob_name_role_value;

    $rob_nofulfill = 2 - $rob_fulfill;


    $conn = null;

  }catch(PDOException $e){
    echo "Error: ". $e->getMessage();
  }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

 <style type="text/css">
   .card{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

    .social-menu ul {
    display: flex;
    justify-content: center; /* Center the icons horizontally */
    margin-top: 20px; /* Add some spacing from the company info */
  }

  .social-menu ul li {
    list-style: none;
    margin: 0 10px; /* Adjust the margin to provide spacing between icons */
  }

  .social-menu ul li .bi {
    font-size: 30px;
    color: #000000;
    transition: .5s;
  }

  .social-menu ul li .bi:hover {
    color: #ffffff;
  }

  .social-menu ul li a {
    display: inline-block; /* Use inline-block to remove the unnecessary positioning properties */
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #fff;
    text-align: center;
    transition: .6s;
    box-shadow: 0 5px 4px rgba(0, 0, 0, .5);
    line-height: 50px; /* Center the icons vertically */
  }

  .social-menu ul li a:hover {
    transform: translateY(-10%);
  }

  .social-menu ul li:nth-child(1) a:hover {
    background-color: rgba(0, 0, 0, 0.829);
  }

  .social-menu ul li:nth-child(2) a:hover {
    background-color: #0077b5;
  }

  .mb-6 {
    margin-bottom: 4rem;
  }
</style>

</head>
<body>
 <?php include_once 'navbar.php'?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>


 <h2 class="text-center my-3">Web Accessibility Rank </h2>

 <div class="container mb-2">
  <div class="mb-5 mt-5">
    <h4>Web Accessibility Rank : <?php echo number_format($accessibility,2); ?> out of 10</h4>
    <div class="progress">
      <?php if ($accessibility <= 2) {?>
       <div class="progress-bar" role="progressbar" style="width: <?php echo $progress_level; ?>%; " aria-valuenow="<?php echo $progress_level ?>" aria-valuemin="0" aria-valuemax="100">Very High</div>
     <?php }elseif ($accessibility <=4) { ?>
       <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $progress_level; ?>%; "  aria-valuenow="<?php echo $progress_level ?>" aria-valuemin="0" aria-valuemax="100">High</div>
     <?php }elseif ($accessibility <=7) { ?>
       <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $progress_level; ?>%; "  aria-valuenow="<?php echo $progress_level ?>" aria-valuemin="0" aria-valuemax="100">Moderate</div>
     <?php }elseif ($accessibility <=9) { ?>
       <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $progress_level; ?>%; "  aria-valuenow="<?php echo $progress_level ?>" aria-valuemin="0" aria-valuemax="100">Low</div>
     <?php }else{ ?>
      <div class="progress-bar bg-danger" role="progressbar" sstyle="width: <?php echo $progress_level; ?>%; "  aria-valuenow="<?php echo $progress_level ?>" aria-valuemin="0" aria-valuemax="100">Very Low</div>
    <?php } ?>
    <br>
  </div>
</div>

<div class="row mb-5">
  <div class="col-sm-6 col-md-6 text-center mb-5">
   <h5>Perceivable</h5>
   <canvas id="perceivableChart"></canvas>
 </div>
 <div class="col-sm-6 col-md-6 text-center mb-5">
   <h5>Operabale</h5>
   <canvas id="operableChart"></canvas>
 </div> 
</div>

<br>
<div class="row mb-5">
  <div class="col-sm-6 col-md-6 text-center mb-5">
   <h5>Understandable</h5>
   <canvas id="understandableChart"></canvas>
 </div>
 <div class="col-sm-6 col-md-6 text-center mb-5">
   <h5>Robust</h5>
   <canvas id="robustChart"></canvas>
 </div>
</div>

<div>
  <h2 style="text-align: center;" class="mb-3">Suggestion</h2>
  <div class="card mb-6">
   <h5 class="card-header">Perceivable</h5>
   <div class="card-body">
    <?php  if ($per_fulfill !=0 ) { ?>
      <b style="font-size: 20px">Fulfill: </b>
      <br>
      <?php
      echo "<ul>";
      if ($per_non_text_content == 1) {
        echo "<li>1.1.1 Non-text content</li>";
      }

      if ($per_audio_only_and_video_only == 1) {
        echo "<li>1.2.1  Audio-only and Video-only (Prerecorded)</li>";
      }

      if ($per_captions == 1) {
        echo "<li>1.2.2  Captions (Prerecorded)</li>";
      }

      if ($per_audio_description_or_media_alternative == 1) {
        echo "<li>1.2.3 Audio Description or Media Alternative (Prerecorded)</li>";
      }

      if ($per_info_and_relationships == 1) {
        echo "<li>1.3.1  Info and Relationships</li>";
      }

      if ($per_meaningful_sequence == 1) {
        echo "<li>1.3.2  Meaningful Sequence</li>";
      }

      if ($per_sensory_characteristics == 1) {
        echo "<li>1.3.3  Sensory Characteristics</li>";
      }

      if ($per_use_of_color == 1) {
        echo "<li>1.4.1  Use of colour</li>";
      }

      if ($per_audio_control == 1) {
        echo "<li>1.4.2  Audio Control</li>";
      }

      echo "</ul>";

      ?>


    <?php }   
    if($per_fulfill > 0 && $per_nofulfill > 0) 
      echo "<hr>";
    ?>

    <?php   if($per_nofulfill !=0 ){ ?>

      <b style="font-size: 20px">Not Fulfill: </b>
      <br>
      <?php

      if ($per_non_text_content == 0) {

        echo "<br>";
        $sentences = file("suggestion/1.1.1.txt", FILE_IGNORE_NEW_LINES);
        $num = 1;
        foreach ($sentences as $sentence) {
          if ($num == 1) {
            echo "<b>". htmlspecialchars($sentence). "</b>";
            echo "<ul>";
          }elseif ($num == 5) {
           echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
           echo "</ul>";
         }else{
          echo "<li>" . htmlspecialchars($sentence) . "</li>";
        }
        $num ++ ;
      }

    }

    if ($per_audio_only_and_video_only == 0) {
     $sentences = file("suggestion/1.2.1.txt", FILE_IGNORE_NEW_LINES);
     $num = 1;
     foreach ($sentences as $sentence) {
      if ($num == 1) {
        echo "<br>";
        echo "<b>". htmlspecialchars($sentence). "</b>";
        echo "<ul>";
      }elseif ($num == 4) {
       echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
       echo "</ul>";
     }else{
      echo "<li>" . htmlspecialchars($sentence) . "</li>";
    }
    $num ++ ;
  }
}

if ($per_captions == 0) {
 $sentences = file("suggestion/1.2.2.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 3) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($per_audio_description_or_media_alternative == 0) {
  $sentences = file("suggestion/1.2.3.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 6) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($per_info_and_relationships == 0) {
  $sentences = file("suggestion/1.3.1.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 6) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($per_meaningful_sequence == 0) {
 $sentences = file("suggestion/1.3.2.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 4) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($per_sensory_characteristics == 0) {
 $sentences = file("suggestion/1.3.2.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 4) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($per_use_of_color == 0) {
 $sentences = file("suggestion/1.4.1.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 4) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($per_audio_control == 0) {
  $sentences = file("suggestion/1.4.2.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 6) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

echo "</ul>";
}

?>


</div>
</div>  <!--Perceivable card  -->

<div class="card mb-6">
 <h5 class="card-header">Operable</h5>
 <div class="card-body">
  <?php if ($ope_fulfill !=0) { ?>
    <b style="font-size: 20px">Fulfill: </b>
    <br>
    <?php
    echo "<ul>";
    if ($ope_keyboard == 1) {
      echo "<li>2.1.1  Keyboard</li>";
    }

    if ($ope_no_keyboard_trap == 1) {
      echo "<li>2.1.2  No Keyboard Trap</li>";
    }

    if ($ope_character_key_shortcuts == 1) {
      echo "<li>2.1.4  Character Key Shortcuts</li>";
    }

    if ($ope_timing_adjustable == 1) {
      echo "<li>2.2.1  Time Ajdustable</li>";
    }

    if ($ope_pause_stop_hide == 1) {
      echo "<li>2.2.2  Pause, Stop, Hide</li>";
    }

    if ($ope_three_flashes_or_below_threshold == 1) {
      echo "<li>2.3.1  Three Flashes or Below Threshold</li>";
    }

    if ($ope_bypass_blocks == 1) {
      echo "<li>2.4.1  Bypass Block</li>";
    }

    if ($ope_page_titled == 1) {
      echo "<li>2.4.2  Page Titled</li>";
    }

    if ($ope_focus_order == 1) {
      echo "<li>2.4.3  Focus Order</li>";
    }

    if ($ope_link_purpose == 1) {
      echo "<li>2.4.4  Link Purpose ( In Context)</li>";
    }

    if ($ope_pointer_gestures == 1) {
      echo "<li>2.5.1  Pointer Gestures</li>";
    }

    if ($ope_pointer_cancellation == 1) {
      echo "<li>2.5.2  Pointer Cancellation</li>";
    }

    if ($ope_label_in_name == 1) {
      echo "<li>2.5.3  Label in Name</li>";
    }

    if ($ope_motion_actuation == 1) {
      echo "<li>2.5.4  Motion Actuation</li>";
    }


    echo "</ul>";


    ?>

  <?php }  
  if($ope_fulfill > 0 && $ope_nofulfill > 0) 
    echo "<hr>";
  ?>

  <?php  if($ope_nofulfill){ ?>
    <b style="font-size: 20px">Not Fulfill: </b>
    <br>
    <?php

    if ($ope_keyboard == 0) {

      echo "<br>";
      $sentences = file("suggestion/2.1.1.txt", FILE_IGNORE_NEW_LINES);
      $num = 1;
      foreach ($sentences as $sentence) {
        if ($num == 1) {
          echo "<b>". htmlspecialchars($sentence). "</b>";
          echo "<ul>";
        }elseif ($num == 6) {
         echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
         echo "</ul>";
       }else{
        echo "<li>" . htmlspecialchars($sentence) . "</li>";
      }
      $num ++ ;
    }

  }

  if ($ope_no_keyboard_trap == 0) {
   $sentences = file("suggestion/2.1.2.txt", FILE_IGNORE_NEW_LINES);
   $num = 1;
   foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 4) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_character_key_shortcuts == 0) {
 $sentences = file("suggestion/2.1.4.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 4) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($ope_timing_adjustable == 0) {
  $sentences = file("suggestion/2.2.1.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 5) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_pause_stop_hide == 0) {
  $sentences = file("suggestion/2.2.2.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 8) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_three_flashes_or_below_threshold == 0) {
 $sentences = file("suggestion/2.3.1.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 5) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($ope_bypass_blocks == 0) {
 $sentences = file("suggestion/2.4.1.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 4) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($ope_page_titled == 0) {
 $sentences = file("suggestion/2.4.2.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 5) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($ope_focus_order == 0) {
  $sentences = file("suggestion/2.4.3.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 5) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_link_purpose == 0) {
  $sentences = file("suggestion/2.4.4.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 5) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_pointer_gestures == 0) {
  $sentences = file("suggestion/2.5.1.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 5) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_pointer_cancellation == 0) {
  $sentences = file("suggestion/2.5.2.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 5) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_label_in_name == 0) {
  $sentences = file("suggestion/2.5.3.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 4) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($ope_motion_actuation == 0) {
  $sentences = file("suggestion/2.5.4.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 4) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

echo "</ul>";

}

?>

</div>
</div>  <!--Operable card  -->


<div class="card mb-6">
 <h5 class="card-header">Understandable</h5>
 <div class="card-body">
  <?php if ($und_fulfill != 0) { ?>

    <b style="font-size: 20px">Fulfill: </b>
    <br>
    <?php
    echo "<ul>";
    if ($und_language_of_page == 1) {
      echo "<li>3.1.1  Language of Page</li>";
    }

    if ($und_on_focus == 1) {
      echo "<li>3.2.1  On Focus</li>";
    }

    if ($und_on_input == 1) {
      echo "<li>3.2.2  On Input</li>";
    }

    if ($und_error_identification == 1) {
      echo "<li>3.3.1  Error Identification</li>";
    }

    if ($und_labels_or_instruction == 1) {
      echo "<li>3.3.2  Labels or Instruction</li>";
    }

    echo "</ul>";

  } if($und_fulfill > 0 && $und_nofulfill > 0) 
  echo "<hr>";
  ?>



  <?php if ($und_nofulfill != 0) { ?>

    <b style="font-size: 20px">Not Fulfill: </b>
    <br>
    <?php

    if ($und_language_of_page == 0) {

      echo "<br>";
      $sentences = file("suggestion/3.1.1.txt", FILE_IGNORE_NEW_LINES);
      $num = 1;
      foreach ($sentences as $sentence) {
        if ($num == 1) {
          echo "<b>". htmlspecialchars($sentence). "</b>";
          echo "<ul>";
        }elseif ($num == 4) {
         echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
         echo "</ul>";
       }else{
        echo "<li>" . htmlspecialchars($sentence) . "</li>";
      }
      $num ++ ;
    }

  }

  if ($und_on_focus == 0) {
   $sentences = file("suggestion/3.2.1.txt", FILE_IGNORE_NEW_LINES);
   $num = 1;
   foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 3) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($und_on_input == 0) {
 $sentences = file("suggestion/3.2.2.txt", FILE_IGNORE_NEW_LINES);
 $num = 1;
 foreach ($sentences as $sentence) {
  if ($num == 1) {
    echo "<br>";
    echo "<b>". htmlspecialchars($sentence). "</b>";
    echo "<ul>";
  }elseif ($num == 6) {
   echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
   echo "</ul>";
 }else{
  echo "<li>" . htmlspecialchars($sentence) . "</li>";
}
$num ++ ;
}
}

if ($und_error_identification == 0) {
  $sentences = file("suggestion/1.2.3.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 4) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}

if ($und_labels_or_instruction == 0) {
  $sentences = file("suggestion/3.3.2.txt", FILE_IGNORE_NEW_LINES);
  $num = 1;
  foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 4) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}


echo "</ul>";

?>

<?php } ?>

</div>

</div>  <!--Understandable  card  -->

<div class="card mb-6">
 <h5 class="card-header">Robust</h5>
 <div class="card-body">
  <?php if($rob_fulfill != 0 ) { ?>
    <b style="font-size: 20px">Fulfill: </b>
    <br>
    <?php
    echo "<ul>";
    if ($rob_parsing == 1) {
      echo "<li>4.1.1  Parsing</li>";
    }

    if ($rob_name_role_value == 1) {
      echo "<li>4.1.2  Name, Role, Value</li>";
    }

    echo "</ul>";
  } 
  if($rob_fulfill > 0 && $rob_nofulfill > 0) 
    echo "<hr>";

  ?>

  <?php if($rob_nofulfill != 0 ) { ?>
    <b style="font-size: 20px">Not Fulfill: </b>
    <br>
    <?php

    if ($rob_parsing == 0) {

      echo "<br>";
      $sentences = file("suggestion/4.1.1.txt", FILE_IGNORE_NEW_LINES);
      $num = 1;
      foreach ($sentences as $sentence) {
        if ($num == 1) {
          echo "<b>". htmlspecialchars($sentence). "</b>";
          echo "<ul>";
        }elseif ($num == 6) {
         echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
         echo "</ul>";
       }else{
        echo "<li>" . htmlspecialchars($sentence) . "</li>";
      }
      $num ++ ;
    }

  }

  if ($rob_name_role_value == 0) {
   $sentences = file("suggestion/4.1.2.txt", FILE_IGNORE_NEW_LINES);
   $num = 1;
   foreach ($sentences as $sentence) {
    if ($num == 1) {
      echo "<br>";
      echo "<b>". htmlspecialchars($sentence). "</b>";
      echo "<ul>";
    }elseif ($num == 7) {
     echo "<li><a href='". htmlspecialchars($sentence). "' target = '_blank'>For more information.</a></li>";
     echo "</ul>";
   }else{
    echo "<li>" . htmlspecialchars($sentence) . "</li>";
  }
  $num ++ ;
}
}


echo "</ul>";
}
?>


</div>
</div>  <!--Understandable  card  -->



</div> <!-- The suggestion part -->

<div class="text-center mb-3">
  <a href="index.php" class="btn" style="background-color: #53109C; color: white" onclick="newEvaluate();">New Evaluate</a>
</div>



</div>

<script type="text/javascript">
  Chart.pluginService.register({
    beforeDraw: function(chart) {
      if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 75;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


  var config = {
    type: 'doughnut',
    data: {
      labels: [
      "Fulfill",
      "Not Fulfill",
      ],
      datasets: [{
        data: [<?php echo $per_fulfill; ?>, <?php echo $per_nofulfill; ?>],
        backgroundColor: [
        "#36A2EB",
        "#FF6384",
        ],
        hoverBackgroundColor: [
        "#36A2EB",
        "#FF6384",
        ]
      }]
    },
    options: {
      elements: {
        center: {
          text: 'Rank ' + <?php echo $per; ?>,
            color: '#53109C', // Default is #000000
            fontStyle: 'Georgia', // Default is Arial
            sidePadding: 20, // Default is 20 (as a percentage)
            minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
            lineHeight: 25 // Default is 25 (in px), used for when text wraps
          }
        }
      }
    };

    var ctx = document.getElementById("perceivableChart").getContext("2d");
    var myChart = new Chart(ctx, config);



    // Chart 2
    Chart.pluginService.register({
      beforeDraw: function(chart) {
        if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 75;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


    var config = {
      type: 'doughnut',
      data: {
        labels: [
        "Fulfill",
        "Not Fulfill",
        ],
        datasets: [{
          data: [<?php echo $ope_fulfill; ?>, <?php echo $ope_nofulfill; ?>],
          backgroundColor: [
          "#36A2EB",
          "#FF6384",
          ],
          hoverBackgroundColor: [
          "#36A2EB",
          "#FF6384",
          ]
        }]
      },
      options: {
        elements: {
          center: {
            text: 'Rank ' + <?php echo $ope; ?>,
            color: '#53109C', // Default is #000000
            fontStyle: 'Georgia', // Default is Arial
            sidePadding: 20, // Default is 20 (as a percentage)
            minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
            lineHeight: 25 // Default is 25 (in px), used for when text wraps
          }
        }
      }
    };

    var ctx = document.getElementById("operableChart").getContext("2d");
    var myChart = new Chart(ctx, config);



      // Chart 3
      Chart.pluginService.register({
        beforeDraw: function(chart) {
          if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 75;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


      var config = {
        type: 'doughnut',
        data: {
          labels: [
          "Fulfill",
          "Not Fulfill",
          ],
          datasets: [{
            data: [<?php echo $und_fulfill; ?>, <?php echo $und_nofulfill; ?>],
            backgroundColor: [
            "#36A2EB",
            "#FF6384",
            ],
            hoverBackgroundColor: [
            "#36A2EB",
            "#FF6384",
            ]
          }]
        },
        options: {
          elements: {
            center: {
              text: 'Rank ' + <?php echo $und; ?>,
            color: '#53109C', // Default is #000000
            fontStyle: 'Georgia', // Default is Arial
            sidePadding: 20, // Default is 20 (as a percentage)
            minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
            lineHeight: 25 // Default is 25 (in px), used for when text wraps
          }
        }
      }
    };

    var ctx = document.getElementById("understandableChart").getContext("2d");
    var myChart = new Chart(ctx, config);


     // Chart 4
     Chart.pluginService.register({
      beforeDraw: function(chart) {
        if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 75;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


     var config = {
      type: 'doughnut',
      data: {
        labels: [
        "Fulfill",
        "Not Fulfill",
        ],
        datasets: [{
          data: [<?php echo $rob_fulfill; ?>, <?php echo $rob_nofulfill; ?>],
          backgroundColor: [
          "#36A2EB",
          "#FF6384",
          ],
          hoverBackgroundColor: [
          "#36A2EB",
          "#FF6384",
          ]
        }]
      },
      options: {
        elements: {
          center: {
            text: 'Rank ' + <?php echo $rob; ?>,
            color: '#53109C', // Default is #000000
            fontStyle: 'Georgia', // Default is Arial
            sidePadding: 20, // Default is 20 (as a percentage)
            minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
            lineHeight: 25 // Default is 25 (in px), used for when text wraps
          }
        }
      }
    };

    var ctx = document.getElementById("robustChart").getContext("2d");
    var myChart = new Chart(ctx, config);


    function newEvaluate(){

      $_SESSION["user"] = "";

    }




  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>




</body>

<footer>
  <div class="py-4" style="background-color: #53109C">
   <div class="Company-info text-center text-white">
    <h4>Universiti Kebangsaan Malaysia</h4>
    <p>43600 UKM Bangi, Selangor Malaysia</p>
    <div class="social-menu">
      <ul>
        <li><a href="https://github.com/Shi0205/WebAccessibilityEvaluate" target="_blank"><i class="bi bi-github"></i></a></li>
        <li><a href="https://www.linkedin.com/in/lim-shi-tong-553044210/" target="_blank"><i class="bi bi-linkedin"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="container text-center">
    <p class="mb-0 py-2 text-white">©2023 A180172 All rights reserved.</p>
  </div>
</div>
</footer>

</html>