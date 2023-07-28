
// PERCEIVABLE
var rb_per_1 = document.getElementsByName("p_non_text_content");
var rb_per_2 = document.getElementsByName("p_audio_only_and_video_only");
var rb_per_3 = document.getElementsByName("p_captions");
var rb_per_4 = document.getElementsByName("p_audio_description_or_media_alternative");
var rb_per_5 = document.getElementsByName("p_info_and_relationships");
var rb_per_6 = document.getElementsByName("p_meaningful_sequence");
var rb_per_7 = document.getElementsByName("p_sensory_characteristics");
var rb_per_8 = document.getElementsByName("p_use_of_color");
var rb_per_9 = document.getElementsByName("p_audio_control");


var per_container = document.getElementById("per_suggested_rank");

for (var i = 0; i < rb_per_1.length; i++) {
  rb_per_1[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_2.length; i++) {
  rb_per_2[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_3.length; i++) {
  rb_per_3[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_4.length; i++) {
  rb_per_4[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_5.length; i++) {
  rb_per_5[i].addEventListener("change", calculateCheckedRadioPer);
}


for (var i = 0; i < rb_per_6.length; i++) {
  rb_per_6[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_6.length; i++) {
  rb_per_6[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_7.length; i++) {
  rb_per_7[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_8.length; i++) {
  rb_per_8[i].addEventListener("change", calculateCheckedRadioPer);
}

for (var i = 0; i < rb_per_9.length; i++) {
  rb_per_9[i].addEventListener("change", calculateCheckedRadioPer);
}



function calculateCheckedRadioPer() {
  var selectedValue_per1 = 0;
  var selectedValue_per2 = 0;
  var selectedValue_per3 = 0;
  var selectedValue_per4 = 0;
  var selectedValue_per5 = 0;
  var selectedValue_per6 = 0;
  var selectedValue_per7 = 0;
  var selectedValue_per8 = 0;
  var selectedValue_per9 = 0;



  var per_input_element = document.getElementById('rank_per');

  for (var i = 0; i < rb_per_1.length; i++) {
    if (rb_per_1[i].checked) {
      selectedValue_per1 = parseInt(rb_per_1[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_per_2.length; i++) {
    if (rb_per_2[i].checked) {
      selectedValue_per2 = parseInt(rb_per_2[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_per_3.length; i++) {
    if (rb_per_3[i].checked) {
      selectedValue_per3 = parseInt(rb_per_3[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_per_4.length; i++) {
    if (rb_per_4[i].checked) {
      selectedValue_per4 = parseInt(rb_per_4[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_per_5.length; i++) {
    if (rb_per_5[i].checked) {
      selectedValue_per5 = parseInt(rb_per_5[i].value);
      break;
    }
  }

    for (var i = 0; i < rb_per_6.length; i++) {
    if (rb_per_6[i].checked) {
      selectedValue_per6 = parseInt(rb_per_6[i].value);
      break;
    }
  }

    for (var i = 0; i < rb_per_7.length; i++) {
    if (rb_per_7[i].checked) {
      selectedValue_per7 = parseInt(rb_per_7[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_per_8.length; i++) {
    if (rb_per_8[i].checked) {
      selectedValue_per8 = parseInt(rb_per_8[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_per_9.length; i++) {
    if (rb_per_9[i].checked) {
      selectedValue_per9 = parseInt(rb_per_9[i].value);
      break;
    }
  }


  let result_per = selectedValue_per1 + selectedValue_per2 + selectedValue_per3 +selectedValue_per4 +selectedValue_per5 +selectedValue_per6 +selectedValue_per7 +selectedValue_per8 +selectedValue_per9;
  let resultP = ""; // Initialize the result variable



  // Example calculation
  if (result_per >= 8) {
    resultP = "(Suggested Rank 1-2)";
    per_input_element.min = 1;
    per_input_element.max = 2;
    per_input_element.value = 1;

  } else if (result_per >= 6) {
    resultP = "(Suggested Rank 3-4)";
    per_input_element.min = 3;
    per_input_element.max = 4;
    per_input_element.value = 3;

  } else if (result_per >= 3){
    resultP = "(Suggested Rank 5-7)";
    per_input_element.min = 5;
    per_input_element.max = 7;
    per_input_element.value = 5;

  }else if(result_per >= 1){
    resultP = "(Suggested Rank 8-9)";
    per_input_element.min = 8;
    per_input_element.max = 9;
    per_input_element.value = 8;

  }else {
    resultP = "(Suggested Rank 10)";
    per_input_element.min = 10;
    per_input_element.max = 10;
    per_input_element.value = 10;
  }

  // Display the result on the page
  per_container.textContent = resultP;
}



// OPERABLE
var rb_ope_1 = document.getElementsByName("o_keyboard");
var rb_ope_2 = document.getElementsByName("o_no_keyboard_trap");
var rb_ope_3 = document.getElementsByName("o_character_key_shortcuts");
var rb_ope_4 = document.getElementsByName("o_timing_adjustable");
var rb_ope_5 = document.getElementsByName("o_pause_stop_hide");
var rb_ope_6 = document.getElementsByName("o_three_flashes_or_below_threshold");
var rb_ope_7 = document.getElementsByName("o_bypass_blocks");
var rb_ope_8 = document.getElementsByName("o_page_titled");
var rb_ope_9 = document.getElementsByName("o_focus_order");
var rb_ope_10 = document.getElementsByName("o_link_purpose");
var rb_ope_11 = document.getElementsByName("o_pointer_gestures");
var rb_ope_12 = document.getElementsByName("o_pointer_cancellation");
var rb_ope_13 = document.getElementsByName("o_label_in_name");
var rb_ope_14 = document.getElementsByName("o_motion_actuation");


var ope_container = document.getElementById("ope_suggested_rank");

for (var i = 0; i < rb_ope_1.length; i++) {
  rb_ope_1[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_2.length; i++) {
  rb_ope_2[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_3.length; i++) {
  rb_ope_3[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_4.length; i++) {
  rb_ope_4[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_5.length; i++) {
  rb_ope_5[i].addEventListener("change", calculateCheckedRadioOpe);
}


for (var i = 0; i < rb_ope_6.length; i++) {
  rb_ope_6[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_6.length; i++) {
  rb_ope_6[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_7.length; i++) {
  rb_ope_7[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_8.length; i++) {
  rb_ope_8[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_9.length; i++) {
  rb_ope_9[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_10.length; i++) {
  rb_ope_10[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_11.length; i++) {
  rb_ope_11[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_12.length; i++) {
  rb_ope_12[i].addEventListener("change", calculateCheckedRadioOpe);
}


for (var i = 0; i < rb_ope_13.length; i++) {
  rb_ope_13[i].addEventListener("change", calculateCheckedRadioOpe);
}

for (var i = 0; i < rb_ope_14.length; i++) {
  rb_ope_14[i].addEventListener("change", calculateCheckedRadioOpe);
}




function calculateCheckedRadioOpe() {
  var selectedValue_ope1 = 0;
  var selectedValue_ope2 = 0;
  var selectedValue_ope3 = 0;
  var selectedValue_ope4 = 0;
  var selectedValue_ope5 = 0;
  var selectedValue_ope6 = 0;
  var selectedValue_ope7 = 0;
  var selectedValue_ope8 = 0;
  var selectedValue_ope9 = 0;
  var selectedValue_ope10 = 0;
  var selectedValue_ope11 = 0;
  var selectedValue_ope12 = 0;
  var selectedValue_ope13 = 0;
  var selectedValue_ope14 = 0;



  var ope_input_element = document.getElementById('rank_ope');

  for (var i = 0; i < rb_ope_1.length; i++) {
    if (rb_ope_1[i].checked) {
      selectedValue_ope1 = parseInt(rb_ope_1[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_2.length; i++) {
    if (rb_ope_2[i].checked) {
      selectedValue_ope2 = parseInt(rb_ope_2[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_ope_3.length; i++) {
    if (rb_ope_3[i].checked) {
      selectedValue_ope3 = parseInt(rb_ope_3[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_ope_4.length; i++) {
    if (rb_ope_4[i].checked) {
      selectedValue_ope4 = parseInt(rb_ope_4[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_ope_5.length; i++) {
    if (rb_ope_5[i].checked) {
      selectedValue_ope5 = parseInt(rb_ope_5[i].value);
      break;
    }
  }

    for (var i = 0; i < rb_ope_6.length; i++) {
    if (rb_ope_6[i].checked) {
      selectedValue_ope6 = parseInt(rb_ope_6[i].value);
      break;
    }
  }

    for (var i = 0; i < rb_ope_7.length; i++) {
    if (rb_ope_7[i].checked) {
      selectedValue_ope7 = parseInt(rb_ope_7[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_8.length; i++) {
    if (rb_ope_8[i].checked) {
      selectedValue_ope8 = parseInt(rb_ope_8[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_9.length; i++) {
    if (rb_ope_9[i].checked) {
      selectedValue_ope9 = parseInt(rb_ope_9[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_10.length; i++) {
    if (rb_ope_10[i].checked) {
      selectedValue_ope10 = parseInt(rb_ope_10[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_11.length; i++) {
    if (rb_ope_11[i].checked) {
      selectedValue_ope11 = parseInt(rb_ope_11[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_12.length; i++) {
    if (rb_ope_12[i].checked) {
      selectedValue_ope12 = parseInt(rb_ope_12[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_13.length; i++) {
    if (rb_ope_13[i].checked) {
      selectedValue_ope13 = parseInt(rb_ope_13[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_ope_14.length; i++) {
    if (rb_ope_14[i].checked) {
      selectedValue_ope14 = parseInt(rb_ope_14[i].value);
      break;
    }
  }

  let result_ope = selectedValue_ope1 + selectedValue_ope2 + selectedValue_ope3 +selectedValue_ope4 +selectedValue_ope5 +selectedValue_ope6 +selectedValue_ope7 +selectedValue_ope8 +selectedValue_ope9 +selectedValue_ope10 +selectedValue_ope11 +selectedValue_ope12 +selectedValue_ope13 +selectedValue_ope14;
  let resultO = ""; // Initialize the result variable



  // Example calculation
  if (result_ope >= 11) {
    resultO = "(Suggested Rank 1-2)";
    ope_input_element.min = 1;
    ope_input_element.max = 2;
    ope_input_element.value = 1;

  } else if (result_ope >= 8) {
    resultO = "(Suggested Rank 3-4)";
    ope_input_element.min = 3;
    ope_input_element.max = 4;
    ope_input_element.value = 3;

  } else if (result_ope >= 5){
    resultO = "(Suggested Rank 5-7)";
    ope_input_element.min = 5;
    ope_input_element.max = 7;
    ope_input_element.value = 5;

  }else if(result_ope >= 1){
    resultO = "(Suggested Rank 8-9)";
    ope_input_element.min = 8;
    ope_input_element.max = 9;
    ope_input_element.value = 8;

  }else {
    resultO = "(Suggested Rank 10)";
    ope_input_element.min = 10;
    ope_input_element.max = 10;
    ope_input_element.value = 10;
  }

  // Display the result on the page
  ope_container.textContent = resultO;
}



// UNDERSTANDABLE
var rb_und_1 = document.getElementsByName("u_language_of_page");
var rb_und_2 = document.getElementsByName("u_on_focus");
var rb_und_3 = document.getElementsByName("u_on_input");
var rb_und_4 = document.getElementsByName("u_error_identification");
var rb_und_5 = document.getElementsByName("u_labels_or_instruction");
var und_container = document.getElementById("und_suggested_rank");

for (var i = 0; i < rb_und_1.length; i++) {
  rb_und_1[i].addEventListener("change", calculateCheckedRadioUnd);
}

for (var i = 0; i < rb_und_2.length; i++) {
  rb_und_2[i].addEventListener("change", calculateCheckedRadioUnd);
}

for (var i = 0; i < rb_und_3.length; i++) {
  rb_und_3[i].addEventListener("change", calculateCheckedRadioUnd);
}

for (var i = 0; i < rb_und_4.length; i++) {
  rb_und_4[i].addEventListener("change", calculateCheckedRadioUnd);
}

for (var i = 0; i < rb_und_5.length; i++) {
  rb_und_5[i].addEventListener("change", calculateCheckedRadioUnd);
}

function calculateCheckedRadioUnd() {
  var selectedValue_und1 = 0;
  var selectedValue_und2 = 0;
  var selectedValue_und3 = 0;
  var selectedValue_und4 = 0;
  var selectedValue_und5 = 0;

  var und_input_element = document.getElementById('rank_und');

  for (var i = 0; i < rb_und_1.length; i++) {
    if (rb_und_1[i].checked) {
      selectedValue_und1 = parseInt(rb_und_1[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_und_2.length; i++) {
    if (rb_und_2[i].checked) {
      selectedValue_und2 = parseInt(rb_und_2[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_und_3.length; i++) {
    if (rb_und_3[i].checked) {
      selectedValue_und3 = parseInt(rb_und_3[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_und_4.length; i++) {
    if (rb_und_4[i].checked) {
      selectedValue_und4 = parseInt(rb_und_4[i].value);
      break;
    }
  }


  for (var i = 0; i < rb_und_5.length; i++) {
    if (rb_und_5[i].checked) {
      selectedValue_und5 = parseInt(rb_und_5[i].value);
      break;
    }
  }

  let result_und = selectedValue_und1 + selectedValue_und2 + selectedValue_und3 +selectedValue_und4 +selectedValue_und5;
  let resultU = ""; // Initialize the result variable



  // Example calculation
  if (result_und >= 4) {
    resultU = "(Suggested Rank 1-3)";
    und_input_element.min = 1;
    und_input_element.max = 3;
    und_input_element.value = 1;

  } else if (result_und >= 1) {
    resultU = "(Suggested Rank 4-8)";
    und_input_element.min = 4;
    und_input_element.max = 8;
    und_input_element.value = 4;

  } else {
    resultU = "(Suggested Rank 9-10)";
    und_input_element.min = 9;
    und_input_element.max = 10;
    und_input_element.value = 9;
  }

  // Display the result on the page
  und_container.textContent = resultU;
}



// ROBUST
var rb_rob_1 = document.getElementsByName("r_parsing");
var rb_rob_2 = document.getElementsByName("r_name_role_value");
var rob_container = document.getElementById("rob_suggested_rank");

for (var i = 0; i < rb_rob_1.length; i++) {
  rb_rob_1[i].addEventListener("change", calculateCheckedRadioRob);
}

for (var i = 0; i < rb_rob_2.length; i++) {
  rb_rob_2[i].addEventListener("change", calculateCheckedRadioRob);
}

function calculateCheckedRadioRob() {
  var selectedValue_rob1 = 0;
  var selectedValue_rob2 = 0;
  var rob_input_element = document.getElementById('rank_rob');

  for (var i = 0; i < rb_rob_1.length; i++) {
    if (rb_rob_1[i].checked) {
      selectedValue_rob1 = parseInt(rb_rob_1[i].value);
      break;
    }
  }

  for (var i = 0; i < rb_rob_2.length; i++) {
    if (rb_rob_2[i].checked) {
      selectedValue_rob2 = parseInt(rb_rob_2[i].value);
      break;
    }
  }

  let result_rob = selectedValue_rob1 + selectedValue_rob2;
  let result = ""; // Initialize the result variable



  // Example calculation
  if (result_rob == 2) {
    result = "(Suggested Rank 1-3)";
    rob_input_element.min = 1;
    rob_input_element.max = 3;
    rob_input_element.value = 1;

  } else if (result_rob == 1) {
    result = "(Suggested Rank 4-8)";
    rob_input_element.min = 4;
    rob_input_element.max = 8;
    rob_input_element.value = 4;

  } else {
    result = "(Suggested Rank 9-10)";
    rob_input_element.min = 9;
    rob_input_element.max = 10;
    rob_input_element.value = 9;
  }

  // Display the result on the page
  rob_container.textContent = result;
}
