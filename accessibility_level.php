<?php 

function accessibility_level($und, $rob, $per, $ope) {

  $und1 = trapmf($und, [-3.5, 1, 1, 5.5]);
  $und2=trapmf($und,[1, 5.5, 5.5, 10]);
  $und3=trapmf($und,[5.5, 10, 10, 14.5]);
  $understandableArray = array(
    array($und1),
    array($und2),
    array($und3)
  );

  $rob1=trapmf($rob,[-3.5, 1, 1, 5.5]);
  $rob2=trapmf($rob,[1, 5.5, 5.5, 10]);
  $rob3=trapmf($rob,[5.5, 10, 10, 14.5]);
  $robustArray = array(
    array($rob1),
    array($rob2),
    array($rob3)
  );

  $per1=trapmf($per,[-1.25, 1, 1, 3.25]);
  $per2=trapmf($per,[1, 3.25, 3.25, 5.5]);
  $per3=trapmf($per,[3.25, 5.5, 5.5, 7.75]);
  $per4=trapmf($per,[5.5, 7.75, 7.75, 10]);
  $per5=trapmf($per,[7.75, 10, 10, 12.2]);
  $perceivableArray= array(
    array($per1),
    array($per2),
    array($per3),
    array($per4),
    array($per5)
  );


  $ope1 = trapmf($ope, array(-1.25, 1, 1, 3.25));
  $ope2 = trapmf($ope, array(1, 3.25, 3.25, 5.5));
  $ope3 = trapmf($ope, array(3.25, 5.5, 5.5, 7.75));
  $ope4 = trapmf($ope, array(5.5, 7.75, 7.75, 10));
  $ope5 = trapmf($ope, array(7.75, 10, 10, 12.2));

  $operatorArray = array($ope1, $ope2, $ope3, $ope4, $ope5);


  // Multiple 
  // und = 1, rob =1
  $mult1 = $und1 * $rob1 * $per1 * $ope1;
  $mult2 = $und1 * $rob1 * $per1 * $ope2;
  $mult3 = $und1 * $rob1 * $per1 * $ope3;
  $mult4 = $und1 * $rob1 * $per1 * $ope4;
  $mult5 = $und1 * $rob1 * $per1 * $ope5;

  $mult6 = $und1 * $rob1 * $per2 * $ope1;
  $mult7 = $und1 * $rob1 * $per2 * $ope2;
  $mult8 = $und1 * $rob1 * $per2 * $ope3;
  $mult9 = $und1 * $rob1 * $per2 * $ope4;
  $mult10 = $und1 * $rob1 * $per2 * $ope5;

  $mult11 = $und1 * $rob1 * $per3 * $ope1;
  $mult12 = $und1 * $rob1 * $per3 * $ope2;
  $mult13 = $und1 * $rob1 * $per3 * $ope3;
  $mult14 = $und1 * $rob1 * $per3 * $ope4;
  $mult15 = $und1 * $rob1 * $per3 * $ope5;

  $mult16 = $und1 * $rob1 * $per4 * $ope1;
  $mult17 = $und1 * $rob1 * $per4 * $ope2;
  $mult18 = $und1 * $rob1 * $per4 * $ope3;
  $mult19 = $und1 * $rob1 * $per4 * $ope4;
  $mult20 = $und1 * $rob1 * $per4 * $ope5;

  $mult21 = $und1 * $rob1 * $per5 * $ope1;
  $mult22 = $und1 * $rob1 * $per5 * $ope2;
  $mult23 = $und1 * $rob1 * $per5 * $ope3;
  $mult24 = $und1 * $rob1 * $per5 * $ope4;
  $mult25 = $und1 * $rob1 * $per5 * $ope5;

  // und = 1 , rob =2
  $mult26 = $und1 * $rob2 * $per1 * $ope1;
  $mult27 = $und1 * $rob2 * $per1 * $ope2;
  $mult28 = $und1 * $rob2 * $per1 * $ope3;
  $mult29 = $und1 * $rob2 * $per1 * $ope4;
  $mult30 = $und1 * $rob2 * $per1 * $ope5;

  $mult31 = $und1 * $rob2 * $per2 * $ope1;
  $mult32 = $und1 * $rob2 * $per2 * $ope2;
  $mult33 = $und1 * $rob2 * $per2 * $ope3;
  $mult34 = $und1 * $rob2 * $per2 * $ope4;
  $mult35 = $und1 * $rob2 * $per2 * $ope5;

  $mult36 = $und1 * $rob2 * $per3 * $ope1;
  $mult37 = $und1 * $rob2 * $per3 * $ope2;
  $mult38 = $und1 * $rob2 * $per3 * $ope3;
  $mult39 = $und1 * $rob2 * $per3 * $ope4;
  $mult40 = $und1 * $rob2 * $per3 * $ope5;

  $mult41 = $und1 * $rob2 * $per4 * $ope1;
  $mult42 = $und1 * $rob2 * $per4 * $ope2;
  $mult43 = $und1 * $rob2 * $per4 * $ope3;
  $mult44 = $und1 * $rob2 * $per4 * $ope4;
  $mult45 = $und1 * $rob2 * $per4 * $ope5;

  $mult46 = $und1 * $rob2 * $per5 * $ope1;
  $mult47 = $und1 * $rob2 * $per5 * $ope2;
  $mult48 = $und1 * $rob2 * $per5 * $ope3;
  $mult49 = $und1 * $rob2 * $per5 * $ope4;
  $mult50 = $und1 * $rob2 * $per5 * $ope5;

  // und =1, rob = 3
  $mult51 = $und1 * $rob3 * $per1 * $ope1;
  $mult52 = $und1 * $rob3 * $per1 * $ope2;
  $mult53 = $und1 * $rob3 * $per1 * $ope3;
  $mult54 = $und1 * $rob3 * $per1 * $ope4;
  $mult55 = $und1 * $rob3 * $per1 * $ope5;

  $mult56 = $und1 * $rob3 * $per2 * $ope1;
  $mult57 = $und1 * $rob3 * $per2 * $ope2;
  $mult58 = $und1 * $rob3 * $per2 * $ope3;
  $mult59 = $und1 * $rob3 * $per2 * $ope4;
  $mult60 = $und1 * $rob3 * $per2 * $ope5;

  $mult61 = $und1 * $rob3 * $per3 * $ope1;
  $mult62 = $und1 * $rob3 * $per3 * $ope2;
  $mult63 = $und1 * $rob3 * $per3 * $ope3;
  $mult64 = $und1 * $rob3 * $per3 * $ope4;
  $mult65 = $und1 * $rob3 * $per3 * $ope5;

  $mult66 = $und1 * $rob3 * $per4 * $ope1;
  $mult67 = $und1 * $rob3 * $per4 * $ope2;
  $mult68 = $und1 * $rob3 * $per4 * $ope3;
  $mult69 = $und1 * $rob3 * $per4 * $ope4;
  $mult70 = $und1 * $rob3 * $per4 * $ope5;

  $mult71 = $und1 * $rob3 * $per5 * $ope1;
  $mult72 = $und1 * $rob3 * $per5 * $ope2;
  $mult73 = $und1 * $rob3 * $per5 * $ope3;
  $mult74 = $und1 * $rob3 * $per5 * $ope4;
  $mult75 = $und1 * $rob3 * $per5 * $ope5;

  // und = 2, rob = 1
  $mult76 = $und2 * $rob1 * $per1 * $ope1;
  $mult77 = $und2 * $rob1 * $per1 * $ope2;
  $mult78 = $und2 * $rob1 * $per1 * $ope3;
  $mult79 = $und2 * $rob1 * $per1 * $ope4;
  $mult80 = $und2 * $rob1 * $per1 * $ope5;

  $mult81 = $und2 * $rob1 * $per2 * $ope1;
  $mult82 = $und2 * $rob1 * $per2 * $ope2;
  $mult83 = $und2 * $rob1 * $per2 * $ope3;
  $mult84 = $und2 * $rob1 * $per2 * $ope4;
  $mult85 = $und2 * $rob1 * $per2 * $ope5;

  $mult86 = $und2 * $rob1 * $per3 * $ope1;
  $mult87 = $und2 * $rob1 * $per3 * $ope2;
  $mult88 = $und2 * $rob1 * $per3 * $ope3;
  $mult89 = $und2 * $rob1 * $per3 * $ope4;
  $mult90 = $und2 * $rob1 * $per3 * $ope5;

  $mult91 = $und2 * $rob1 * $per4 * $ope1;
  $mult92 = $und2 * $rob1 * $per4 * $ope2;
  $mult93 = $und2 * $rob1 * $per4 * $ope3;
  $mult94 = $und2 * $rob1 * $per4 * $ope4;
  $mult95 = $und2 * $rob1 * $per4 * $ope5;

  $mult96 = $und2 * $rob1 * $per5 * $ope1;
  $mult97 = $und2 * $rob1 * $per5 * $ope2;
  $mult98 = $und2 * $rob1 * $per5 * $ope3;
  $mult99 = $und2 * $rob1 * $per5 * $ope4;
  $mult100 = $und2 * $rob1 * $per5 * $ope5;

    // und = 2, rob = 2
  $mult101 = $und2 * $rob2 * $per1 * $ope1;
  $mult102 = $und2 * $rob2 * $per1 * $ope2;
  $mult103 = $und2 * $rob2 * $per1 * $ope3;
  $mult104 = $und2 * $rob2 * $per1 * $ope4;
  $mult105 = $und2 * $rob2 * $per1 * $ope5;

  $mult106 = $und2 * $rob2 * $per2 * $ope1;
  $mult107 = $und2 * $rob2 * $per2 * $ope2;
  $mult108 = $und2 * $rob2 * $per2 * $ope3;
  $mult109 = $und2 * $rob2 * $per2 * $ope4;
  $mult110 = $und2 * $rob2 * $per2 * $ope5;

  $mult111 = $und2 * $rob2 * $per3 * $ope1;
  $mult112 = $und2 * $rob2 * $per3 * $ope2;
  $mult113 = $und2 * $rob2 * $per3 * $ope3;
  $mult114 = $und2 * $rob2 * $per3 * $ope4;
  $mult115 = $und2 * $rob2 * $per3 * $ope5;

  $mult116 = $und2 * $rob2 * $per4 * $ope1;
  $mult117 = $und2 * $rob2 * $per4 * $ope2;
  $mult118 = $und2 * $rob2 * $per4 * $ope3;
  $mult119 = $und2 * $rob2 * $per4 * $ope4;
  $mult120 = $und2 * $rob2 * $per4 * $ope5;

  $mult121 = $und2 * $rob2 * $per5 * $ope1;
  $mult122 = $und2 * $rob2 * $per5 * $ope2;
  $mult123 = $und2 * $rob2 * $per5 * $ope3;
  $mult124 = $und2 * $rob2 * $per5 * $ope4;
  $mult125 = $und2 * $rob2 * $per5 * $ope5;

  // und = 2, rob = 3
  $mult126 = $und2 * $rob3 * $per1 * $ope1;
  $mult127 = $und2 * $rob3 * $per1 * $ope2;
  $mult128 = $und2 * $rob3 * $per1 * $ope3;
  $mult129 = $und2 * $rob3 * $per1 * $ope4;
  $mult130 = $und2 * $rob3 * $per1 * $ope5;

  $mult131 = $und2 * $rob3 * $per2 * $ope1;
  $mult132 = $und2 * $rob3 * $per2 * $ope2;
  $mult133 = $und2 * $rob3 * $per2 * $ope3;
  $mult134 = $und2 * $rob3 * $per2 * $ope4;
  $mult135 = $und2 * $rob3 * $per2 * $ope5;

  $mult136 = $und2 * $rob3 * $per3 * $ope1;
  $mult137 = $und2 * $rob3 * $per3 * $ope2;
  $mult138 = $und2 * $rob3 * $per3 * $ope3;
  $mult139 = $und2 * $rob3 * $per3 * $ope4;
  $mult140 = $und2 * $rob3 * $per3 * $ope5;

  $mult141 = $und2 * $rob3 * $per4 * $ope1;
  $mult142 = $und2 * $rob3 * $per4 * $ope2;
  $mult143 = $und2 * $rob3 * $per4 * $ope3;
  $mult144 = $und2 * $rob3 * $per4 * $ope4;
  $mult145 = $und2 * $rob3 * $per4 * $ope5;

  $mult146 = $und2 * $rob3 * $per5 * $ope1;
  $mult147 = $und2 * $rob3 * $per5 * $ope2;
  $mult148 = $und2 * $rob3 * $per5 * $ope3;
  $mult149 = $und2 * $rob3 * $per5 * $ope4;
  $mult150 = $und2 * $rob3 * $per5 * $ope5;

  // und = 3, rob = 1
  $mult151 = $und3 * $rob1 * $per1 * $ope1;
  $mult152 = $und3 * $rob1 * $per1 * $ope2;
  $mult153 = $und3 * $rob1 * $per1 * $ope3;
  $mult154 = $und3 * $rob1 * $per1 * $ope4;
  $mult155 = $und3 * $rob1 * $per1 * $ope5;

  $mult156 = $und3 * $rob1 * $per2 * $ope1;
  $mult157 = $und3 * $rob1 * $per2 * $ope2;
  $mult158 = $und3 * $rob1 * $per2 * $ope3;
  $mult159 = $und3 * $rob1 * $per2 * $ope4;
  $mult160 = $und3 * $rob1 * $per2 * $ope5;

  $mult161 = $und3 * $rob1 * $per3 * $ope1;
  $mult162 = $und3 * $rob1 * $per3 * $ope2;
  $mult163 = $und3 * $rob1 * $per3 * $ope3;
  $mult164 = $und3 * $rob1 * $per3 * $ope4;
  $mult165 = $und3 * $rob1 * $per3 * $ope5;

  $mult166 = $und3 * $rob1 * $per4 * $ope1;
  $mult167 = $und3 * $rob1 * $per4 * $ope2;
  $mult168 = $und3 * $rob1 * $per4 * $ope3;
  $mult169 = $und3 * $rob1 * $per4 * $ope4;
  $mult170 = $und3 * $rob1 * $per4 * $ope5;

  $mult171 = $und3 * $rob1 * $per5 * $ope1;
  $mult172 = $und3 * $rob1 * $per5 * $ope2;
  $mult173 = $und3 * $rob1 * $per5 * $ope3;
  $mult174 = $und3 * $rob1 * $per5 * $ope4;
  $mult175 = $und3 * $rob1 * $per5 * $ope5;

  // und = 3, rob = 2
  $mult176 = $und3 * $rob2 * $per1 * $ope1;
  $mult177 = $und3 * $rob2 * $per1 * $ope2;
  $mult178 = $und3 * $rob2 * $per1 * $ope3;
  $mult179 = $und3 * $rob2 * $per1 * $ope4;
  $mult180 = $und3 * $rob2 * $per1 * $ope5;

  $mult181 = $und3 * $rob2 * $per2 * $ope1;
  $mult182 = $und3 * $rob2 * $per2 * $ope2;
  $mult183 = $und3 * $rob2 * $per2 * $ope3;
  $mult184 = $und3 * $rob2 * $per2 * $ope4;
  $mult185 = $und3 * $rob2 * $per2 * $ope5;

  $mult186 = $und3 * $rob2 * $per3 * $ope1;
  $mult187 = $und3 * $rob2 * $per3 * $ope2;
  $mult188 = $und3 * $rob2 * $per3 * $ope3;
  $mult189 = $und3 * $rob2 * $per3 * $ope4;
  $mult190 = $und3 * $rob2 * $per3 * $ope5;

  $mult191 = $und3 * $rob2 * $per4 * $ope1;
  $mult192 = $und3 * $rob2 * $per4 * $ope2;
  $mult193 = $und3 * $rob2 * $per4 * $ope3;
  $mult194 = $und3 * $rob2 * $per4 * $ope4;
  $mult195 = $und3 * $rob2 * $per4 * $ope5;

  $mult196 = $und3 * $rob2 * $per5 * $ope1;
  $mult197 = $und3 * $rob2 * $per5 * $ope2;
  $mult198 = $und3 * $rob2 * $per5 * $ope3;
  $mult199 = $und3 * $rob2 * $per5 * $ope4;
  $mult200 = $und3 * $rob2 * $per5 * $ope5;

  // und = 3, rob = 3
  $mult201 = $und3 * $rob3 * $per1 * $ope1;
  $mult202 = $und3 * $rob3 * $per1 * $ope2;
  $mult203 = $und3 * $rob3 * $per1 * $ope3;
  $mult204 = $und3 * $rob3 * $per1 * $ope4;
  $mult205 = $und3 * $rob3 * $per1 * $ope5;

  $mult206 = $und3 * $rob3 * $per2 * $ope1;
  $mult207 = $und3 * $rob3 * $per2 * $ope2;
  $mult208 = $und3 * $rob3 * $per2 * $ope3;
  $mult209 = $und3 * $rob3 * $per2 * $ope4;
  $mult210 = $und3 * $rob3 * $per2 * $ope5;

  $mult211 = $und3 * $rob3 * $per3 * $ope1;
  $mult212 = $und3 * $rob3 * $per3 * $ope2;
  $mult213 = $und3 * $rob3 * $per3 * $ope3;
  $mult214 = $und3 * $rob3 * $per3 * $ope4;
  $mult215 = $und3 * $rob3 * $per3 * $ope5;

  $mult216 = $und3 * $rob3 * $per4 * $ope1;
  $mult217 = $und3 * $rob3 * $per4 * $ope2;
  $mult218 = $und3 * $rob3 * $per4 * $ope3;
  $mult219 = $und3 * $rob3 * $per4 * $ope4;
  $mult220 = $und3 * $rob3 * $per4 * $ope5;

  $mult221 = $und3 * $rob3 * $per5 * $ope1;
  $mult222 = $und3 * $rob3 * $per5 * $ope2;
  $mult223 = $und3 * $rob3 * $per5 * $ope3;
  $mult224 = $und3 * $rob3 * $per5 * $ope4;
  $mult225 = $und3 * $rob3 * $per5 * $ope5;

  // Sum 
  // und=1, rob=1, per=1, per - change, ope=1
  $mult_sum1 = $mult1 + $mult6 + $mult11 + $mult16 + $mult21;
  $mult_sum2 = $mult2 + $mult7 + $mult12 + $mult17 + $mult22;
  $mult_sum3 = $mult3 + $mult8 + $mult13 + $mult18 + $mult23;
  $mult_sum4 = $mult4 + $mult9 + $mult14 + $mult19 + $mult24;
  $mult_sum5 = $mult5 + $mult10 + $mult15 + $mult20 + $mult25;

    // und=1, rob=2, per=1, per - change, ope=1
  $mult_sum6 = $mult26 + $mult31 + $mult36 + $mult41 + $mult46;
  $mult_sum7 = $mult27 + $mult32 + $mult37 + $mult42 + $mult47;
  $mult_sum8 = $mult28 + $mult33 + $mult38 + $mult43 + $mult48;
  $mult_sum9 = $mult29 + $mult34 + $mult39 + $mult44 + $mult49;
  $mult_sum10 = $mult30 + $mult35 + $mult40 + $mult45 + $mult50;

  // und=1, rob=3, per=1, per - change, ope=1
  $mult_sum11 = $mult51 + $mult56 + $mult61 + $mult66 + $mult71;
  $mult_sum12 = $mult52 + $mult57 + $mult62 + $mult67 + $mult72;
  $mult_sum13 = $mult53 + $mult58 + $mult63 + $mult68 + $mult73;
  $mult_sum14 = $mult54 + $mult59 + $mult64 + $mult69 + $mult74;
  $mult_sum15 = $mult55 + $mult60 + $mult65 + $mult70 + $mult75;

    // und=2, rob=1, per=1, per - change, ope=1
  $mult_sum16 = $mult76 + $mult81 + $mult86 + $mult91 + $mult96;
  $mult_sum17 = $mult77 + $mult82 + $mult87 + $mult92 + $mult97;
  $mult_sum18 = $mult78 + $mult83 + $mult88 + $mult93 + $mult98;
  $mult_sum19 = $mult79 + $mult84 + $mult89 + $mult94 + $mult99;
  $mult_sum20 = $mult80 + $mult85 + $mult90 + $mult95 + $mult100;

   // und=2, rob=2, per=1, per - change, ope=1
  $mult_sum21 = $mult101 + $mult106 + $mult111 + $mult116 + $mult121;
  $mult_sum22 = $mult102 + $mult107 + $mult112 + $mult117 + $mult122;
  $mult_sum23 = $mult103 + $mult108 + $mult113 + $mult118 + $mult123;
  $mult_sum24 = $mult104 + $mult109 + $mult114 + $mult119 + $mult124;
  $mult_sum25 = $mult105 + $mult110 + $mult115 + $mult120 + $mult125;


   // und=2, rob=3, per=1, per - change, ope=1
  $mult_sum26 = $mult126 + $mult131 + $mult136 + $mult141 + $mult146;
  $mult_sum27 = $mult127 + $mult132 + $mult137 + $mult142 + $mult147;
  $mult_sum28 = $mult128 + $mult133 + $mult138 + $mult143 + $mult148;
  $mult_sum29 = $mult129 + $mult134 + $mult139 + $mult144 + $mult149;
  $mult_sum30 = $mult130 + $mult135 + $mult140 + $mult145 + $mult150;

   // und=3, rob=1, per=1, per - change, ope=1
  $mult_sum31 = $mult151 + $mult156 + $mult161 + $mult166 + $mult171;
  $mult_sum32 = $mult152 + $mult157 + $mult162 + $mult167 + $mult172;
  $mult_sum33 = $mult153 + $mult158 + $mult163 + $mult168 + $mult173;
  $mult_sum34 = $mult154 + $mult159 + $mult164 + $mult169 + $mult174;
  $mult_sum35 = $mult155 + $mult160 + $mult165 + $mult170 + $mult175;


     // und=3, rob=2, per=1, per - change, ope=1
  $mult_sum36 = $mult176 + $mult181 + $mult186 + $mult191 + $mult196;
  $mult_sum37 = $mult177 + $mult182 + $mult187 + $mult192 + $mult197;
  $mult_sum38 = $mult178 + $mult183 + $mult188 + $mult193 + $mult198;
  $mult_sum39 = $mult179 + $mult184 + $mult189 + $mult194 + $mult199;
  $mult_sum40 = $mult180 + $mult185 + $mult190 + $mult195 + $mult200;

     // und=3, rob=3, per=1, per - change, ope=1
  $mult_sum41 = $mult201 + $mult206 + $mult211 + $mult216 + $mult221;
  $mult_sum42 = $mult202 + $mult207 + $mult212 + $mult217 + $mult222;
  $mult_sum43 = $mult203 + $mult208 + $mult213 + $mult218 + $mult223;
  $mult_sum44 = $mult204 + $mult209 + $mult214 + $mult219 + $mult224;
  $mult_sum45 = $mult205 + $mult210 + $mult215 + $mult220 + $mult225;


  $sum_mult_sum1 = $mult_sum1 + $mult_sum6 + $mult_sum11 + $mult_sum16 + $mult_sum21 + $mult_sum26 + $mult_sum31 + $mult_sum36 + $mult_sum41;

  $sum_mult_sum2 = $mult_sum2 + $mult_sum7 + $mult_sum12 + $mult_sum17 + $mult_sum22 + $mult_sum27 + $mult_sum32 + $mult_sum37 + $mult_sum42;

  $sum_mult_sum3 = $mult_sum3 + $mult_sum8 + $mult_sum13 + $mult_sum18 + $mult_sum23 + $mult_sum28 + $mult_sum33 + $mult_sum38 + $mult_sum43;

  $sum_mult_sum4 = $mult_sum4 + $mult_sum9 + $mult_sum14 + $mult_sum19 + $mult_sum24 + $mult_sum29 + $mult_sum34 + $mult_sum39 + $mult_sum44;

  $sum_mult_sum5 = $mult_sum5 + $mult_sum10 + $mult_sum15 + $mult_sum20 + $mult_sum25 + $mult_sum30 + $mult_sum35 + $mult_sum40 + $mult_sum45;

  $sum_below = $sum_mult_sum1 + $sum_mult_sum2 + $sum_mult_sum3 + $sum_mult_sum4 + $sum_mult_sum5;

  

  // Sum above
  $rule_weight_temp1 = array(
    array(1, 1, 2, 3, 5),
    array(1, 2, 2, 4, 5),
    array(2, 2, 3, 4, 6),
    array(3, 4, 4, 6, 7),
    array(5, 5, 6, 7, 9)
  );

  $rule_weight_temp2 = array(
    array(1, 2, 2, 4, 5),
    array(2, 2, 3, 4, 6),
    array(2, 3, 3, 5, 6),
    array(4, 4, 5, 6, 8),
    array(5, 6, 6, 8, 9)
  );

  $rule_weight_temp3 = array(
    array(3, 3, 4, 5, 7),
    array(3, 4, 4, 6, 7),
    array(4, 4, 5, 6, 8),
    array(5, 6, 6, 8, 9),
    array(7, 7, 8, 9, 10)
  );

  $rule_weight_temp4 = array(
    array(1, 2, 2, 4, 5),
    array(2, 2, 3, 4, 6),
    array(2, 3, 3, 5, 6),
    array(4, 4, 5, 6, 8),
    array(5, 6, 6, 8, 9)
  );

  $rule_weight_temp5 = array(
    array(2, 2, 3, 4, 6),
    array(2, 3, 3, 5, 6),
    array(3, 3, 4, 5, 7),
    array(4, 5, 5, 7, 8),
    array(6, 6, 7, 8, 9)
  );

  $rule_weight_temp6 = array(
    array(3, 4, 4, 6, 7),
    array(4, 4, 5, 6, 8),
    array(4, 5, 5, 7, 8),
    array(6, 6, 7, 8, 9),
    array(7, 8, 8, 9, 10)
  );

  $rule_weight_temp7 = array(
    array(2, 2, 3, 4, 6),
    array(2, 3, 3, 5, 6),
    array(3, 3, 4, 5, 7),
    array(4, 5, 5, 7, 8),
    array(6, 6, 7, 8, 9)
  );

  $rule_weight_temp8 = array(
    array(2, 3, 3, 5, 6),
    array(3, 3, 4, 5, 7),
    array(3, 4, 4, 6, 7),
    array(5, 5, 6, 7, 8),
    array(6, 7, 7, 8, 9)
  );

  $rule_weight_temp9 = array(
    array(4, 4, 5, 6, 8),
    array(4, 5, 5, 7, 8),
    array(5, 5, 6, 7, 8),
    array(6, 7, 7, 9, 9),
    array(8, 8, 8, 9, 10)
  );


  // SUM ABOVE

  // und = 1, rob =1 , per = 1, ope = change
  $rule1 = $mult1 * $rule_weight_temp1[0][0];
  $rule2 = $mult2 * $rule_weight_temp1[0][1];
  $rule3 = $mult3 * $rule_weight_temp1[0][2];
  $rule4 = $mult4 * $rule_weight_temp1[0][3];
  $rule5 = $mult5 * $rule_weight_temp1[0][4];

  // und = 1, rob =1 , per = 2, ope = change
  $rule6 = $mult6 * $rule_weight_temp1[1][0];
  $rule7 = $mult7 * $rule_weight_temp1[1][1];
  $rule8 = $mult8 * $rule_weight_temp1[1][2];
  $rule9 = $mult9 * $rule_weight_temp1[1][3];
  $rule10 = $mult10 * $rule_weight_temp1[1][4];

  $rule11 = $mult11 * $rule_weight_temp1[2][0];
  $rule12 = $mult12 * $rule_weight_temp1[2][1];
  $rule13 = $mult13 * $rule_weight_temp1[2][2];
  $rule14 = $mult14 * $rule_weight_temp1[2][3];
  $rule15 = $mult15 * $rule_weight_temp1[2][4];

  $rule16 = $mult16 * $rule_weight_temp1[3][0];
  $rule17 = $mult17 * $rule_weight_temp1[3][1];
  $rule18 = $mult18 * $rule_weight_temp1[3][2];
  $rule19 = $mult19 * $rule_weight_temp1[3][3];
  $rule20 = $mult20 * $rule_weight_temp1[3][4];

  $rule21 = $mult21 * $rule_weight_temp1[4][0];
  $rule22 = $mult22 * $rule_weight_temp1[4][1];
  $rule23 = $mult23 * $rule_weight_temp1[4][2];
  $rule24 = $mult24 * $rule_weight_temp1[4][3];
  $rule25 = $mult25 * $rule_weight_temp1[4][4];

    // und = 1, rob =2 , per = 1, ope = change
  $rule26 = $mult26 * $rule_weight_temp2[0][0];
  $rule27 = $mult27 * $rule_weight_temp2[0][1];
  $rule28 = $mult28 * $rule_weight_temp2[0][2];
  $rule29 = $mult29 * $rule_weight_temp2[0][3];
  $rule30 = $mult30 * $rule_weight_temp2[0][4];

  $rule31 = $mult31 * $rule_weight_temp2[1][0];
  $rule32 = $mult32 * $rule_weight_temp2[1][1];
  $rule33 = $mult33 * $rule_weight_temp2[1][2];
  $rule34 = $mult34 * $rule_weight_temp2[1][3];
  $rule35 = $mult35 * $rule_weight_temp2[1][4];

  $rule36 = $mult36 * $rule_weight_temp2[2][0];
  $rule37 = $mult37 * $rule_weight_temp2[2][1];
  $rule38 = $mult38 * $rule_weight_temp2[2][2];
  $rule39 = $mult39 * $rule_weight_temp2[2][3];
  $rule40 = $mult40 * $rule_weight_temp2[2][4];

  $rule41 = $mult41 * $rule_weight_temp2[3][0];
  $rule42 = $mult42 * $rule_weight_temp2[3][1];
  $rule43 = $mult43 * $rule_weight_temp2[3][2];
  $rule44 = $mult44 * $rule_weight_temp2[3][3];
  $rule45 = $mult45 * $rule_weight_temp2[3][4];

  $rule46 = $mult46 * $rule_weight_temp2[4][0];
  $rule47 = $mult47 * $rule_weight_temp2[4][1];
  $rule48 = $mult48 * $rule_weight_temp2[4][2];
  $rule49 = $mult49 * $rule_weight_temp2[4][3];
  $rule50 = $mult50 * $rule_weight_temp2[4][4];

  
   // und = 1, rob =3 , per = 1, ope = change
  $rule51 = $mult51 * $rule_weight_temp3[0][0];
  $rule52 = $mult52 * $rule_weight_temp3[0][1];
  $rule53 = $mult53 * $rule_weight_temp3[0][2];
  $rule54 = $mult54 * $rule_weight_temp3[0][3];
  $rule55 = $mult55 * $rule_weight_temp3[0][4];


  $rule56 = $mult56 * $rule_weight_temp3[1][0];
  $rule57 = $mult57 * $rule_weight_temp3[1][1];
  $rule58 = $mult58 * $rule_weight_temp3[1][2];
  $rule59 = $mult59 * $rule_weight_temp3[1][3];
  $rule60 = $mult60 * $rule_weight_temp3[1][4];

  $rule61 = $mult61 * $rule_weight_temp3[2][0];
  $rule62 = $mult62 * $rule_weight_temp3[2][1];
  $rule63 = $mult63 * $rule_weight_temp3[2][2];
  $rule64 = $mult64 * $rule_weight_temp3[2][3];
  $rule65 = $mult65 * $rule_weight_temp3[2][4];

  $rule66 = $mult66 * $rule_weight_temp3[3][0];
  $rule67 = $mult67 * $rule_weight_temp3[3][1];
  $rule68 = $mult68 * $rule_weight_temp3[3][2];
  $rule69 = $mult69 * $rule_weight_temp3[3][3];
  $rule70 = $mult70 * $rule_weight_temp3[3][4];

  $rule71 = $mult71 * $rule_weight_temp3[4][0];
  $rule72 = $mult72 * $rule_weight_temp3[4][1];
  $rule73 = $mult73 * $rule_weight_temp3[4][2];
  $rule74 = $mult74 * $rule_weight_temp3[4][3];
  $rule75 = $mult75 * $rule_weight_temp3[4][4];

      // und = 2, rob =1 , per = 1, ope = change
  $rule76 = $mult76 * $rule_weight_temp4[0][0];
  $rule77 = $mult77 * $rule_weight_temp4[0][1];
  $rule78 = $mult78 * $rule_weight_temp4[0][2];
  $rule79 = $mult79 * $rule_weight_temp4[0][3];
  $rule80 = $mult80 * $rule_weight_temp4[0][4];

  $rule81 = $mult81 * $rule_weight_temp4[1][0];
  $rule82 = $mult82 * $rule_weight_temp4[1][1];
  $rule83 = $mult83 * $rule_weight_temp4[1][2];
  $rule84 = $mult84 * $rule_weight_temp4[1][3];
  $rule85 = $mult85 * $rule_weight_temp4[1][4];

  $rule86 = $mult86 * $rule_weight_temp4[2][0];
  $rule87 = $mult87 * $rule_weight_temp4[2][1];
  $rule88 = $mult88 * $rule_weight_temp4[2][2];
  $rule89 = $mult89 * $rule_weight_temp4[2][3];
  $rule90 = $mult90 * $rule_weight_temp4[2][4];

  $rule91 = $mult91 * $rule_weight_temp4[3][0];
  $rule92 = $mult92 * $rule_weight_temp4[3][1];
  $rule93 = $mult93 * $rule_weight_temp4[3][2];
  $rule94 = $mult94 * $rule_weight_temp4[3][3];
  $rule95 = $mult95 * $rule_weight_temp4[3][4];

  $rule96 = $mult96 * $rule_weight_temp4[4][0];
  $rule97 = $mult97 * $rule_weight_temp4[4][1];
  $rule98 = $mult98 * $rule_weight_temp4[4][2];
  $rule99 = $mult99 * $rule_weight_temp4[4][3];
  $rule100 = $mult100 * $rule_weight_temp4[4][4];


  $rule101 = $mult101 * $rule_weight_temp5[0][0];
  $rule102 = $mult102 * $rule_weight_temp5[0][1];
  $rule103 = $mult103 * $rule_weight_temp5[0][2];
  $rule104 = $mult104 * $rule_weight_temp5[0][3];
  $rule105 = $mult105 * $rule_weight_temp5[0][4];

  $rule106 = $mult106 * $rule_weight_temp5[1][0];
  $rule107 = $mult107 * $rule_weight_temp5[1][1];
  $rule108 = $mult108 * $rule_weight_temp5[1][2];
  $rule109 = $mult109 * $rule_weight_temp5[1][3];
  $rule110 = $mult110 * $rule_weight_temp5[1][4];

  $rule111 = $mult111 * $rule_weight_temp5[2][0];
  $rule112 = $mult112 * $rule_weight_temp5[2][1];
  $rule113 = $mult113 * $rule_weight_temp5[2][2];
  $rule114 = $mult114 * $rule_weight_temp5[2][3];
  $rule115 = $mult115 * $rule_weight_temp5[2][4];

  $rule116 = $mult116 * $rule_weight_temp5[3][0];
  $rule117 = $mult117 * $rule_weight_temp5[3][1];
  $rule118 = $mult118 * $rule_weight_temp5[3][2];
  $rule119 = $mult119 * $rule_weight_temp5[3][3];
  $rule120 = $mult120 * $rule_weight_temp5[3][4];

  $rule121 = $mult121 * $rule_weight_temp5[4][0];
  $rule122 = $mult122 * $rule_weight_temp5[4][1];
  $rule123 = $mult123 * $rule_weight_temp5[4][2];
  $rule124 = $mult124 * $rule_weight_temp5[4][3];
  $rule125 = $mult125 * $rule_weight_temp5[4][4];


  $rule126 = $mult126 * $rule_weight_temp6[0][0];
  $rule127 = $mult127 * $rule_weight_temp6[0][1];
  $rule128 = $mult128 * $rule_weight_temp6[0][2];
  $rule129 = $mult129 * $rule_weight_temp6[0][3];
  $rule130 = $mult130 * $rule_weight_temp6[0][4];

  $rule131 = $mult131 * $rule_weight_temp6[1][0];
  $rule132 = $mult132 * $rule_weight_temp6[1][1];
  $rule133 = $mult133 * $rule_weight_temp6[1][2];
  $rule134 = $mult134 * $rule_weight_temp6[1][3];
  $rule135 = $mult135 * $rule_weight_temp6[1][4];

  $rule136 = $mult136 * $rule_weight_temp6[2][0];
  $rule137 = $mult137 * $rule_weight_temp6[2][1];
  $rule138 = $mult138 * $rule_weight_temp6[2][2];
  $rule139 = $mult139 * $rule_weight_temp6[2][3];
  $rule140 = $mult140 * $rule_weight_temp6[2][4];

  $rule141 = $mult141 * $rule_weight_temp6[3][0];
  $rule142 = $mult142 * $rule_weight_temp6[3][1];
  $rule143 = $mult143 * $rule_weight_temp6[3][2];
  $rule144 = $mult144 * $rule_weight_temp6[3][3];
  $rule145 = $mult145 * $rule_weight_temp6[3][4];

  $rule146 = $mult146 * $rule_weight_temp6[4][0];
  $rule147 = $mult147 * $rule_weight_temp6[4][1];
  $rule148 = $mult148 * $rule_weight_temp6[4][2];
  $rule149 = $mult149 * $rule_weight_temp6[4][3];
  $rule150 = $mult150 * $rule_weight_temp6[4][4];

  $rule151 = $mult151 * $rule_weight_temp7[0][0];
  $rule152 = $mult152 * $rule_weight_temp7[0][1];
  $rule153 = $mult153 * $rule_weight_temp7[0][2];
  $rule154 = $mult154 * $rule_weight_temp7[0][3];
  $rule155 = $mult155 * $rule_weight_temp7[0][4];

  $rule156 = $mult156 * $rule_weight_temp7[1][0];
  $rule157 = $mult157 * $rule_weight_temp7[1][1];
  $rule158 = $mult158 * $rule_weight_temp7[1][2];
  $rule159 = $mult159 * $rule_weight_temp7[1][3];
  $rule160 = $mult160 * $rule_weight_temp7[1][4];

  $rule161 = $mult161 * $rule_weight_temp7[2][0];
  $rule162 = $mult162 * $rule_weight_temp7[2][1];
  $rule163 = $mult163 * $rule_weight_temp7[2][2];
  $rule164 = $mult164 * $rule_weight_temp7[2][3];
  $rule165 = $mult165 * $rule_weight_temp7[2][4];

  $rule166 = $mult166 * $rule_weight_temp7[3][0];
  $rule167 = $mult167 * $rule_weight_temp7[3][1];
  $rule168 = $mult168 * $rule_weight_temp7[3][2];
  $rule169 = $mult169 * $rule_weight_temp7[3][3];
  $rule170 = $mult170 * $rule_weight_temp7[3][4];

  $rule171 = $mult171 * $rule_weight_temp7[4][0];
  $rule172 = $mult172 * $rule_weight_temp7[4][1];
  $rule173 = $mult173 * $rule_weight_temp7[4][2];
  $rule174 = $mult174 * $rule_weight_temp7[4][3];
  $rule175 = $mult175 * $rule_weight_temp7[4][4];

  $rule176 = $mult176 * $rule_weight_temp8[0][0];
  $rule177 = $mult177 * $rule_weight_temp8[0][1];
  $rule178 = $mult178 * $rule_weight_temp8[0][2];
  $rule179 = $mult179 * $rule_weight_temp8[0][3];
  $rule180 = $mult180 * $rule_weight_temp8[0][4];

  $rule181 = $mult181 * $rule_weight_temp8[1][0];
  $rule182 = $mult182 * $rule_weight_temp8[1][1];
  $rule183 = $mult183 * $rule_weight_temp8[1][2];
  $rule184 = $mult184 * $rule_weight_temp8[1][3];
  $rule185 = $mult185 * $rule_weight_temp8[1][4];

  $rule186 = $mult186 * $rule_weight_temp8[2][0];
  $rule187 = $mult187 * $rule_weight_temp8[2][1];
  $rule188 = $mult188 * $rule_weight_temp8[2][2];
  $rule189 = $mult189 * $rule_weight_temp8[2][3];
  $rule190 = $mult190 * $rule_weight_temp8[2][4];

  $rule191 = $mult191 * $rule_weight_temp8[3][0];
  $rule192 = $mult192 * $rule_weight_temp8[3][1];
  $rule193 = $mult193 * $rule_weight_temp8[3][2];
  $rule194 = $mult194 * $rule_weight_temp8[3][3];
  $rule195 = $mult195 * $rule_weight_temp8[3][4];

  $rule196 = $mult196 * $rule_weight_temp8[4][0];
  $rule197 = $mult197 * $rule_weight_temp8[4][1];
  $rule198 = $mult198 * $rule_weight_temp8[4][2];
  $rule199 = $mult199 * $rule_weight_temp8[4][3];
  $rule200 = $mult200 * $rule_weight_temp8[4][4];

  $rule201 = $mult201 * $rule_weight_temp9[0][0];
  $rule202 = $mult202 * $rule_weight_temp9[0][1];
  $rule203 = $mult203 * $rule_weight_temp9[0][2];
  $rule204 = $mult204 * $rule_weight_temp9[0][3];
  $rule205 = $mult205 * $rule_weight_temp9[0][4];

  $rule206 = $mult206 * $rule_weight_temp9[1][0];
  $rule207 = $mult207 * $rule_weight_temp9[1][1];
  $rule208 = $mult208 * $rule_weight_temp9[1][2];
  $rule209 = $mult209 * $rule_weight_temp9[1][3];
  $rule210 = $mult210 * $rule_weight_temp9[1][4];

  $rule211 = $mult211 * $rule_weight_temp9[2][0];
  $rule212 = $mult212 * $rule_weight_temp9[2][1];
  $rule213 = $mult213 * $rule_weight_temp9[2][2];
  $rule214 = $mult214 * $rule_weight_temp9[2][3];
  $rule215 = $mult215 * $rule_weight_temp9[2][4];

  $rule216 = $mult216 * $rule_weight_temp9[3][0];
  $rule217 = $mult217 * $rule_weight_temp9[3][1];
  $rule218 = $mult218 * $rule_weight_temp9[3][2];
  $rule219 = $mult219 * $rule_weight_temp9[3][3];
  $rule220 = $mult220 * $rule_weight_temp9[3][4];

  $rule221 = $mult221 * $rule_weight_temp9[4][0];
  $rule222 = $mult222 * $rule_weight_temp9[4][1];
  $rule223 = $mult223 * $rule_weight_temp9[4][2];
  $rule224 = $mult224 * $rule_weight_temp9[4][3];
  $rule225 = $mult225 * $rule_weight_temp9[4][4];


  // SUM
    // Sum 
  // und=1, rob=1, per=1, per - change, ope=1
  $rule_sum1 = $rule1 + $rule6 + $rule11 + $rule16 + $rule21;
  $rule_sum2 = $rule2 + $rule7 + $rule12 + $rule17 + $rule22;
  $rule_sum3 = $rule3 + $rule8 + $rule13 + $rule18 + $rule23;
  $rule_sum4 = $rule4 + $rule9 + $rule14 + $rule19 + $rule24;
  $rule_sum5 = $rule5 + $rule10 + $rule15 + $rule20 + $rule25;

    // und=1, rob=2, per=1, per - change, ope=1
  $rule_sum6 = $rule26 + $rule31 + $rule36 + $rule41 + $rule46;
  $rule_sum7 = $rule27 + $rule32 + $rule37 + $rule42 + $rule47;
  $rule_sum8 = $rule28 + $rule33 + $rule38 + $rule43 + $rule48;
  $rule_sum9 = $rule29 + $rule34 + $rule39 + $rule44 + $rule49;
  $rule_sum10 = $rule30 + $rule35 + $rule40 + $rule45 + $rule50;

  // und=1, rob=3, per=1, per - change, ope=1
  $rule_sum11 = $rule51 + $rule56 + $rule61 + $rule66 + $rule71;
  $rule_sum12 = $rule52 + $rule57 + $rule62 + $rule67 + $rule72;
  $rule_sum13 = $rule53 + $rule58 + $rule63 + $rule68 + $rule73;
  $rule_sum14 = $rule54 + $rule59 + $rule64 + $rule69 + $rule74;
  $rule_sum15 = $rule55 + $rule60 + $rule65 + $rule70 + $rule75;

    // und=2, rob=1, per=1, per - change, ope=1
  $rule_sum16 = $rule76 + $rule81 + $rule86 + $rule91 + $rule96;
  $rule_sum17 = $rule77 + $rule82 + $rule87 + $rule92 + $rule97;
  $rule_sum18 = $rule78 + $rule83 + $rule88 + $rule93 + $rule98;
  $rule_sum19 = $rule79 + $rule84 + $rule89 + $rule94 + $rule99;
  $rule_sum20 = $rule80 + $rule85 + $rule90 + $rule95 + $rule100;

   // und=2, rob=2, per=1, per - change, ope=1
  $rule_sum21 = $rule101 + $rule106 + $rule111 + $rule116 + $rule121;
  $rule_sum22 = $rule102 + $rule107 + $rule112 + $rule117 + $rule122;
  $rule_sum23 = $rule103 + $rule108 + $rule113 + $rule118 + $rule123;
  $rule_sum24 = $rule104 + $rule109 + $rule114 + $rule119 + $rule124;
  $rule_sum25 = $rule105 + $rule110 + $rule115 + $rule120 + $rule125;


   // und=2, rob=3, per=1, per - change, ope=1
  $rule_sum26 = $rule126 + $rule131 + $rule136 + $rule141 + $rule146;
  $rule_sum27 = $rule127 + $rule132 + $rule137 + $rule142 + $rule147;
  $rule_sum28 = $rule128 + $rule133 + $rule138 + $rule143 + $rule148;
  $rule_sum29 = $rule129 + $rule134 + $rule139 + $rule144 + $rule149;
  $rule_sum30 = $rule130 + $rule135 + $rule140 + $rule145 + $rule150;

   // und=3, rob=1, per=1, per - change, ope=1
  $rule_sum31 = $rule151 + $rule156 + $rule161 + $rule166 + $rule171;
  $rule_sum32 = $rule152 + $rule157 + $rule162 + $rule167 + $rule172;
  $rule_sum33 = $rule153 + $rule158 + $rule163 + $rule168 + $rule173;
  $rule_sum34 = $rule154 + $rule159 + $rule164 + $rule169 + $rule174;
  $rule_sum35 = $rule155 + $rule160 + $rule165 + $rule170 + $rule175;


     // und=3, rob=2, per=1, per - change, ope=1
  $rule_sum36 = $rule176 + $rule181 + $rule186 + $rule191 + $rule196;
  $rule_sum37 = $rule177 + $rule182 + $rule187 + $rule192 + $rule197;
  $rule_sum38 = $rule178 + $rule183 + $rule188 + $rule193 + $rule198;
  $rule_sum39 = $rule179 + $rule184 + $rule189 + $rule194 + $rule199;
  $rule_sum40 = $rule180 + $rule185 + $rule190 + $rule195 + $rule200;

     // und=3, rob=3, per=1, per - change, ope=1
  $rule_sum41 = $rule201 + $rule206 + $rule211 + $rule216 + $rule221;
  $rule_sum42 = $rule202 + $rule207 + $rule212 + $rule217 + $rule222;
  $rule_sum43 = $rule203 + $rule208 + $rule213 + $rule218 + $rule223;
  $rule_sum44 = $rule204 + $rule209 + $rule214 + $rule219 + $rule224;
  $rule_sum45 = $rule205 + $rule210 + $rule215 + $rule220 + $rule225;


  $sum_rule_sum1 = $rule_sum1 + $rule_sum6 + $rule_sum11 + $rule_sum16 + $rule_sum21 + $rule_sum26 + $rule_sum31 + $rule_sum36 + $rule_sum41;

  $sum_rule_sum2 = $rule_sum2 + $rule_sum7 + $rule_sum12 + $rule_sum17 + $rule_sum22 + $rule_sum27 + $rule_sum32 + $rule_sum37 + $rule_sum42;

  $sum_rule_sum3 = $rule_sum3 + $rule_sum8 + $rule_sum13 + $rule_sum18 + $rule_sum23 + $rule_sum28 + $rule_sum33 + $rule_sum38 + $rule_sum43;

  $sum_rule_sum4 = $rule_sum4 + $rule_sum9 + $rule_sum14 + $rule_sum19 + $rule_sum24 + $rule_sum29 + $rule_sum34 + $rule_sum39 + $rule_sum44;

  $sum_rule_sum5 = $rule_sum5 + $rule_sum10 + $rule_sum15 + $rule_sum20 + $rule_sum25 + $rule_sum30 + $rule_sum35 + $rule_sum40 + $rule_sum45;

  $sum_above = $sum_rule_sum1 + $sum_rule_sum2 + $sum_rule_sum3 + $sum_rule_sum4 + $sum_rule_sum5;

  $final = $sum_above/$sum_below;

  $result = round($final, 4);



  return $result;


}


function trapmf($x, $params) {
  $a = $params[0];
  $b = $params[1];
  $c = $params[2];
  $d = $params[3];

  if ($x <= $a || $x >= $d) {
    return 0;
  } elseif ($x >= $b && $x <= $c) {
    return 1;
  } elseif ($x > $a && $x < $b) {
    return ($x - $a) / ($b - $a);
  } elseif ($x > $c && $x < $d) {
    return ($d - $x) / ($d - $c);
  }
}



 ?>
