<?php
class ArrayFuncations
{


public $singleAray=array("S","A","I",'N');
public $singleAray2=array("N","T","H",'S');
public $AssocAray=array("s0"=>"sa","s1"=>"in","s2"=>"ath");
public $SameValuAr=array("a"=>"red","b"=>"green","c"=>"red");
public $Global_Varivble="Top Bar";
public $numarr=array(1,2,3,4,5);

		public function index()
		{
			return $this->Global_Varivble." Index Controller";
		}
		public function singleAr()
		{
			return $this->singleAray;
		}
		public function singleAr2()
		{
			return $this->singleAray2;
		}
		public function assocAr()
		{
			return $this->AssocAray;
		}

public function SameValuAr()
		{
			return $this->SameValuAr;
		}

		public function array_change_key_case()
		{
			return array_change_key_case($this->AssocAray,CASE_UPPER);
		}
		public function array_combine()
		{
			return array_combine($this->singleAray,$this->singleAray2);
		}
		public function array_count_values()
		{
			return array_count_values($this->singleAray);
		}
		public function array_diff()
		{
			return array_diff($this->singleAray,$this->singleAray2);
		}
		public function array_fill()
		{
			return array_fill(2,4,"Swing");
		}
		public function array_flip(){

			return array_flip($this->singleAray2); 
		}
		public function array_intersect()
		{
			return array_intersect($this->singleAray,$this->singleAray2);
		}
		public function array_key_exists()
		{
			if(array_key_exists("s0",$this->AssocAray))
			{
				return "exists";
			}else{
				return "not exist";	
			}
		}
		public function myfunctions($num)
		{
		  return($num*$num);
		}
		public function array_map()
		{
			return array_map(array($this, 'myfunctions'),$this->numarr);
		}
		public function array_push()
		{
			$a=$this->singleAray;
			array_push($a,'Swing','Wind');
			return $a;
		}
		public function array_rand()
		{
			return array_rand($this->AssocAray,2);
		}		
		public function array_replace()
		{
			return array_replace($this->singleAray,$this->singleAray2);
		}
		public function array_search()
		{
			return array_search('S',$this->singleAray2);
		}
		public function array_walk()
		{
			 array_walk($this->singleAray2,array($this, 'myfunctionsss'));
		}
	public	function myfunctionsss($value,$key)
		{
			echo "The key $key has the value $value<br>";
		}
		public function array_unique()
		{
			return array_unique($this->SameValuAr);
		}



}
class childArray extends ArrayFuncations
{
	public static function childFunc()
	{
		return "Footer Static Function";
	}
}
	$ArObj=new ArrayFuncations;
	//echo "<b>".$ArObj->index()."</b>";
	//echo "<br>";
	//print_r($ArObj->array_change_key_case());

	//echo "<br>";
	//echo "<b>".childArray::childFunc()."</b>";
?>

<table width="100%" border="1" cellpadding="8"  cellspacing="1">
<tr><th colspan="4"><?=$ArObj->index()?></th></tr>
<tr><th>Function Name</th><th>Used Arrays</th><th>Result</th><th>Descrption</th></tr>
<tr><td>array_change_key_case</td><td><?php print_r($ArObj->assocAr());?></td><td><?php print_r($ArObj->array_change_key_case());?></td><td>changes all keys in an array to lowercase or uppercase.</td></tr>
<tr><td>array_combine</td><td><?php print_r($ArObj->singleAr());echo "<br>";print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_combine());?></td><td>creates an array by using the elements from one keys array and one values array.</td></tr>
<tr><td>array_count_values</td><td><?php print_r($ArObj->singleAr());?></td><td><?php print_r($ArObj->array_count_values());?></td><td>counts all the values of an array.</td></tr>
<tr><td>array_diff</td><td><?php print_r($ArObj->singleAr());echo "<br>";print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_diff());?></td><td>returns the differences</td></tr>
<tr><td>array_fill</td><td>-</td><td><?php print_r($ArObj->array_fill());?></td><td>Fill an array with values</td></tr>
<tr><td>array_flip</td><td><?php print_r($ArObj->singleAr2());?>td><td><?php print_r($ArObj->array_flip());?></td><td>Echanges all keys with their associated values in an array.</td></tr>
<tr><td>array_intersect</td><td><?php print_r($ArObj->singleAr());echo "<br>";print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_intersect());?></td><td>return the matches</td></tr>

<tr><td>array_key_exists</td><td><?php print_r($ArObj->singleAr());echo "<br>";print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_key_exists());?></td><td>Checks Specified Key exists in an array</td></tr>



<tr><td>array_map</td><td><?php print_r($ArObj->singleAr());echo "<br>";print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_map());?></td><td>Checks Specified Key exists in an array</td></tr>


<tr><td>array_push</td><td><?php print_r($ArObj->singleAr());?></td><td><?php print_r($ArObj->array_push());?></td><td>Inserts one or more elements to the end of an array</td></tr>

<tr><td>array_rand</td><td><?php print_r($ArObj->singleAr());?></td><td><?php print_r($ArObj->array_rand());?></td><td>Returns a random key from array</td></tr>
<tr><td>array_replace</td><td><?php print_r($ArObj->singleAr());echo "<br>";print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_replace());?></td><td>Replace the values of the first array with the values from the second array</td></tr>

<tr><td>array_search</td><td><?php print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_search());?></td><td>Search The Value and Returns Key value</td></tr>

<tr><td>array_walk</td><td><?php print_r($ArObj->singleAr2());?></td><td><?php print_r($ArObj->array_walk());?></td><td>Run each array element in a user-defined function</td></tr>

<tr><td>array_unique</td><td><?php print_r($ArObj->SameValuAr());?></td><td><?php print_r($ArObj->array_unique());?></td><td>Removes duplicate values from an array</td></tr>








<tr><th colspan="4"><?=childArray::childFunc()?></th></tr>
</table>
