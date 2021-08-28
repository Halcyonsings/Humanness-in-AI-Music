<?php

// reference
// $pages = ["index.html","0_introduce.php","0_consent.php","1_cognitive_style.php","2_opinion1.php","3_personality1.php","4_recognition1.php","5_opinion2.php","6_personality2.php","7_recognition2.php","8_demographics.php","9_result.php"];

$pages = ["N3_0_informed_consent.php","N3_1_headphone.php","N3_2_listening_phase_radio.php","N3_3_mind_perception_scale.php","N3_4_demographics.php","N3_5_final.php"];

// need to open when the exp was launched

if (array_search(basename($_SERVER["PHP_SELF"]), $pages) != array_search(basename($_SERVER["HTTP_REFERER"]), $pages)+1) {header("Location:N3_0_informed_consent.php");}


?>
