<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

<title>PHP MeetUp location poll</title>

<style type="text/css">


td {
 border:1px solid;
}

td input {
 text-align:center;
}

th {
 width:12%;
 text-align:center;
}

</style>

<script type="text/javascript">
function correctZip(zip) {
 if (zip.value.match(/\d{1,5}/))
  zip.style.background = "white";
 else
  zip.style.background = "pink";
}
function checkZip(zip) {
 var zip = document.getElementById("zip");
 if (!zip.value.match(/\d{5}/))
  zip.style.background = "pink";
 else
  zip.style.background = "white";
}
</script>

</head>

<body>

<?php

if (isset($_POST["zip"])) {
 # Initialize MySQL session

 # acknowledge receipt of user data

 print_r($_POST); # flesh it out later

 # print those user comments marked public

 # print projections based on data so far
  # 'centroid' of zip codes taken to be consensus location
  # provide a list of day/hour combinations ordered by popularity, descending

}
else {
 echo <<<ABOVE_GRID
<form method="post" action="index.php">

<fieldset>

<legend>Please enter a USA zip code indicating your preferred location for a PHP MeetUp</legend>
<input type="text" name="zip" id="zip"
 onchange="correctZip(this);"
 onblur="checkZip(this);" />

</fieldset>

<fieldset>

<legend>Please indicate days and times (in a typical week) when you will most likely be able to attend a PHP MeetUp</legend>

ABOVE_GRID;

 echo "<table><thead><tr>";
 foreach ($days = array("time", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday") as $day) {
  echo "<th id=\"$day\">$day</th>";
 }
 echo "</tr></thead>\n";
 for ($hour = 8; $hour < 22; $hour++) {
  echo "<tr>";
  echo "<th headers=\"time\">" . ($hour > 12 ? $hour-12 : $hour) . ($hour >= 12 ? "p" : "a") . "</th>";
  for ($day = 0; $day < 7; $day++) {
   echo "<td headers=\"" . $days[$day] . "\"><input type=\"checkbox\" name=\"";
   echo 24*$day+$hour;
   echo "\" /></td>";
  }
  echo "</tr>\n";
 }
 echo "</table>";
 

 echo <<<BELOW_GRID

<p>Note that EDT starts 2013-03-10</p>

</fieldset>

<fieldset>

<legend>Please enter any comments you may have about this scheduling process</legend>

<textarea name="comments" rows="24" cols="80"></textarea>
<br />
<label for="checkbox">Check if your comment is for public consumption.</label>
<input type="checkbox" name="public" />
<br />
<input type="submit" value="done" />

</fieldset>

</form>
BELOW_GRID;
}

?>

<script type="text/javascript">
var zip = document.getElementById("zip");
zip.focus();
</script>

</body>

</html>

