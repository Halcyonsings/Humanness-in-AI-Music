<?php

// reference
// $pages = ["index.html","0_introduce.php","0_consent.php","1_cognitive_style.php","2_opinion1.php","3_personality1.php","4_recognition1.php","5_opinion2.php","6_personality2.php","7_recognition2.php","8_demographics.php","9_result.php"];

$pages = ["C4_0_informed_consent.php","C4_1_headphone.php","C4_2_listening_phase_radio.php","C4_3_mind_perception_scale.php","C4_4_demographics.php","C4_5_final.php"];


// need to open when the exp was launched

if (array_search(basename($_SERVER["PHP_SELF"]), $pages) != array_search(basename($_SERVER["HTTP_REFERER"]), $pages)+1) {header("Location:C4_0_informed_consent.php");}


?>