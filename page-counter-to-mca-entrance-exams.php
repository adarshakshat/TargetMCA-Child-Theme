<?php get_header();?>


<h1 class="text-center">
	MCA Entrance Exams Date Counter
</h1>
<?php 

$nimcetdate = strtotime("August 9, 2020 10:00 AM");
$remaining = $nimcetdate - time();
//echo $remaining;
$days_remaining = floor($remaining / 86400);
?>

<div class="container text-center">
<h2> <?php
echo $days_remaining;
?> Days for Nimcet Exam 

</h2>
<? // Counter for MAH MCA Exam
$mahmcadate = strtotime("July 19, 2020 10:00 AM");
$remaining = $mahmcadate - time();
//echo $remaining;
$days_remaining = floor($remaining / 86400); ?>

<h2> <?php
echo $days_remaining;
?> Days for MAH MCA Exam 

</h2>

</div>
<?php get_footer();?>