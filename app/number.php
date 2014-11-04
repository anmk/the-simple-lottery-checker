<?php
/*
 * $Id: number.php, v 1.0
 * The Simple Lottery Checker
 * Copyright (c) 2014 Andrzej Kałowski
 * http://lotek.kalowski.com
 */

include_once('init.php');

if(isset($_POST['numSubmit'])){

$Transfer->setInfo('cNumber1', $_POST['choosedNumber1']);
$Transfer->setInfo('cNumber2', $_POST['choosedNumber2']);
$Transfer->setInfo('cNumber3', $_POST['choosedNumber3']);
$Transfer->setInfo('cNumber4', $_POST['choosedNumber4']);
$Transfer->setInfo('cNumber5', $_POST['choosedNumber5']);
$Transfer->setInfo('cNumber6', $_POST['choosedNumber6']);

$Transfer->setInfo('dNumber1', $_POST['drawnNumber1']);
$Transfer->setInfo('dNumber2', $_POST['drawnNumber2']);
$Transfer->setInfo('dNumber3', $_POST['drawnNumber3']);
$Transfer->setInfo('dNumber4', $_POST['drawnNumber4']);
$Transfer->setInfo('dNumber5', $_POST['drawnNumber5']);
$Transfer->setInfo('dNumber6', $_POST['drawnNumber6']);

    if($_POST['choosedNumber1'] == '' || $_POST['choosedNumber2'] == '' || $_POST['choosedNumber3'] == '' || $_POST['choosedNumber4'] == '' || $_POST['choosedNumber5'] == '' || $_POST['choosedNumber6'] == ''){
	        $Transfer->setColourAlert(ENTER_ALL_NUMBER,'redColourM');
	        $Transfer->loadLink("views/number_v.php");
		 
		}else if($_POST['drawnNumber1'] == '' || $_POST['drawnNumber2'] == '' || $_POST['drawnNumber3'] == '' || $_POST['drawnNumber4'] == '' || $_POST['drawnNumber5'] == '' || $_POST['drawnNumber6'] == ''){
	        $Transfer->setColourAlert(ENTER_ALL_NUMBER,'redColourM');
	        $Transfer->loadLink("views/number_v.php");
		 
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('cNumber1'))){
	        $Transfer->setColourAlert(CORRECT_FIRST_CHOOSED_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
		 
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('cNumber2'))){
	        $Transfer->setColourAlert(CORRECT_SECOND_CHOOSED_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('cNumber3'))){
	        $Transfer->setColourAlert(CORRECT_THIRD_CHOOSED_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('cNumber4'))){
	        $Transfer->setColourAlert(CORRECT_FOURTH_CHOOSED_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('cNumber5'))){
	        $Transfer->setColourAlert(CORRECT_FIFTH_CHOOSED_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('cNumber6'))){
	        $Transfer->setColourAlert(CORRECT_SIXTH_CHOOSED_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
		
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('dNumber1'))){
	        $Transfer->setColourAlert(CORRECT_FIRST_DRAWN_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
		 
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('dNumber2'))){
	        $Transfer->setColourAlert(CORRECT_SECOND_DRAWN_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('dNumber3'))){
	        $Transfer->setColourAlert(CORRECT_THIRD_DRAWN_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('dNumber4'))){
	        $Transfer->setColourAlert(CORRECT_FOURTH_DRAWN_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('dNumber5'))){
	        $Transfer->setColourAlert(CORRECT_FIFTH_DRAWN_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
			
		} else if (!preg_match('^[0-9]{1,}$^', $Transfer->getInfo('dNumber6'))){
	        $Transfer->setColourAlert(CORRECT_SIXTH_DRAWN_NUMBER,'redColourM');        
	        $Transfer->loadLink("views/number_v.php");
		 
		} else {
			
			$cNumbers = array($Transfer->getInfo('cNumber1'), $Transfer->getInfo('cNumber2'), $Transfer->getInfo('cNumber3'), $Transfer->getInfo('cNumber4'), $Transfer->getInfo('cNumber5'), $Transfer->getInfo('cNumber6'));
			$dNumbers = array($Transfer->getInfo('dNumber1'), $Transfer->getInfo('dNumber2'), $Transfer->getInfo('dNumber3'), $Transfer->getInfo('dNumber4'), $Transfer->getInfo('dNumber5'), $Transfer->getInfo('dNumber6'));
		
		echo '<table align="center"><td align="left"><br>';	
			foreach ($cNumbers as $cNumber => $cValue) {
    			echo $cNumber+1 . CHOOSED_NUMBER . '<span class="textYellow">' . $cValue . '</span>' . '<br/>';	
			}
			echo '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>';
			
			echo '<td align="left"><br>';		
			foreach ($dNumbers as $dNumber => $dValue) {
    			echo $dNumber+1 . DRAWN_NUMBER . '<span class="textGreen">' . $dValue . '</span>' . '<br/>';	
			}	
		echo '</td></table>';
		
		echo '<table align="center"><td align="center"><br>';		
			//echo "<br>" . LUCKY_NUMBERS . "<br>"; //unsorted outcome
			$outcome = array();
			$w = 0;	
			foreach ($cNumbers as $cNumber => $cValue) {
				foreach ($dNumbers as $dNumber => $dValue) {
					if ($cValue == $dValue){
						array_push($outcome, $cValue);
						//echo '<span class="textRed">&nbsp' . $cValue . '</span>&nbsp'; //unsorted outcome
						$w++;
					}
				}
			}
			//echo '<br>';
			echo '<br><align="center">' . SORT_LUCKY_NUMBERS . '<br><br>';
			$sortOutcome = array();
			$sortOutcome = $outcome;
			sort($sortOutcome);
		
			foreach($sortOutcome as $sortcValue){
				echo '&nbsp' . '<span class="textRed">' . $sortcValue . '</span>' . '&nbsp'; //sorted outcome
			}	
			
			echo '<p>' . YOU_HAVE . '<span class="textGreen">' . $w . '</span>' . GUESS . '</p>';
		echo '</td></table>';
		
	    }
    
	} else {
     $Transfer->loadLink("views/number_v.php");
	}
