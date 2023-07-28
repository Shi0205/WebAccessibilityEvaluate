<!--Color code = 53109C -->
<?php 
session_start();
if( $_SESSION['login'] ==  true){
   header("Location: admin.php");
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>


  <style type="text/css">
   .custom-border-color-per {
    border-color: #5A3FC4 !important;   
  }

  .custom-border-color-ope {
    border-color: #FF9D36 !important; 
  }

  .custom-border-color-und {
    border-color: #FF3670 !important; 
  }

  .custom-border-color-rob {
    border-color: #4CDD55 !important; 
  }

  .btn-container {
    text-align: right;
  }

  .btn_custom {
    background-color: #D5AEFE;
    color: black; 
    border-color: #D5AEFE;
  }

  .btn_custom:hover,.btn_custom:focus, .btn_custom:active {
    background-color: #C286FF;
    border-color: #C286FF;
    color: black;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 2rem;

  }

  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }

  th {
    background-color: #eee1fc;
  }

  .table_per, .table_ope, .table_und, .table_rob {
    display: none;
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


</style>

</head>
<body>
  <?php include_once 'navbar.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <div class="text-center " >
    <img src="w_logo.png" alt="White WAE Logo" style="width:300px" >
  </div>

  <div class="container text-center mb-2">
    <div class="row">
      <div class="col">
        <b>URL: <a href="https://pgmall.my/home" target="_blank">https://pgmall.my/home</a></b>
      </div>
      <div class="col">
        <button type="button" class="btn btn-lg text-white" style="background-color: #53109C" onclick="window.open('evaluate_method.php','_blank');" >Evaluate Method</button>
      </div>
    </div>
  </div>

  <div class="container mb-2">
    <form action="process.php" method="POST" class="form-horizontal was-validated">
      <div id="page1">
       <div class="row text-center">
        <h2>Marks</h2>
        <p>Please check whether the website fulfill the guidelines and sucess criteria under four different principles. After that, please give the rank for four principles which are <b style="color: #5A3FC4;">perceivable</b>, <b style="color: #FF9D36">operable</b>, <b style="color: #FF3670">understandable</b>, and <b style="color: #4CDD55">robust</b>.</p>
      </div>
      
      <br>


      <div class="form-group text-center my-4">
        <b>Scale Table: </b> &nbsp;
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="scale_table" id="standard_scale_table" value="standard" checked >
          <label class="form-check-label" for="standard_scale_table">Standard Scale Table</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="scale_table" id="adjusted_scale_table" value="adjusted">
          <label class="form-check-label" for="adjusted_scale_table">Adjusted Scale Table</label>
        </div>
      </div>

      <div class="table_per">
        <div class="row">
          <p style="display: block">Note: The <b>rank</b> should be in <b>1-10</b> and <b>number of criteria for principle perceiveble</b> is <b>9</b>.</p>
          <table class="text-center">
           <thead>
             <tr>
              <th>Rank</th>
              <th>Level</th>
              <th>Meaning</th>
              <th>Number of Success Criteria Fulfilled</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_per_very_high" min="1" max="6" ></td>
              <td>Very High</td>
              <td>The e-commerce website fulfills most of the perceivable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_per_very_high" min="4" max="9"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_per_high" min="2" max="7"></td>
              <td>High</td>
              <td>The e-commerce website fulfills many perceivable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_per_high" min="3" max="8"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_per_moderate" min="3" max="8"></td>
              <td>Moderate</td>
              <td>The e-commerce website fulfills half of the perceivable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_per_moderate" min="2" max="7"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_per_low" min="4" max="9"></td>
              <td>Low</td>
              <td>The e-commerce website fulfills some of the perceivable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_per_low" min="1" max="6"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_per_very_low" value="10" min="10" max="10"></td>
              <td>Very Low</td>
              <td>The e-commerce website did not fulfill or fulfill very few perceivable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_per_very_low" min="0" max="0" ></td>
            </tr>
          </tbody>
        </table>

        <p id="error_message_per_rank" style="display: none; color: red;">Invalid input. Please make sure the rank values are in the correct order.</p>
        <p id="error_message_per_criteria" style="display: none; color: red;">Invalid input. Please make sure the criteria values are in the correct order.</p>
      </div>

    </div>



    <!-- Perceivable  -->
    <div class="border border-4 border-opacity-75 p-2 rounded-4 shadow mb-5 mt-3 custom-border-color-per">
      <div class="row text-center">
        <h2>Perceivable</h2>
        <p>Information and user interface components must be presentable to users in ways they can perceive.</p>
      </div>

      <div class="row mx-1 my-4">
        <h5>Guideline 1.1: Text Alternatives</h5>
        <p>Provide text alternatives for any non-text content so that it can be changed into other forms people need, such as large print, braille, speech, symbols or simpler language. For more information : <a href="https://www.w3.org/TR/WCAG21/#text-alternatives" target="_blank">Text Alternative</a>.</p>
        <br>

        <h6>Success Criteria 1.1.1 Non-text Content</h6>
        <p>All <a href="https://www.w3.org/TR/WCAG21/#dfn-non-text-content" target="_blank">non-text content</a> that is presented to user has a text alternative that serves the equivalent purpose, except certain situation. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/non-text-content.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_non_text_content" id="p_non_text_content_yes" value="1" >
            <label class="form-check-label" for="p_non_text_content_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_non_text_content" id="p_non_text_content_no" value="0" required="">
            <label class="form-check-label" for="p_non_text_content_no">No</label>
          </p>
        </div>


      </div> <!--  Text alternative-->



      <div class="row mx-1 my-4">
        <h5>Guideline 1.2: Time-based Media</h5>
        <p>Provide alternatives for time-based media. For more information : <a href="https://www.w3.org/TR/WCAG21/#time-based-media" target="_blank">Time-based Media</a>.</p>
        <br>

        <!-- 1.2.1 -->
        <h6>Success Criteria 1.2.1 Audio-only and Video-only (Prerecord) </h6>
        <p>For prerecorded audio-only and prerecorded video-only media. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/audio-only-and-video-only-prerecorded.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_audio_only_and_video_only" id="p_audio_only_and_video_only_yes" value="1" >
            <label class="form-check-label" for="p_audio_only_and_video_only_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_audio_only_and_video_only" id="p_audio_only_and_video_only_no" value="0" required="">
            <label class="form-check-label" for="p_audio_only_and_video_only_no">No</label>
          </p> 
        </div>
        <!-- 1.2.1 -->

        <!-- 1.2.2 -->
        <h6>Success Criteria 1.2.2 Captions (Prerecord) </h6>
        <p>Captions are provided for all prerecorded audio content in synchronized media, except when the media is a media alternative for text and is clearly labeled as such. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/captions-prerecorded.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_captions" id="p_captions_yes" value="1" >
            <label class="form-check-label" for="p_captions_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_captions" id="p_captions_no" value="0" required="">
            <label class="form-check-label" for="p_captions_no">No</label>
          </p>
        </div>
        <!-- 1.2.2 -->

        <!-- 1.2.3 -->
        <h6>Success Criteria 1.2.3 Audio Description or Media Alternative (Prerecorded) </h6>
        <p>An alternative for time-based media or audio description of the prerecorded video content is provided for synchronized media, except when the media is a media alternative for text and is clearly labeled as such. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/audio-description-or-media-alternative-prerecorded.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_audio_description_or_media_alternative" id="p_audio_description_or_media_alternative_yes" value="1" >
            <label class="form-check-label" for="p_audio_description_or_media_alternative_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_audio_description_or_media_alternative" id="p_audio_description_or_media_alternative_no" value="0" required="">
            <label class="form-check-label" for="p_audio_description_or_media_alternative_no">No</label>
          </p>
        </div>
        <!-- 1.2.3 -->

      </div> <!--  Timed-based Media-->
      <br>


      <!--  Adaptable-->
      <div class="row mx-1 my-4">
        <h5>Guideline 1.3: Adaptable</h5>
        <p>Create content that can be presented in different ways (for example simpler layout) without losing information or structure. For more information : <a href="https://www.w3.org/TR/WCAG21/#adaptable" target="_blank">Adaptable</a>.</p>
        <br>

        <!-- 1.3.1 -->
        <h6>Success Criteria 1.3.1 Info and Relationships </h6>
        <p>Information, structure, and relationships conveyed through presentation can be programmatically determined or are available in text. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/info-and-relationships.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_info_and_relationships" id="p_info_and_relationships_yes" value="1" >
            <label class="form-check-label" for="p_info_and_relationships_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_info_and_relationships" id="p_info_and_relationships_no" value="0" required="">
            <label class="form-check-label" for="p_info_and_relationships_no">No</label>
          </p> 
        </div>
        <!-- 1.3.1 -->

        <!-- 1.3.2 -->
        <h6>Success Criteria 1.3.2 Meaningful Sequence </h6>
        <p>When the sequence in which content is presented affects its meaning, a correct reading sequence can be programmatically determined. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/meaningful-sequence.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_meaningful_sequence" id="p_meaningful_sequence_yes" value="1" >
            <label class="form-check-label" for="p_meaningful_sequence_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_meaningful_sequence" id="p_meaningful_sequence_no" value="0" required="">
            <label class="form-check-label" for="p_meaningful_sequence_no">No</label>
          </p>
        </div>
        <!-- 1.3.2 -->

        <!-- 1.3.3 -->
        <h6>Success Criteria 1.3.3 Sensory Characteristics </h6>
        <p>Instructions provided for understanding and operating content do not rely solely on sensory characteristics of components such as shape, color, size, visual location, orientation, or sound. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/sensory-characteristics.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_sensory_characteristics" id="p_sensory_characteristics_yes" value="1" >
            <label class="form-check-label" for="p_sensory_characteristics_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_sensory_characteristics" id="p_sensory_characteristics_no" value="0" required="">
            <label class="form-check-label" for="p_sensory_characteristics_no">No</label>
          </p>
        </div>
        <!-- 1.3.3 -->

      </div> <!--  Adoptable-->
      <br>


      <!--  Distiguishable-->
      <div class="row mx-1 my-4">
        <h5>Guideline 1.4: Distinguishable</h5>
        <p>Make it easier for users to see and hear content including separating foreground from background. For more information : <a href="https://www.w3.org/TR/WCAG21/#distinguishable" target="_blank">Distinguishable</a>.</p>
        <br>

        <!-- 1.4.1 -->
        <h6>Success Criteria 1.4.1 Use of Color</h6>
        <p>Color is not used as the only visual means of conveying information, indicating an action, prompting a response, or distinguishing a visual element. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/use-of-color.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_use_of_color" id="p_use_of_color_yes" value="1" >
            <label class="form-check-label" for="p_use_of_color_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_use_of_color" id="p_use_of_color_no" value="0" required="">
            <label class="form-check-label" for="p_use_of_color_no">No</label>
          </p> 
        </div>
        <!-- 1.4.1 -->

        <!-- 1.4.2 -->
        <h6>Success Criteria 1.4.2 Audio Control </h6>
        <p>When the sequence in which content is presented affects its meaning, a correct reading sequence can be programmatically determinedIf any audio on a Web page plays automatically for more than 3 seconds, either a mechanism is available to pause or stop the audio, or a mechanism is available to control audio volume independently from the overall system volume level. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/audio-control.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="p_audio_control" id="p_audio_control_yes" value="1" >
            <label class="form-check-label" for="p_audio_control_yes">Yes</label>

            <input class="form-check-input" type="radio" name="p_audio_control" id="p_audio_control_no" value="0" required="">
            <label class="form-check-label" for="p_audio_control_no">No</label>
          </p>
        </div>
        <!-- 1.4.2 -->

      </div> <!--  Adoptable-->

      <hr class="solid">
      <div class="text-center p-2" style="font-size: 1.5em" >
        <b><label for="rank_per">Rank of Perceivable: </label>
          <input type="number" name="rank_per" id="rank_per" min="1" max="10" style="text-align: center;"></b>
        </div>
        <p id="per_suggested_rank" style="font-style: 1.0em" class="text-center"></p>


        <br>





      </div> <!-- Perceivable End-->
      <div class="btn-container">
        <button class="btn btn_custom "   type="button"  onclick="nextPage(1, 2)">Next</button>
      </div>

    </div>

    <div id="page2" style="display: none;">
      <div class="table_ope">
        <div class="row">
          <p style="display: block">Note: The <b>rank</b> should be in <b>1-10</b> and <b>number of criteria for principle operable</b> is <b>14</b>.</p>
          <table class="text-center">
           <thead>
             <tr>
              <th>Rank</th>
              <th>Level</th>
              <th>Meaning</th>
              <th>Number of Success Criteria Fulfilled</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_ope_very_high" min="1" max="6" ></td>
              <td>Very High</td>
              <td>The e-commerce website fulfills most of the operable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_ope_very_high" min="4" max="14"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_ope_high" min="2" max="7"></td>
              <td>High</td>
              <td>The e-commerce website fulfills many operable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_ope_high" min="3" max="13"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_ope_moderate" min="3" max="8"></td>
              <td>Moderate</td>
              <td>The e-commerce website fulfills half of the operable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_ope_moderate" min="2" max="12"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_ope_low" min="4" max="9"></td>
              <td>Low</td>
              <td>The e-commerce website fulfills some of the operable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_ope_low" min="1" max="11"></td>
            </tr>
            <tr>
              <td>Rank ≤ <input type="number" name="rank_ope_very_low" value="10" min="10" max="10"></td>
              <td>Very Low</td>
              <td>The e-commerce website did not fulfill or fulfill very few operable success criteria.</td>
              <td>Criteria ≥ <input type="number" name="criteria_ope_very_low" min="0" max="0" value="0" ></td>
            </tr>
          </tbody>
        </table>

        <p id="error_message_ope_rank" style="display: none; color: red;">Invalid input. Please make sure the rank values are in the correct order.</p>
        <p id="error_message_ope_criteria" style="display: none; color: red;">Invalid input. Please make sure the criteria values are in the correct order.</p>
      </div>

    </div>


    <!-- Operable  -->
    <div class="border border-4 border-opacity-75 p-2 rounded-4 shadow mb-5 mt-3 custom-border-color-ope">
      <div class="row text-center">
        <h2>Operable</h2>
        <p>User interface components and navigation must be operable.</p>
      </div>

      <div class="row mx-1 my-4">
        <h5>Guideline 2.1: Keyboard Accessible</h5>
        <p>Make all functionality available from a keyboard. For more information : <a href="https://www.w3.org/TR/WCAG21/#keyboard-accessible" target="_blank">Keyboard Accessible</a>.</p>
        <br>

        <!-- 2.1.1 -->
        <h6>Success Criteria 2.1.1 Keyboard</h6>
        <p>All functionality of the content is operable through a keyboard interface without requiring specific timings for individual keystrokes, except where the underlying function requires input that depends on the path of the user's movement and not just the endpoints. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/keyboard.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_keyboard" id="o_keyboard_yes" value="1" >
            <label class="form-check-label" for="o_keyboard_yes">Yes</label>
            <input class="form-check-input" type="radio" name="o_keyboard" id="o_keyboard_no" value="0" required="">
            <label class="form-check-label" for="o_keyboard_no">No</label>
          </p>
        </div>
        <!-- 2.1.1  -->


        <!-- 2.1.2 -->
        <h6>Success Criteria 2.1.2 No Keyboard Trap</h6>
        <p>If keyboard focus can be moved to a component of the page using a keyboard interface, then focus can be moved away from that component using only a keyboard interface, and, if it requires more than unmodified arrow or tab keys or other standard exit methods, the user is advised of the method for moving focus away. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/no-keyboard-trap.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_no_keyboard_trap" id="o_no_keyboard_trap_yes" value="1" >
            <label class="form-check-label" for="o_no_keyboard_trap_yes">Yes</label>
            <input class="form-check-input" type="radio" name="o_no_keyboard_trap" id="o_no_keyboard_trap_no" value="0" required="">
            <label class="form-check-label" for="o_no_keyboard_trap_no">No</label>
          </p>
        </div>
        <!-- 2.1.2-->

        <!-- 2.1.4 -->
        <h6>Success Criteria 2.1.4 Character Key Shortcuts</h6>
        <p>If a keyboard shortcut is implemented in content using only letter (including upper- and lower-case letters), punctuation, number, or symbol characters, then at least one of turn off, remap or active only on focus is true. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/character-key-shortcuts.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_character_key_shortcuts" id="o_character_key_shortcuts_yes" value="1" >
            <label class="form-check-label" for="o_character_key_shortcuts_yes">Yes</label>
            <input class="form-check-input" type="radio" name="o_character_key_shortcuts" id="o_character_key_shortcuts_no" value="0" required="">
            <label class="form-check-label" for="o_character_key_shortcuts_no">No</label>
          </p>
        </div>
        <!-- 2.2.4-->

      </div> <!--  Keyboard Accessible-->



      <div class="row mx-1 my-4">
        <h5>Guideline 2.2: Enough Time</h5>
        <p>Provide users enough time to read and use content. For more information : <a href="https://www.w3.org/TR/WCAG21/#enough-time" target="_blank">Enough Time</a>.</p>
        <br>

        <!-- 2.2.1 -->
        <h6>Success Criteria 2.2.1 Timing Adjustable </h6>
        <p>For each time limit that is set by the content, the user at least one of turn off, adjust, extend, real-time exception, essential exception and 20 hour exception should be true. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/timing-adjustable.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_timing_adjustable" id="o_timing_adjustable_yes" value="1" >
            <label class="form-check-label" for="o_timing_adjustable_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_timing_adjustable" id="o_timing_adjustable_no" value="0" required="">
            <label class="form-check-label" for="o_timing_adjustable_no">No</label>
          </p> 
        </div>
        <!-- 2.2.1 -->

        <!-- 2.2.2 -->
        <h6>Success Criteria 2.2.2 Pause, Stop, Hide </h6>
        <p>For moving, blinking, scrolling, or auto-updating information, some criteria should be achieve. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/pause-stop-hide.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_pause_stop_hide" id="o_pause_stop_hide_yes" value="1" >
            <label class="form-check-label" for="o_pause_stop_hide_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_pause_stop_hide" id="o_pause_stop_hide_no" value="0" required="">
            <label class="form-check-label" for="o_pause_stop_hide_no">No</label>
          </p>
        </div>
        <!-- 2.2.2 -->

      </div> <!--  Enough Time-->
      <br>


      <!-- Seizures and Physical Reactions--->
      <div class="row mx-1 my-4">
        <h5>Guideline 2.3: Seizures and Physical Reactions</h5>
        <p>Do not design content in a way that is known to cause seizures or physical reactions. For more information : <a href="https://www.w3.org/TR/WCAG21/#seizures-and-physical-reactions" target="_blank">Seizures and Physical Reactions</a>.</p>
        <br>

        <!-- 2.3.1 -->
        <h6>Success Criteria 2.3.1 Three Flashes or Below Threshold </h6>
        <p>Web pages do not contain anything that flashes more than three times in any one second period, or the flash is below the general flash and red flash thresholds. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/three-flashes-or-below-threshold.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_three_flashes_or_below_threshold" id="o_three_flashes_or_below_threshold_yes" value="1" >
            <label class="form-check-label" for="o_three_flashes_or_below_threshold_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_three_flashes_or_below_threshold" id="o_three_flashes_or_below_threshold_no" value="0" required="">
            <label class="form-check-label" for="o_three_flashes_or_below_threshold_no">No</label>
          </p> 
        </div>
        <!-- 2.3.1 -->


      </div> <!--  Seizures and Physical Reaction-->
      <br>


      <!--  Navigable-->
      <div class="row mx-1 my-4">
        <h5>Guideline 2.4: Navigable</h5>
        <p>Provide ways to help users navigate, find content, and determine where they are. For more information : <a href="https://www.w3.org/TR/WCAG21/#navigable" target="_blank">Navigable</a>.</p>
        <br>

        <!-- 2.4.1 -->
        <h6>Success Criteria 2.4.1 Bypass Blocks</h6>
        <p>A mechanism is available to bypass blocks of content that are repeated on multiple Web pages. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/bypass-blocks.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_bypass_blocks" id="o_bypass_blocks_yes" value="1" >
            <label class="form-check-label" for="o_bypass_blocks_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_bypass_blocks" id="o_bypass_blocks_no" value="0" required="">
            <label class="form-check-label" for="o_bypass_blocks_no">No</label>
          </p> 
        </div>
        <!-- 2.4.1 -->

        <!-- 2.4.2 -->
        <h6>Success Criteria 2.4.2 Page Titled </h6>
        <p>Web pages have titles that describe topic or purpose. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/page-titled.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_page_titled" id="o_page_titled_yes" value="1" >
            <label class="form-check-label" for="o_page_titled_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_page_titled" id="o_page_titled_no" value="0" required="">
            <label class="form-check-label" for="o_page_titled_no">No</label>
          </p>
        </div>
        <!-- 2.4.2 -->

        <!-- 2.4.3 -->
        <h6>Success Criteria 2.4.3  Focus Order </h6>
        <p>If a Web page can be navigated sequentially and the navigation sequences affect meaning or operation, focusable components receive focus in an order that preserves meaning and operability. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/focus-order.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_focus_order" id="o_focus_order_yes" value="1" >
            <label class="form-check-label" for="o_focus_order_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_focus_order" id="o_focus_order_no" value="0" required="">
            <label class="form-check-label" for="o_focus_order_no">No</label>
          </p>
        </div>
        <!-- 2.4.3 -->

        <!-- 2.4.4 -->
        <h6>Success Criteria 2.4.4  Link Purpose (In Context) </h6>
        <p>The purpose of each link can be determined from the link text alone or from the link text together with its programmatically determined link context, except where the purpose of the link would be ambiguous to users in general. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/link-purpose-in-context.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_link_purpose" id="o_link_purpose_yes" value="1" >
            <label class="form-check-label" for="o_link_purpose_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_link_purpose" id="o_link_purpose_no" value="0" required="">
            <label class="form-check-label" for="o_link_purpose_no">No</label>
          </p>
        </div>
        <!-- 2.4.3 -->


      </div> <!--  Navigate-->
      <br>


      <!--  Input Modalities-->
      <div class="row mx-1 my-4">
        <h5>Guideline 2.5: Input Modalities</h5>
        <p>Make it easier for users to operate functionality through various inputs beyond keyboard. For more information : <a href="https://www.w3.org/TR/WCAG21/#input-modalities" target="_blank">Input Modalities</a>.</p>
        <br>

        <!-- 2.5.1 -->
        <h6>Success Criteria 2.5.1 Pointer Gestures</h6>
        <p>A mechanism is available to bypass blocks of content that are repeated. All functionality that uses multipoint or path-based gestures for operation can be operated with a single pointer without a path-based gesture, unless a multipoint or path-based gesture is essential. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/pointer-gestures.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_pointer_gestures" id="o_pointer_gestures_yes" value="1" >
            <label class="form-check-label" for="o_pointer_gestures_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_pointer_gestures" id="o_pointer_gestures_no" value="0" required="">
            <label class="form-check-label" for="o_pointer_gestures_no">No</label>
          </p> 
        </div>
        <!-- 2.5.1 -->

        <!-- 2.5.2 -->
        <h6>Success Criteria 2.5.2 Pointer Cancellation</h6>
        <p>For functionality that can be operated using a single pointer, at least one of the No Down-Event, Abort or Undo, Up Reversal, or Essential is true. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/pointer-cancellation.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_pointer_cancellation" id="o_pointer_cancellation_yes" value="1" >
            <label class="form-check-label" for="o_pointer_cancellation_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_pointer_cancellation" id="o_pointer_cancellation_no" value="0" required="">
            <label class="form-check-label" for="o_pointer_cancellation_no">No</label>
          </p>
        </div>
        <!-- 2.5.2 -->

        <!-- 2.5.3 -->
        <h6>Success Criteria 2.5.3  Label in Name </h6>
        <p>For user interface components with labels that include text or images of text, the name contains the text that is presented visually. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/label-in-name.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_label_in_name" id="o_label_in_name_yes" value="1" >
            <label class="form-check-label" for="o_label_in_name_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_label_in_name" id="o_label_in_name_no" value="0" required="">
            <label class="form-check-label" for="o_label_in_name_no">No</label>
          </p>
        </div>
        <!-- 2.5.3 -->

        <!-- 2.5.4 -->
        <h6>Success Criteria 2.5.4  Motion Actuation </h6>
        <p>Functionality that can be operated by device motion or user motion can also be operated by user interface components and responding to the motion can be disabled to prevent accidental actuation, exception when the motion is used to operate functionality through an accessibility supported interface and the motion is essential for the function and doing so would invalidate the activity. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/motion-actuation.html" target="_blank">here</a>.</p>

        <div class="text-center">
          <p><b>Fulfill or not:</b> &nbsp;
            <input class="form-check-input" type="radio" name="o_motion_actuation" id="o_motion_actuation_yes" value="1" >
            <label class="form-check-label" for="o_motion_actuation_yes">Yes</label>

            <input class="form-check-input" type="radio" name="o_motion_actuation" id="o_motion_actuation_no" value="0" required="">
            <label class="form-check-label" for="o_motion_actuation_no">No</label>
          </p>
        </div>
        <!-- 2.5.3 -->


      </div> <!--  Input Modalities-->

      <hr class="solid">
      <div class="text-center p-2" style="font-size: 1.5em" >
        <b><label for="rank_ope">Rank of Operable: </label>
          <input type="number" name="rank_ope" id="rank_ope" min="1" max="10" style="text-align: center;"></b>
        </div>
        <p id="ope_suggested_rank" style="font-style: 1.0em" class="text-center"></p>

        <br>
      </div> <!-- Operable End-->
      <div class="btn-container">
       <button class="btn_custom btn" type="button" onclick="previousPage(2, 1)">Previous</button>
       <button class="btn_custom btn" type="button" onclick="nextPage(2, 3)">Next</button>
     </div>

   </div>

   <div id="page3" style="display: none;">
    <!-- Understandable  -->

    <div class="table_und">
      <div class="row">
        <p style="display: block">Note: The <b>rank</b> should be in <b>1-10</b> and <b>number of criteria for principle understandable</b> is <b>5</b>.</p>
        <table class="text-center">
         <thead>
           <tr>
            <th>Rank</th>
            <th>Level</th>
            <th>Meaning</th>
            <th>Number of Success Criteria Fulfilled</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Rank ≤ <input type="number" name="rank_und_high" min="1" max="8" ></td>
            <td>High</td>
            <td>The e-commerce website fulfills most of the understandable success criteria.</td>
            <td>Criteria ≥ <input type="number" name="criteria_und_high" min="2" max="5"></td>
          </tr>
          <tr>
            <td>Rank ≤ <input type="number" name="rank_und_moderate" min="2" max="9"></td>
            <td>Moderate</td>
            <td>The e-commerce website fulfills some of the understandable success criteria.</td>
            <td>Criteria ≥ <input type="number" name="criteria_und_moderate" min="1" max="4"></td>
          </tr>
          <tr>
            <td>Rank ≤ <input type="number" name="rank_und_low" value="10" min="10" max="10"></td>
            <td>Low</td>
            <td>The e-commerce website did not fulfill or fulfill very few understandable success criteria.</td>
            <td>Criteria ≥ <input type="number" name="criteria_und_low" min="0" max="0" value="0"></td>
          </tr>
        </tbody>
      </table>

      <p id="error_message_und_rank" style="display: none; color: red;">Invalid input. Please make sure the rank values are in the correct order.</p>
      <p id="error_message_und_criteria" style="display: none; color: red;">Invalid input. Please make sure the criteria values are in the correct order.</p>
    </div>

  </div>

  <div class="border border-4 border-opacity-75 p-2 rounded-4 shadow mb-5 mt-3 custom-border-color-und">
    <div class="row text-center">
      <h2>Understandable</h2>
      <p>Information and the operation of user interface must be understandable.</p>
    </div>

    <div class="row mx-1 my-4">
      <h5>Guideline 3.1: Readable</h5>
      <p>Make text content readable and understandable. For more information : <a href="https://www.w3.org/TR/WCAG21/#readable" target="_blank">Readable</a>.</p>
      <br>

      <h6>Success Criteria 3.1.1 Language of Page</h6>
      <p>The default human language of each Web page can be programmatically determined. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/language-of-page.html" target="_blank">here</a>.</p>

      <div class="text-center">
        <p><b>Fulfill or not:</b> &nbsp;
          <input class="form-check-input" type="radio" name="u_language_of_page" id="u_language_of_page_yes" value="1" >
          <label class="form-check-label" for="u_language_of_page_yes">Yes</label>

          <input class="form-check-input" type="radio" name="u_language_of_page" id="u_language_of_page_no" value="0" required="">
          <label class="form-check-label" for="u_language_of_page_no">No</label>
        </p>
      </div>


    </div> <!--  Readable-->



    <div class="row mx-1 my-4">
      <h5>Guideline 3.2: Predictable</h5>
      <p>Make Web pages appear and operate in predictable ways. For more information : <a href="https://www.w3.org/TR/WCAG21/#predictable" target="_blank">Predictable</a>.</p>
      <br>

      <!-- 3.2.1 -->
      <h6>Success Criteria 3.2.1 On Focus </h6>
      <p>When any user interface component receives focus, it does not initiate a change of context. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/on-focus.html" target="_blank">here</a>.</p>

      <div class="text-center">
        <p><b>Fulfill or not:</b> &nbsp;
          <input class="form-check-input" type="radio" name="u_on_focus" id="u_on_focus_yes" value="1" >
          <label class="form-check-label" for="u_on_focus_yes">Yes</label>

          <input class="form-check-input" type="radio" name="u_on_focus" id="u_on_focus_no" value="0" required="">
          <label class="form-check-label" for="u_on_focus_no">No</label>
        </p> 
      </div>
      <!-- 3.2.1 -->

      <!-- 3.2.2 -->
      <h6>Success Criteria 3.2.2 On Input </h6>
      <p>Changing the setting of any user interface component does not automatically cause a change of context unless the user has been advised of the behavior before using the component. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/on-input.html" target="_blank">here</a>.</p>

      <div class="text-center">
        <p><b>Fulfill or not:</b> &nbsp;
          <input class="form-check-input" type="radio" name="u_on_input" id="u_on_input_yes" value="1" >
          <label class="form-check-label" for="u_on_input_yes">Yes</label>

          <input class="form-check-input" type="radio" name="u_on_input" id="u_on_input_no" value="0" required="">
          <label class="form-check-label" for="u_on_input_no">No</label>
        </p>
      </div>
      <!-- 3.2.2 -->

    </div> <!-- Predictable -->
    <br>


    <!--  Input Assistance-->
    <div class="row mx-1 my-4">
      <h5>Guideline 3.3: Input Assistance</h5>
      <p>Help users avoid and correct mistakes. For more information : <a href="https://www.w3.org/TR/WCAG21/#input-assistance" target="_blank">Input Assistance</a>.</p>
      <br>

      <!-- 3.3.1 -->
      <h6>Success Criteria 3.3.1 Error Identification </h6>
      <p>If an input error is automatically detected, the item that is in error is identified and the error is described to the user in text. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/error-identification.html" target="_blank">here</a>.</p>

      <div class="text-center">
        <p><b>Fulfill or not:</b> &nbsp;
          <input class="form-check-input" type="radio" name="u_error_identification" id="u_error_identification_yes" value="1" >
          <label class="form-check-label" for="u_error_identification_yes">Yes</label>

          <input class="form-check-input" type="radio" name="u_error_identification" id="u_error_identification_no" value="0" required="">
          <label class="form-check-label" for="u_error_identification_no">No</label>
        </p> 
      </div>
      <!-- 3.3.1 -->

      <!-- 3.3.2 -->
      <h6>Success Criteria 3.3.2 Labels or Instruction </h6>
      <p>Labels or instructions are provided when content requires user input. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/labels-or-instructions.html" target="_blank">here</a>.</p>

      <div class="text-center">
        <p><b>Fulfill or not:</b> &nbsp;
          <input class="form-check-input" type="radio" name="u_labels_or_instruction" id="u_labels_or_instruction_yes" value="1" >
          <label class="form-check-label" for="u_labels_or_instruction_yes">Yes</label>

          <input class="form-check-input" type="radio" name="u_labels_or_instruction" id="u_labels_or_instruction_no" value="0" required="">
          <label class="form-check-label" for="u_labels_or_instruction_no">No</label>
        </p>
      </div>
      <!-- 3.3.2 -->



    </div> <!--  Input Assistance--> 
    <hr class="solid">
    <div class="text-center p-2" style="font-size: 1.5em" >
      <b><label for="rank_und">Rank of Understandable: </label>
        <input type="number" name="rank_und" id="rank_und" min="1" max="10" style="text-align: center;"></b>
      </div>
      <p id="und_suggested_rank" style="font-style: 1.0em" class="text-center"></p>
      <br>




    </div> <!-- Understandable End-->
    <div class="btn-container">
      <button class="btn_custom btn" type="button" onclick="previousPage(3, 2)">Previous</button>
      <button class="btn_custom btn" type="button" onclick="nextPage(3, 4)">Next</button>
    </div>

  </div>


  <div id="page4" style="display: none;">
    <!-- Robust  -->
    <div class="table_rob">
     <div class="row">
      <p style="display: block">Note: The <b>rank</b> should be in <b>1-10</b> and <b>number of criteria for principle robust</b> is <b>2</b>.</p>
      <table class="text-center">
       <thead>
         <tr>
          <th>Rank</th>
          <th>Level</th>
          <th>Meaning</th>
          <th>Number of Success Criteria Fulfilled</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Rank ≤ <input type="number" name="rank_rob_high" min="1" max="8" ></td>
          <td>High</td>
          <td>The e-commerce website fulfills most of the robust success criteria.</td>
          <td>Criteria ≥ <input type="number" name="criteria_rob_high" min="2" max="2"></td>
        </tr>
        <tr>
          <td>Rank ≤ <input type="number" name="rank_rob_moderate" min="2" max="9"></td>
          <td>Moderate</td>
          <td>The e-commerce website fulfills some of the robust success criteria.</td>
          <td>Criteria ≥ <input type="number" name="criteria_rob_moderate" min="1" max="1"></td>
        </tr>
        <tr>
          <td>Rank ≤ <input type="number" name="rank_rob_low" value="10" min="10" max="10"></td>
          <td>Low</td>
          <td>The e-commerce website did not fulfill or fulfill very few robust success criteria.</td>
          <td>Criteria ≥ <input type="number" name="criteria_rob_low" min="0" max="0" value="0"></td>
        </tr>
      </tbody>
    </table>

    <p id="error_message_rob_rank" style="display: none; color: red;">Invalid input. Please make sure the rank values are in the correct order.</p>
    <p id="error_message_rob_criteria" style="display: none; color: red;">Invalid input. Please make sure the criteria values are in the correct order.</p>
  </div>

</div>

<div class="border border-4 border-opacity-75 p-2 rounded-4 shadow mb-5 mt-3 custom-border-color-rob">
  <div class="row text-center">
    <h2>Robust</h2>
    <p>Content must be robust enough that it can be interpreted by by a wide variety of user agents, including assistive technologies.</p>
  </div>

  <div class="row mx-1 my-4">
    <h5>Guideline 4.1: Compatible</h5>
    <p>Maximize compatibility with current and future user agents, including assistive technologies. For more information : <a href="https://www.w3.org/TR/WCAG21/#compatible" target="_blank">Compatible</a>.</p>
    <br>


    <!-- 4.1.1 -->
    <h6>Success Criteria 4.1.1 Parsing</h6>
    <p>In content implemented using markup languages, elements have complete start and end tags, elements are nested according to their specifications, elements do not contain duplicate attributes, and any IDs are unique, except where the specifications allow these features. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/parsing.html" target="_blank">here</a>.</p>

    <div class="text-center">
      <p><b>Fulfill or not:</b> &nbsp;
        <input class="form-check-input" type="radio" name="r_parsing" id="r_parsing_yes" value="1" >
        <label class="form-check-label" for="r_parsing_yes">Yes</label>

        <input class="form-check-input" type="radio" name="r_parsing" id="r_parsing_no" value="0" required="">
        <label class="form-check-label" for="r_parsing_no">No</label>
      </p>
    </div>
    <!-- 4.1.1 -->

    <!-- 4.1.2 -->
    <h6>Success Criteria 4.1.2 Name, Role, Value</h6>
    <p>For all user interface components (including but not limited to: form elements, links and components generated by scripts), the name and role can be programmatically determined; states, properties, and values that can be set by the user can be programmatically set; and notification of changes to these items is available to user agents, including assistive technologies. For more information please click <a href="https://www.w3.org/WAI/WCAG21/Understanding/name-role-value.html" target="_blank">here</a>.</p>

    <div class="text-center">
      <p><b>Fulfill or not:</b> &nbsp;
        <input class="form-check-input" type="radio" name="r_name_role_value" id="r_name_role_value_yes" value="1" >
        <label class="form-check-label" for="r_name_role_value_yes">Yes</label>

        <input class="form-check-input" type="radio" name="r_name_role_value" id="r_name_role_value_no" value="0" required="">
        <label class="form-check-label" for="r_name_role_value_no">No</label>
      </p>
    </div>
    <!-- 4.1.1 -->

  </div> <!--  Compatible-->


  <hr class="solid">
  <div class="text-center p-2" style="font-size: 1.5em" >
    <b><label for="rank_rob">Rank of Robust: </label>
      <input type="number" name="rank_rob" id="rank_rob" min="1" max="10" style="text-align: center;"></b>
    </div>
    <p id="rob_suggested_rank" style="font-style: 1.0em" class="text-center"></p>
    <br>
  </div> <!-- Robust End-->



  <div class="col-12 text-center my-4">
    <button class="btn btn-primary" style="background-color: #53109C" type="submit" id="evaluate" name="evaluate">Evaluate</button>
  </div>
  <div class="btn-container"> 
    <button  class="btn_custom btn" type="button" onclick="previousPage(4, 3)">Previous</button>
  </div>

</div>




</form>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


  var standardRadio = document.getElementById("standard_scale_table");
  var adjustedRadio = document.getElementById("adjusted_scale_table");
  var perTableInputs = document.querySelectorAll(".table_per input[type='number']");
  var opeTableInputs = document.querySelectorAll(".table_ope input[type='number']");
  var undTableInputs = document.querySelectorAll(".table_und input[type='number']");
  var robTableInputs = document.querySelectorAll(".table_rob input[type='number']");
  var evaluateButton = document.getElementById("evaluate");

  $(document).ready(function() {
  // Load the standard.js script by default
  $.getScript('standard.js');

  standardRadio.addEventListener("change", function() {
    if (standardRadio.checked) {
      $.getScript('standard.js', function() {
        calculateCheckedRadioPer(); // Call the function after the script is reloaded
        calculateCheckedRadioOpe();
        calculateCheckedRadioUnd();
        calculateCheckedRadioRob();

      });
    }
  });

  adjustedRadio.addEventListener("change", function() {
    if (adjustedRadio.checked) {
      $.getScript('custom.js');
    }
  });


});
        // Get table element
        var table_per = document.querySelector(".table_per");
        var table_ope = document.querySelector(".table_ope");
        var table_und = document.querySelector(".table_und");
        var table_rob = document.querySelector(".table_rob");


        // Add event listeners to the radio buttons
        standardRadio.addEventListener("change", toggleTableVisibility);
        adjustedRadio.addEventListener("change", toggleTableVisibility);
        evaluateButton.addEventListener("click", validateTable);



         // Function to toggle the visibility of the table
         function toggleTableVisibility() {
           if (adjustedRadio.checked) {
           table_per.style.display = "flex"; // Show the table
           table_ope.style.display = "flex";
           table_und.style.display = "flex";
           table_rob.style.display = "flex";

           perTableInputs.forEach(function(input) {
            input.setAttribute("required", "required");
          });

           opeTableInputs.forEach(function(input) {
            input.setAttribute("required", "required");
          });

           undTableInputs.forEach(function(input) {
            input.setAttribute("required", "required");
          });

           robTableInputs.forEach(function(input) {
            input.setAttribute("required", "required");
          });



         } else {
           table_per.style.display = "none"; // Hide the table
           table_ope.style.display = "none";
           table_und.style.display = "none";
           table_rob.style.display = "none";

           perTableInputs.forEach(function(input) {
            input.removeAttribute("required");
          });

           opeTableInputs.forEach(function(input) {
            input.removeAttribute("required");
          });

           undTableInputs.forEach(function(input) {
            input.removeAttribute("required");
          });

           robTableInputs.forEach(function(input) {
            input.removeAttribute("required");
          });


         }
       }


       // Get the input elements

       // PERCEIVABLE TABLE
       var per_rankVeryHigh = document.getElementsByName('rank_per_very_high')[0];
       var per_rankHigh = document.getElementsByName('rank_per_high')[0];
       var per_rankModerate = document.getElementsByName('rank_per_moderate')[0];
       var per_rankLow = document.getElementsByName('rank_per_low')[0];
       var per_rankVeryLow = document.getElementsByName('rank_per_very_low')[0];
       var per_rankErrorMessage = document.getElementById('error_message_per_rank');

       var per_criteriaVeryHigh = document.getElementsByName('criteria_per_very_high')[0];
       var per_criteriaHigh = document.getElementsByName('criteria_per_high')[0];
       var per_criteriaModerate = document.getElementsByName('criteria_per_moderate')[0];
       var per_criteriaLow = document.getElementsByName('criteria_per_low')[0];
       var per_criteriaVeryLow = document.getElementsByName('criteria_per_very_low')[0];
       var per_criteriaErrorMessage = document.getElementById('error_message_per_criteria');
       console.log(typeof per_criteriaModerate);

       // Add event listeners to check the input values
       per_rankVeryHigh.addEventListener('change', function(){validate5Input(per_rankVeryHigh, per_rankHigh, per_rankModerate, per_rankLow, per_rankVeryLow, per_rankErrorMessage)});
       per_rankHigh.addEventListener('change',function(){validate5Input(per_rankVeryHigh, per_rankHigh, per_rankModerate, per_rankLow, per_rankVeryLow,per_rankErrorMessage)});
       per_rankModerate.addEventListener('change', function(){validate5Input(per_rankVeryHigh, per_rankHigh, per_rankModerate, per_rankLow, per_rankVeryLow , per_rankErrorMessage)});
       per_rankLow.addEventListener('change', function(){validate5Input(per_rankVeryHigh, per_rankHigh, per_rankModerate, per_rankLow, per_rankVeryLow , per_rankErrorMessage)});
       per_rankVeryLow.addEventListener('change', function(){validate5Input(per_rankVeryHigh, per_rankHigh, per_rankModerate, per_rankLow, per_rankVeryLow , per_rankErrorMessage)});

       per_criteriaVeryHigh.addEventListener('change', function(){validate5CriteriaInput(per_criteriaVeryHigh, per_criteriaHigh, per_criteriaModerate, per_criteriaLow , per_criteriaVeryLow, per_criteriaErrorMessage)});
       per_criteriaHigh.addEventListener('change', function(){validate5CriteriaInput(per_criteriaVeryHigh, per_criteriaHigh, per_criteriaModerate, per_criteriaLow , per_criteriaVeryLow, per_criteriaErrorMessage)});
       per_criteriaModerate.addEventListener('change', function(){validate5CriteriaInput(per_criteriaVeryHigh, per_criteriaHigh, per_criteriaModerate, per_criteriaLow , per_criteriaVeryLow, per_criteriaErrorMessage)});
       per_criteriaLow.addEventListener('change', function(){validate5CriteriaInput(per_criteriaVeryHigh, per_criteriaHigh, per_criteriaModerate, per_criteriaLow , per_criteriaVeryLow, per_criteriaErrorMessage)});
       per_criteriaVeryLow.addEventListener('change', function(){validate5CriteriaInput(per_criteriaVeryHigh, per_criteriaHigh, per_criteriaModerate, per_criteriaLow , per_criteriaVeryLow, per_criteriaErrorMessage)});


        // OPERABLE TABLE
        var ope_rankVeryHigh = document.getElementsByName('rank_ope_very_high')[0];
        var ope_rankHigh = document.getElementsByName('rank_ope_high')[0];
        var ope_rankModerate = document.getElementsByName('rank_ope_moderate')[0];
        var ope_rankLow = document.getElementsByName('rank_ope_low')[0];
        var ope_rankVeryLow = document.getElementsByName('rank_ope_very_low')[0];
        var ope_rankErrorMessage = document.getElementById('error_message_ope_rank');

        var ope_criteriaVeryHigh = document.getElementsByName('criteria_ope_very_high')[0];
        var ope_criteriaHigh = document.getElementsByName('criteria_ope_high')[0];
        var ope_criteriaModerate = document.getElementsByName('criteria_ope_moderate')[0];
        var ope_criteriaLow = document.getElementsByName('criteria_ope_low')[0];
        var ope_criteriaVeryLow = document.getElementsByName('criteria_ope_very_low')[0];
        var ope_criteriaErrorMessage = document.getElementById('error_message_ope_criteria');


         // Add event listeners to check the input values
         ope_rankVeryHigh.addEventListener('change', function(){validate5Input(ope_rankVeryHigh, ope_rankHigh, ope_rankModerate, ope_rankLow, ope_rankVeryLow, ope_rankErrorMessage)});
         ope_rankHigh.addEventListener('change',function(){validate5Input(ope_rankVeryHigh, ope_rankHigh, ope_rankModerate, ope_rankLow, ope_rankVeryLow,ope_rankErrorMessage)});
         ope_rankModerate.addEventListener('change', function(){validate5Input(ope_rankVeryHigh, ope_rankHigh, ope_rankModerate, ope_rankLow, ope_rankVeryLow , ope_rankErrorMessage)});
         ope_rankLow.addEventListener('change', function(){validate5Input(ope_rankVeryHigh, ope_rankHigh, ope_rankModerate, ope_rankLow, ope_rankVeryLow , ope_rankErrorMessage)});
         ope_rankVeryLow.addEventListener('change', function(){validate5Input(ope_rankVeryHigh, ope_rankHigh, ope_rankModerate, ope_rankLow, ope_rankVeryLow , ope_rankErrorMessage)});

         ope_criteriaVeryHigh.addEventListener('change', function(){validate5CriteriaInput(ope_criteriaVeryHigh, ope_criteriaHigh, ope_criteriaModerate, ope_criteriaLow , ope_criteriaVeryLow, ope_criteriaErrorMessage)});
         ope_criteriaHigh.addEventListener('change', function(){validate5CriteriaInput(ope_criteriaVeryHigh, ope_criteriaHigh, ope_criteriaModerate, ope_criteriaLow , ope_criteriaVeryLow, ope_criteriaErrorMessage)});
         ope_criteriaModerate.addEventListener('change', function(){validate5CriteriaInput(ope_criteriaVeryHigh, ope_criteriaHigh, ope_criteriaModerate, ope_criteriaLow , ope_criteriaVeryLow, ope_criteriaErrorMessage)});
         ope_criteriaLow.addEventListener('change', function(){validate5CriteriaInput(ope_criteriaVeryHigh, ope_criteriaHigh, ope_criteriaModerate, ope_criteriaLow , ope_criteriaVeryLow, ope_criteriaErrorMessage)});
         ope_criteriaVeryLow.addEventListener('change', function(){validate5CriteriaInput(ope_criteriaVeryHigh, ope_criteriaHigh, ope_criteriaModerate, ope_criteriaLow , ope_criteriaVeryLow, ope_criteriaErrorMessage)});


         // UNDERSTANDABLE TABLE
         var und_rankHigh = document.getElementsByName('rank_und_high')[0];
         var und_rankModerate = document.getElementsByName('rank_und_moderate')[0];
         var und_rankLow = document.getElementsByName('rank_und_low')[0];
         var und_rankErrorMessage = document.getElementById('error_message_und_rank');

         var und_criteriaHigh = document.getElementsByName('criteria_und_high')[0];
         var und_criteriaModerate = document.getElementsByName('criteria_und_moderate')[0];
         var und_criteriaLow = document.getElementsByName('criteria_und_low')[0];
         var und_criteriaErrorMessage = document.getElementById('error_message_und_criteria');


         // Add event listeners to check the input values
         und_rankHigh.addEventListener('change',function(){validate3Input(und_rankHigh, und_rankModerate, und_rankLow, und_rankErrorMessage)});
         und_rankModerate.addEventListener('change', function(){validate3Input(und_rankHigh, und_rankModerate, und_rankLow,und_rankErrorMessage)});
         und_rankLow.addEventListener('change', function(){validate3Input(und_rankHigh, und_rankModerate, und_rankLow,und_rankErrorMessage)});



         und_criteriaHigh.addEventListener('change', function(){validate3CriteriaInput( und_criteriaHigh, und_criteriaModerate, und_criteriaLow , und_criteriaErrorMessage)});
         und_criteriaModerate.addEventListener('change', function(){validate3CriteriaInput( und_criteriaHigh, und_criteriaModerate, und_criteriaLow , und_criteriaErrorMessage)});
         und_criteriaLow.addEventListener('change', function(){validate3CriteriaInput( und_criteriaHigh, und_criteriaModerate, und_criteriaLow , und_criteriaErrorMessage)});


           // ROBUST TABLE
           var rob_rankHigh = document.getElementsByName('rank_rob_high')[0];
           var rob_rankModerate = document.getElementsByName('rank_rob_moderate')[0];
           var rob_rankLow = document.getElementsByName('rank_rob_low')[0];
           var rob_rankErrorMessage = document.getElementById('error_message_rob_rank');

           var rob_criteriaHigh = document.getElementsByName('criteria_rob_high')[0];
           var rob_criteriaModerate = document.getElementsByName('criteria_rob_moderate')[0];
           var rob_criteriaLow = document.getElementsByName('criteria_rob_low')[0];
           var rob_criteriaErrorMessage = document.getElementById('error_message_rob_criteria');


         // Add event listeners to check the input values
         rob_rankHigh.addEventListener('change',function(){validate3Input(rob_rankHigh, rob_rankModerate, rob_rankLow, rob_rankErrorMessage)});
         rob_rankModerate.addEventListener('change', function(){validate3Input(rob_rankHigh, rob_rankModerate, rob_rankLow,rob_rankErrorMessage)});
         rob_rankLow.addEventListener('change', function(){validate3Input(rob_rankHigh, rob_rankModerate, rob_rankLow,rob_rankErrorMessage)});



         rob_criteriaHigh.addEventListener('change', function(){validate3CriteriaInput( rob_criteriaHigh, rob_criteriaModerate, rob_criteriaLow , rob_criteriaErrorMessage)});
         rob_criteriaModerate.addEventListener('change', function(){validate3CriteriaInput( rob_criteriaHigh, rob_criteriaModerate, rob_criteriaLow , rob_criteriaErrorMessage)});
         rob_criteriaLow.addEventListener('change', function(){validate3CriteriaInput( rob_criteriaHigh, rob_criteriaModerate, rob_criteriaLow , rob_criteriaErrorMessage)});



       // Function to validate the input values
       function validate5Input(rankVeryHigh, rankHigh, rankModerate, rankLow, rankVeryLow, message) {

        var ranks = [
        parseInt(rankVeryHigh.value),
        parseInt(rankHigh.value),
        parseInt(rankModerate.value),
        parseInt(rankLow.value),
        parseInt(rankVeryLow.value)
        ];

        for (var i = 1; i < ranks.length; i++) {
          if (ranks[i] <= ranks[i - 1]) {
            message.style.display = 'block';
            return;
          }
        }

        message.style.display = 'none';
      }

      function validate5CriteriaInput(criteriaVeryHigh, criteriaHigh, criteriaModerate, criteriaLow, rankcriteriaVeryLow, message) {

        var criterias = [
        parseInt(criteriaVeryHigh.value),
        parseInt(criteriaHigh.value),
        parseInt(criteriaModerate.value),
        parseInt(criteriaLow.value),
        parseInt(rankcriteriaVeryLow.value)
        ];

        for (var i = 1; i < criterias.length; i++) {
          if (criterias[i] >= criterias[i - 1]) {
            message.style.display = 'block';
            return;
          }
        }

        message.style.display = 'none';
      }


       // Function to validate the input values
       function validate3Input(rankHigh, rankModerate, rankLow, message) {

        var ranks = [
        parseInt(rankHigh.value),
        parseInt(rankModerate.value),
        parseInt(rankLow.value)
        ];

        for (var i = 1; i < ranks.length; i++) {
          if (ranks[i] <= ranks[i - 1]) {
            message.style.display = 'block';
            return;
          }
        }

        message.style.display = 'none';
      }

      function validate3CriteriaInput(criteriaHigh, criteriaModerate, criteriaLow, message) {

        var criterias = [
        parseInt(criteriaHigh.value),
        parseInt(criteriaModerate.value),
        parseInt(criteriaLow.value)
        ];

        for (var i = 1; i < criterias.length; i++) {
          if (criterias[i] >= criterias[i - 1]) {
            message.style.display = 'block';
            return;
          }
        }

        message.style.display = 'none';
      }



      function nextPage(currentPage, nextPage) {
        var currentInputs = document.querySelectorAll('#page' + currentPage + ' input[required]');
        var isValid = true;

        for (var i = 0; i < currentInputs.length; i++) {
          if (!currentInputs[i].value) {
            isValid = false;
            break;
          }
        }

        var radioGroups = document.querySelectorAll('#page' + currentPage + ' input[type="radio"][required]');
        for (var j = 0; j < radioGroups.length; j++) {
          var groupName = radioGroups[j].name;
          var checkedInputs = document.querySelectorAll('input[name="' + groupName + '"]:checked');
          if (checkedInputs.length === 0) {
            isValid = false;
            break;
          }
        }

        if(currentPage === 1){
          if(per_rankErrorMessage.style.display === "block"|| per_criteriaErrorMessage.style.display == "block" )
            isValid = false;
        }else if (currentPage == 2) {
         if(rob_rankErrorMessage.style.display === "block"|| rob_criteriaErrorMessage.style.display == "block" )
          isValid = false;
      }else if (currentPage == 3) {
       if(rob_rankErrorMessage.style.display === "block"|| rob_criteriaErrorMessage.style.display == "block" )
        isValid = false;
    }

    if (isValid) {
      document.getElementById('page' + currentPage).style.display = 'none';
      document.getElementById('page' + nextPage).style.display = 'block';
      window.location = '#top';
    } else {
     Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Please fill in all required fields and make sure there is no invalid input.',
    });
   }
 }


 function previousPage(currentPage, previousPage) {
  document.getElementById(`page${currentPage}`).style.display = 'none';
  document.getElementById(`page${previousPage}`).style.display = 'block';
  window.location = "#top";
}

function validateTable(){
  if(rob_rankErrorMessage.style.display === "block"|| rob_criteriaErrorMessage.style.display == "block"){
     event.preventDefault();
     Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Please fill in all required fields and make sure there is no invalid input.',
    });
  }
}


</script>


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

