<?php
  $navArray = array(
    'index' => 'Home',
    'studentInfo' => 'Student Information',
    'instructorInfo' => 'Instructor Information',
    'payment' => 'Payment Information',
    'Examination' => 'Exam Markings'
  );
?> 

<ul class="nav nav-justified">

    <?php // iterate through each nav item - also use the array key as $key ?>
        <?php foreach($navArray as $key => $nav) : ?>
    <?php
        // see if the string exists in the server script name
        // this is the name and path from the root URL of the file
        // if the current page is the item in the loop, add class="active"
        if(strstr($_SERVER['SCRIPT_NAME'], $key)) $active = 'class="active"';
        else $active = '';
    ?>
        <!-- create the list item adding in the class="active" if needed, the href and link name -->
        <li <?=$active; ?>><a href="<?=$key; ?>.php"><?=$nav; ?></a></li>
    <?php endforeach; ?>

</ul>

<a href="processLogout.php">Click to Logout.</a>