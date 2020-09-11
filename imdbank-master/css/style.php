<?php
    header("Content-type: text/css; charset: UTF-8");

   $errorColor = "#000000";
   $errorText = "Muli";
   $errorAlign = "center";
   $errorMarginLeft = "-10%";
   $errorMarginRight = "20%";
   $errorMarginTop = "2.5%";
   $errorFontType = "italic";
   $errorPadding = "2.5%";
   $errorRadius = "7px";
   $errorBackgroundColor ="#ff0033";

   $succesColor = "#000000";
   $succesText = "Muli";
   $succesAlign = "center";
   $succesMarginLeft = "-126%";
   $succesMarginRight ="126%";
   $succesMarginTop = "-60%";
   $succesFontType = "italic";
   $succesPadding = "2.5%";
   $succesRadius = "7px";
   $succesBackgroundColor ="#00ffcc";
   $succesHeight ="40px";
   $succesWidth ="100px";
?>

.error {
  color: <?php echo $errorColor; ?>;
  font-family: <?php echo $errorText; ?>;
  text-align: <?php echo $errorAlign; ?>;
  margin-left: <?php echo $errorMarginLeft; ?>;
  margin-right: <?php echo $errorMarginRight; ?>;
  margin-top: <?php echo $errorMarginTop; ?>;
  font-style: <?php echo $errorFontType; ?>;
  border-radius: <?php echo $errorRadius; ?>;
  background-color: <?php echo $errorBackgroundColor; ?>;
  padding: <?php echo $errorPadding; ?>;
}

.success{
  color: <?php echo $succesColor; ?>;
  font-family: <?php echo $succesText; ?>;
  text-align: <?php echo $succesAlign; ?>;
  margin-left: <?php echo $succesMarginLeft; ?>;
  margin-right: <?php echo $succesMarginRight; ?>;
  margin-top: <?php echo $succesMarginTop; ?>;
  font-style: <?php echo $succesFontType; ?>;
  border-radius: <?php echo $succesRadius; ?>;
  background-color: <?php echo $succesBackgroundColor; ?>;
  padding: <?php echo $succesPadding; ?>;
  height: <?php echo $succesHeight; ?>;
  width: <?php echo $succesWidth; ?>;
}