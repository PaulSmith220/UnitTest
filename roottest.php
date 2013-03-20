<?php
class testModule
{	
	public $object;
	public $tmpfunc;

	private function showOK(){
		echo "<font color=green>OK!</font>";
	}
	private function showError($func, $error = ""){
		echo "<font color=red>$func Failed!! $error</font>";
	}

	public function startTesting(){

		$childClass = get_called_class(); // User-test-class name
		$testlist = get_class_methods($childClass); // List of it's methods
		$methods = get_class_methods(get_class()); // List of testModule methods
		$tests_to_do = array(); // List of tests

		foreach($testlist as $test){
			if (!in_array($test, $methods) && $test!='__construct'){
				$tests_to_do[] = $test;
			}
		}
		unset($testlist, $methods);

		echo "Start testing &lt; <b>".$childClass."</b> &gt;, test object: &lt; <b>".get_class($this->object)."</b> &gt;<br>";
		echo "Amount of tests: ".count($tests_to_do)."<Br>";

		echo "<table cellpadding='5' cellspacing='0'>";
		foreach($tests_to_do as $test){
			echo "<tr><td>".$test." </td><td>";
			call_user_func(array($this,$test));
			echo "</td></tr>";
		}

		echo "</table>";
	}

	public function assertTrue($func,$name)
	{	
		$func?$this->showOK():$this->showError(__FUNCTION__);
	}

	public function assertFalse($func,$name)
	{
		$func?$this->showOK():$this->showError(__FUNCTION__);
	}

	public function assertInt($func,$name)
	{
		is_int($func)?$this->showOK():$this->showError(__FUNCTION__,"<b>$func</b> is not Integer.");
	}
	public function assertFloat($func,$name)
	{
		is_float($func)?$this->showOK():$this->showError(__FUNCTION__,"<b>$func</b> is not FLOAT.");
	}
	public function assertString($func,$name)
	{
		is_string($func)?$this->showOK():$this->showError(__FUNCTION__,"<b>$func</b> is not STRING.");
	}
	public function assertArray($func,$name)
	{
		is_array($func)?$this->showOK():$this->showError(__FUNCTION__,"<b>$func</b> is not an ARRAY.");
	}



}

?>