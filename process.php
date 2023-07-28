<?php 

include_once 'database.php';
require 'accessibility_level.php';
session_start();


if(isset($_POST['evaluate'])){

  try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin transaction
    $conn->beginTransaction();

    // Perceivable

    $stmt1 = $conn->prepare("INSERT INTO fyp_tbl_perceivable(fld_user_id, fld_non_text_content, fld_audio_only_and_video_only, fld_captions, fld_audio_description_or_media_alternative, fld_info_and_relationships, fld_meaningful_sequence, fld_sensory_characteristics, fld_use_of_color, fld_audio_control) VALUES (:p_uid, :non_text_content, :audio_only_and_video_only, :captions, :audio_description_or_media_alternative, :info_and_relationships, :meaningful_sequence, :sensory_characteristics, :use_of_color, :audio_control)");

    $stmt1->bindParam(':p_uid', $uid, PDO::PARAM_STR);
    $stmt1->bindParam(':non_text_content',$non_text_content, PDO::PARAM_INT);
    $stmt1->bindParam(':audio_only_and_video_only',$audio_only_and_video_only, PDO::PARAM_INT);
    $stmt1->bindParam(':captions',$captions, PDO::PARAM_INT);
    $stmt1->bindParam(':audio_description_or_media_alternative',$audio_description_or_media_alternative, PDO::PARAM_INT);
    $stmt1->bindParam(':info_and_relationships',$info_and_relationships, PDO::PARAM_INT);
    $stmt1->bindParam(':meaningful_sequence',$meaningful_sequence, PDO::PARAM_INT);
    $stmt1->bindParam(':sensory_characteristics',$sensory_characteristics, PDO::PARAM_INT);
    $stmt1->bindParam(':use_of_color',$use_of_color, PDO::PARAM_INT);
    $stmt1->bindParam(':audio_control',$audio_control, PDO::PARAM_INT);


    $id = uniqid('U', true);
    $uid = $id;
    $non_text_content = intval($_POST['p_non_text_content']);
    $audio_only_and_video_only = intval($_POST['p_audio_only_and_video_only']);
    $captions = intval($_POST['p_captions']);
    $audio_description_or_media_alternative = intval($_POST['p_audio_description_or_media_alternative']);
    $info_and_relationships = intval($_POST['p_info_and_relationships']);
    $meaningful_sequence = intval($_POST['p_meaningful_sequence']);
    $sensory_characteristics = intval($_POST['p_sensory_characteristics']);
    $use_of_color = intval($_POST['p_use_of_color']);
    $audio_control = intval($_POST['p_audio_control']);

    $stmt1->execute();


    $total_perceivable = $non_text_content + $audio_only_and_video_only + $captions + $audio_description_or_media_alternative + $info_and_relationships + $meaningful_sequence + $sensory_characteristics + $use_of_color + $audio_control;


    //  Operable
    $stmt2 = $conn->prepare("INSERT INTO fyp_tbl_operable(fld_user_id, fld_keyboard, fld_no_keyboard_trap, fld_character_key_shortcuts, fld_timing_adjustable, fld_pause_stop_hide, fld_three_flashes_or_below_threshold, fld_bypass_blocks, fld_page_titled, fld_focus_order, fld_link_purpose, fld_pointer_gestures, fld_pointer_cancellation, fld_label_in_name, fld_motion_actuation) VALUES (:o_uid, :keyboard, :no_keybord_trap, :character_key_shortcuts, :timing_adjustable, :pause_stop_hide, :three_flashes_or_below_threshold, :bypass_blocks, :page_titled, :focus_order, :link_purpose, :pointer_gestures, :pointer_cancellation, :label_in_name, :motion_actuation)");


    $stmt2->bindParam(':o_uid', $uid, PDO::PARAM_STR);
    $stmt2->bindParam(':keyboard',$keyboard, PDO::PARAM_INT);
    $stmt2->bindParam(':no_keybord_trap',$no_keybord_trap, PDO::PARAM_INT);
    $stmt2->bindParam(':character_key_shortcuts',$character_key_shortcuts, PDO::PARAM_INT);
    $stmt2->bindParam(':timing_adjustable',$timing_adjustable, PDO::PARAM_INT);
    $stmt2->bindParam(':pause_stop_hide',$pause_stop_hide, PDO::PARAM_INT);
    $stmt2->bindParam(':three_flashes_or_below_threshold',$three_flashes_or_below_threshold, PDO::PARAM_INT);
    $stmt2->bindParam(':bypass_blocks',$bypass_blocks, PDO::PARAM_INT);
    $stmt2->bindParam(':page_titled',$page_titled, PDO::PARAM_INT);
    $stmt2->bindParam(':focus_order',$focus_order, PDO::PARAM_INT);
    $stmt2->bindParam(':link_purpose',$link_purpose, PDO::PARAM_INT);
    $stmt2->bindParam(':pointer_gestures',$pointer_gestures, PDO::PARAM_INT);
    $stmt2->bindParam(':pointer_cancellation',$pointer_cancellation, PDO::PARAM_INT);
    $stmt2->bindParam(':label_in_name',$label_in_name, PDO::PARAM_INT);
    $stmt2->bindParam(':motion_actuation',$motion_actuation, PDO::PARAM_INT);


    $keyboard = $_POST['o_keyboard'];
    $no_keybord_trap = $_POST['o_no_keyboard_trap'];
    $character_key_shortcuts = $_POST['o_character_key_shortcuts'];
    $timing_adjustable = $_POST['o_timing_adjustable'];
    $pause_stop_hide = $_POST['o_pause_stop_hide'];
    $three_flashes_or_below_threshold = $_POST['o_three_flashes_or_below_threshold'];
    $bypass_blocks = $_POST['o_bypass_blocks'];
    $page_titled = $_POST['o_page_titled'];
    $focus_order = $_POST['o_focus_order'];
    $link_purpose = $_POST['o_link_purpose'];
    $pointer_gestures = $_POST['o_pointer_gestures'];
    $pointer_cancellation = $_POST['o_pointer_cancellation'];
    $label_in_name = $_POST['o_label_in_name'];
    $motion_actuation = $_POST['o_motion_actuation'];

    $stmt2->execute();

    $total_operable = $keyboard + $no_keybord_trap + $character_key_shortcuts + $timing_adjustable + $pause_stop_hide + $three_flashes_or_below_threshold + $bypass_blocks + $page_titled + $focus_order + $link_purpose + $pointer_gestures + $pointer_cancellation + $label_in_name + $motion_actuation;


    //  Understandable

    $stmt3 = $conn->prepare("INSERT INTO fyp_tbl_understandable(fld_user_id, fld_language_of_page, fld_on_focus, fld_on_input, fld_error_identification, fld_labels_or_instruction) VALUES (:u_uid, :language_of_page, :on_focus, :on_input, :error_identification, :labels_or_instruction)");

    $stmt3->bindParam(':u_uid', $uid, PDO::PARAM_STR);
    $stmt3->bindParam(':language_of_page',$language_of_page, PDO::PARAM_INT);
    $stmt3->bindParam(':on_focus',$on_focus, PDO::PARAM_INT);
    $stmt3->bindParam(':on_input',$on_input, PDO::PARAM_INT);
    $stmt3->bindParam(':error_identification',$error_identification, PDO::PARAM_INT);
    $stmt3->bindParam(':labels_or_instruction',$labels_or_instruction, PDO::PARAM_INT);

    $language_of_page = $_POST['u_language_of_page'];
    $on_focus = $_POST['u_on_focus'];
    $on_input = $_POST['u_on_input'];
    $error_identification = $_POST['u_error_identification'];
    $labels_or_instruction = $_POST['u_labels_or_instruction'];

    $stmt3->execute();

    $total_understandable = $language_of_page + $on_focus + $on_input + $error_identification + $labels_or_instruction;


    //  Robust
    // $conn->commit();
    $stmt4 = $conn->prepare("INSERT INTO fyp_tbl_robust(fld_user_id, fld_parsing, fld_name_role_value) VALUES (:r_uid, :parsing, :name_role_value)");

    $stmt4->bindParam(':r_uid', $ruid, PDO::PARAM_STR);
    $stmt4->bindParam(':parsing',$parsing, PDO::PARAM_INT);
    $stmt4->bindParam(':name_role_value',$name_role_value, PDO::PARAM_INT);

    $ruid = $id;
    $parsing = intval($_POST['r_parsing']);
    $name_role_value = intval($_POST['r_name_role_value']);

    $stmt4->execute();

    $total_robust = $parsing + $name_role_value;

    // User

    $rank_per = $_POST['rank_per'];
    $rank_ope = $_POST['rank_ope'];
    $rank_und = $_POST['rank_und'];
    $rank_rob = $_POST['rank_rob'];

    $output = accessibility_level($rank_und, $rank_rob, $rank_per, $rank_ope);

    $stmt5 = $conn->prepare("INSERT INTO fyp_tbl_user(fld_user_id, fld_rule, fld_perceivable, fld_operable, fld_understandable, fld_robust, fld_accessibility) VALUES (:u_uid, :rule, :perceivable, :operable, :understandable, :robust, :accessibility)");
    $stmt5->bindParam(':u_uid', $uid, PDO::PARAM_STR);
    $stmt5->bindParam(':rule', $rule, PDO::PARAM_STR);
    $stmt5->bindParam(':perceivable', $rank_per, PDO::PARAM_INT);
    $stmt5->bindParam(':operable', $rank_ope, PDO::PARAM_INT);
    $stmt5->bindParam(':understandable', $rank_und, PDO::PARAM_INT);
    $stmt5->bindParam(':robust', $rank_rob, PDO::PARAM_INT);
    $stmt5->bindParam(':accessibility', $output, PDO::PARAM_STR);

    $rule = $_POST['scale_table'];

    $stmt5->execute();

    if($rule == "adjusted" ){

        $stmt6 = $conn->prepare("INSERT INTO fyp_tbl_per_rule(fld_user_id, fld_per_rankVeryHigh, fld_per_rankHigh, fld_per_rankModerate, fld_per_rankLow, fld_per_rankVeryLow, fld_per_criteriaVeryHigh, fld_per_criteriaHigh, fld_per_criteriaModerate, fld_per_criteriaLow, fld_per_criteriaVeryLow  ) VALUES (:ap_uid, :per_rankVeryHigh, :per_rankHigh, :per_rankModerate, :per_rankLow, :per_rankVeryLow, :per_criteriaVeryHigh, :per_criteriaHigh, :per_criteriaModerate, :per_criteriaLow, :per_criteriaVeryLow)");

        $stmt6->bindParam(':ap_uid', $ap_uid, PDO::PARAM_STR);
        $stmt6->bindParam(':per_rankVeryHigh', $per_rankVeryHigh, PDO::PARAM_INT);
        $stmt6->bindParam(':per_rankHigh', $per_rankHigh, PDO::PARAM_INT);
        $stmt6->bindParam(':per_rankModerate', $per_rankModerate, PDO::PARAM_INT);
        $stmt6->bindParam(':per_rankLow', $per_rankLow, PDO::PARAM_INT);
        $stmt6->bindParam(':per_rankVeryLow', $per_rankVeryLow, PDO::PARAM_INT);
        $stmt6->bindParam(':per_criteriaVeryHigh', $per_criteriaVeryHigh, PDO::PARAM_INT);
        $stmt6->bindParam(':per_criteriaHigh', $per_criteriaHigh, PDO::PARAM_INT);
        $stmt6->bindParam(':per_criteriaModerate', $per_criteriaModerate, PDO::PARAM_INT);
        $stmt6->bindParam(':per_criteriaLow', $per_criteriaLow, PDO::PARAM_INT);
        $stmt6->bindParam(':per_criteriaVeryLow', $per_criteriaVeryLow, PDO::PARAM_INT);

        $ap_uid = $id;
        $per_rankVeryHigh = $_POST['rank_per_very_high'];
        $per_rankHigh = $_POST['rank_per_high'];
        $per_rankModerate = $_POST['rank_per_moderate'];
        $per_rankLow = $_POST['rank_per_low'];
        $per_rankVeryLow = $_POST['rank_per_very_low'];
        $per_criteriaVeryHigh = $_POST['criteria_per_very_high'];
        $per_criteriaHigh = $_POST['criteria_per_high'];
        $per_criteriaModerate = $_POST['criteria_per_moderate'];
        $per_criteriaLow = $_POST['criteria_per_low'];
        $per_criteriaVeryLow = $_POST['criteria_per_very_low'];

        $stmt6->execute();


        // Operable
        $stmt7 = $conn->prepare("INSERT INTO fyp_tbl_ope_rule(fld_user_id, fld_ope_rankVeryHigh, fld_ope_rankHigh, fld_ope_rankModerate, fld_ope_rankLow, fld_ope_rankVeryLow, fld_ope_criteriaVeryHigh, fld_ope_criteriaHigh, fld_ope_criteriaModerate, fld_ope_criteriaLow, fld_ope_criteriaVeryLow  ) VALUES (:ao_uid, :ope_rankVeryHigh, :ope_rankHigh, :ope_rankModerate, :ope_rankLow, :ope_rankVeryLow, :ope_criteriaVeryHigh, :ope_criteriaHigh, :ope_criteriaModerate, :ope_criteriaLow, :ope_criteriaVeryLow)");

        $stmt7->bindParam(':ao_uid', $ao_uid, PDO::PARAM_STR);
        $stmt7->bindParam(':ope_rankVeryHigh', $ope_rankVeryHigh, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_rankHigh', $ope_rankHigh, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_rankModerate', $ope_rankModerate, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_rankLow', $ope_rankLow, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_rankVeryLow', $ope_rankVeryLow, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_criteriaVeryHigh', $ope_criteriaVeryHigh, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_criteriaHigh', $ope_criteriaHigh, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_criteriaModerate', $ope_criteriaModerate, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_criteriaLow', $ope_criteriaLow, PDO::PARAM_INT);
        $stmt7->bindParam(':ope_criteriaVeryLow', $ope_criteriaVeryLow, PDO::PARAM_INT);



        $ao_uid = $id;
        $ope_rankVeryHigh = $_POST['rank_ope_very_high'];
        $ope_rankHigh = $_POST['rank_ope_high'];
        $ope_rankModerate = $_POST['rank_ope_moderate'];
        $ope_rankLow = $_POST['rank_ope_low'];
        $ope_rankVeryLow = $_POST['rank_ope_very_low'];
        $ope_criteriaVeryHigh = $_POST['criteria_ope_very_high'];
        $ope_criteriaHigh = $_POST['criteria_ope_high'];
        $ope_criteriaModerate = $_POST['criteria_ope_moderate'];
        $ope_criteriaLow = $_POST['criteria_ope_low'];
        $ope_criteriaVeryLow = $_POST['criteria_ope_very_low'];

        $stmt7->execute();

        // Understandable
        $stmt8 = $conn->prepare("INSERT INTO fyp_tbl_und_rule(fld_user_id, fld_und_rankHigh, fld_und_rankModerate, fld_und_rankLow, fld_und_criteriaHigh, fld_und_criteriaModerate, fld_und_criteriaLow  ) VALUES (:ou_uid, :und_rankHigh, :und_rankModerate, :und_rankLow, :und_criteriaHigh, :und_criteriaModerate, :und_criteriaLow)");

        $stmt8->bindParam(':ou_uid', $ou_uid, PDO::PARAM_STR);
        $stmt8->bindParam(':und_rankHigh', $und_rankHigh, PDO::PARAM_INT);
        $stmt8->bindParam(':und_rankModerate', $und_rankModerate, PDO::PARAM_INT);
        $stmt8->bindParam(':und_rankLow', $und_rankLow, PDO::PARAM_INT);
        $stmt8->bindParam(':und_criteriaHigh', $und_criteriaHigh, PDO::PARAM_INT);
        $stmt8->bindParam(':und_criteriaModerate', $und_criteriaModerate, PDO::PARAM_INT);
        $stmt8->bindParam(':und_criteriaLow', $und_criteriaLow, PDO::PARAM_INT);


        $ou_uid = $id;
        $und_rankHigh = $_POST['rank_und_high'];
        $und_rankModerate = $_POST['rank_und_moderate'];
        $und_rankLow = $_POST['rank_und_low'];
        $und_criteriaHigh = $_POST['criteria_und_high'];
        $und_criteriaModerate = $_POST['criteria_und_moderate'];
        $und_criteriaLow = $_POST['criteria_und_low'];

        $stmt8->execute();





        // Robust
        $stmt9 = $conn->prepare("INSERT INTO fyp_tbl_rob_rule(fld_user_id, fld_rob_rankHigh, fld_rob_rankModerate, fld_rob_rankLow, fld_rob_criteriaHigh, fld_rob_criteriaModerate, fld_rob_criteriaLow  ) VALUES (:or_uid, :rob_rankHigh, :rob_rankModerate, :rob_rankLow, :rob_criteriaHigh, :rob_criteriaModerate, :rob_criteriaLow)");

        $stmt9->bindParam(':or_uid', $or_uid, PDO::PARAM_STR);
        $stmt9->bindParam(':rob_rankHigh', $rob_rankHigh, PDO::PARAM_INT);
        $stmt9->bindParam(':rob_rankModerate', $rob_rankModerate, PDO::PARAM_INT);
        $stmt9->bindParam(':rob_rankLow', $rob_rankLow, PDO::PARAM_INT);
        $stmt9->bindParam(':rob_criteriaHigh', $rob_criteriaHigh, PDO::PARAM_INT);
        $stmt9->bindParam(':rob_criteriaModerate', $rob_criteriaModerate, PDO::PARAM_INT);
        $stmt9->bindParam(':rob_criteriaLow', $rob_criteriaLow, PDO::PARAM_INT);


        $or_uid = $id;
        $rob_rankHigh = $_POST['rank_rob_high'];
        $rob_rankModerate = $_POST['rank_rob_moderate'];
        $rob_rankLow = $_POST['rank_rob_low'];
        $rob_criteriaHigh = $_POST['criteria_rob_high'];
        $rob_criteriaModerate = $_POST['criteria_rob_moderate'];
        $rob_criteriaLow = $_POST['criteria_rob_low'];

        $stmt9->execute();

    }

    $conn->commit();

    $_SESSION["user"] = $id;
    header("Location: result.php");





}catch(PDOException $e){

    $conn->rollback();
    echo "Error: ". $e->getMessage();
}



}

$conn = null;
?>