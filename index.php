  <!DOCTYPE html>
  <html>
  <head>
  	<title>Time and Date</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body>
  <!DOCTYPE html>
  <html>
  <body>

  <div class="container" style="text-align: center; background: #D3D3D3">
   <form action = "<?php $_PHP_SELF ?>" method = "GET">
  	<h2>Weekday Calculator</h2><br><br><br><br><br>
  	<div class="row">
  		<div class="col-md-3">
    
  			<div class="form-group">
  	        <label>Day:</label><br>

  	        <select name="day" id="day" class="form-control">
              <?php
                 for ($day = 1; $day <= 31; $day++) { ?>
        <option value="<?php echo $day ?>"><?php if($day<10) {echo "0".$day;} else{ echo $day;}?></option>
    <?php
      } ?>
  </select> 
            
       		</div>
       	</div>
  		<div class="col-md-3">
  			<div class="form-group">
  	        <label>Month:</label><br>
              <select name="month" id="month" class="form-control">
              <?php

                 for ($month = 1; $month <= 12; $month++) { ?>
                  <option value="<?php echo $month ?>"><?php if($month<10) {echo "0".$month;} else{ echo $month;}?></option>
                 <?php
                } ?>
  </select>
       		</div>
  		</div>

  		<div class="col-md-3">
  			<div class="form-group">
  	        <label>Year:</label><br>
               <select name="year" id="year" class="form-control">
              <?php
                 $year;
                 for ($year = 1965; $year <= 2050; $year++) { ?>
                  <option value="<?php echo $year ?>"><?php echo $year ?></option>
                 <?php
                } ?>
  </select>
       		</div>
  		</div>
  		<div class="col-md-3">
  			<div class="form-group">
  	        <label>&nbsp;</label><br>
              <input type="submit" name="submit" class="btn btn-success" <a href="index.php"></a>
    </div>
     
    </div>
    <?php

    if(isset($_GET['submit'])){

    
$date = new DateTime();
$date->setDate($_GET['year'], $_GET['month'] , $_GET['day']);
//echo $date->format('Y-m-d');
$time = strtotime($date->format('Y-m-d'));

 $month =$_GET['month']; 
$year = $_GET['year']; 
$day=$_GET['day'];
$monthName = date("F", mktime(0, 0, 0, $month));
$start_date = date('Y-m-01'.strtotime("First Day of $monthName $year"));
 $end_date = date('Y-m-d'.strtotime("Last Day of $monthName $year"));
//$start_time = date('Y-m-d',strtotime($start_date));
//$day = mktime(0, 0, 0,  $month);
$dayNumber = date("d", $time);
$dayOfWeek = date("l", $time);


$dayPosition = (floor(($dayNumber - 1) / 7) + 1);







switch ($dayPosition) {
    case 1:
        $suffix = 'st';
        break;
    case 2:
        $suffix = 'nd';
        break;
    case 3:
        $suffix = 'rd';
        break;
    default:
        $suffix = 'th';
}

//echo "Today is the " . $dayPosition . $suffix . " " . $dayOfWeek . " of the month.";

 function cal_days_in_year($year){
    $days=0; 
    for($month=1;$month<=12;$month++){ 
        $days = $days + cal_days_in_month(CAL_GREGORIAN,$month,$year);
     }
 return $days;
}
$timefromdb = cal_days_in_year($_GET['year']);
$timeleft = $date->format('z');
$daysleft = ($timefromdb-$timeleft)-1;  

//echo cal_days_in_year(2017);
// leap year  

//var_dump(checkdate($month, $day, $year))

// returns a boolean value after validation of date 
// non-leap year  

$dayNo = date("z",$time)+1;



$dayNyear=floor($dayNo/7) + floor((365-$dayNo)/7) + floor((($dayNo%7) + (365-$dayNo)%7)/7);
$dayNmonth = floor($day/7)+ floor((date("d",strtotime("Last Day of $monthName $year"))-$day)/7) + floor((($day%7) + (date("d",strtotime("Last Day of $monthName $year"))-$day)%7)/7)+1;

?>
 
 <ul><h3><?php echo $_GET['day'] ." ".date("F",$time) ." ".$_GET['year'] ." "."is a" . " ".date("l",$time);?></h3>

 <ul><h3>Additional facts</h3>
<li><?php echo "It is day number" ." ".$dayNo ." "."of the year".",". $daysleft ." "."days left ." ;?></li><br>
<li><?php echo "It is". " ".date("l",$time). " "."number "." ".date("W",$time) ." "."out of "." ".$dayNyear." "."in" ." ".$_GET['year'];?></li>
<li><?php echo "It is ". " ". $dayPosition . $suffix . " " . $dayOfWeek   . " "."out of ". ",".$dayNmonth . " "."in". " ". date("F",$time) . " ".$_GET['year'];?></li>
<li><?php echo "Year". " ". $_GET['year'] ." "." has" ." ". cal_days_in_year($_GET['year']). "days.";?></li>
<li><?php echo date("F",$time) . " ".$_GET['year'] . " "."has"." ".date("d",strtotime("Last Day of $monthName $year"))." days.";?></li>

<?php } ?>

</ul>
  </div>
  </form>
  </div>
  </body>
  </html>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
  	.container{
  	
          padding-top: 50px;
          height:700px;
          width: 700px;

  	}
  </style>