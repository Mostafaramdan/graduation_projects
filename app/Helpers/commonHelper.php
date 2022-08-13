<?php
	use Illuminate\Support\Facades\Auth;
	use App\Models\schools;
	use Illuminate\Support\Str;
	require_once('Authentication.php');

	function AuthLogged()
	{
		return Authentication::getAuth();

	}

	function SetAuth($auth){

		return Authentication::setAuth($auth);

	}


	function UniqueRandomXDigits ($Digits,$column=null,$tables=[])
	{
		$Digits=$Digits??5;
		$code= rand(pow(10, $Digits-1), pow(10, $Digits)-1);
		for($i=0;$i<count($tables??[]);$i++){ 
			$model='\App\Models\\'.$tables[$i];
			if($model::where($column,$code)->count() != 0){
				$code= rand(pow(10, $Digits-1), pow(10, $Digits)-1);
				$i=0;
			}
		}	
		return $code;
	}
	
	function permissionInfo($module)
	{
		$myPermissions=[];
		if (str_contains($module['permissions'],'r')){
			$myPermissions[]=['bg'=>'secondary','input'=>$module['name'].'-read','display'=>__('gars.read')];
		}                                                                           
		if (str_contains($module['permissions'],'c')){
			$myPermissions[]=['bg'=>'primary','input'=>$module['name'].'-create','display'=>__('gars.create')];
		}                                                                           
		if (str_contains($module['permissions'],'u')){
			$myPermissions[]=['bg'=>'success','input'=>$module['name'].'-update','display'=>__('gars.update')];
		}                                                                           
		if (str_contains($module['permissions'],'d')){
			$myPermissions[]=['bg'=>'danger','input'=>$module['name'].'-delete','display'=>__('gars.delete')];
		}                     
		return $myPermissions;
	}
	
	function createImage($img,$folderPath)
    {
		if(!$img)return null;
		$folderPath="uploads/{$folderPath}/";
		if (!file_exists( $folderPath)) 
					mkdir( $folderPath, 0777, true);
					
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
		return $file;
    }

	function uploadFile($image,$folderName)
	{
		if(!$image) return ;
		$folderPath="uploads/{$folderName}/";
		if (!file_exists( $folderPath)) 
					mkdir( $folderPath, 0777, true);
		//   $img_name = str::random(30) .now()->timestamp.'.' . $image->getClientOriginalExtension();//generate new name
			$img_name = str::random(5) .now()->timestamp. '-'.$image->getClientOriginalName().'.' . $image->getClientOriginalExtension();//generate new name
			$image->move( public_path('uploads/'.$folderName) , $img_name);//move function accept 2para('destnation','filename')
		return '/uploads/'.$folderName.'/'.$img_name;  
					
	}  

	function compareStrings($s1, $s2) {
		//one is empty, so no result
		if (strlen($s1)==0 || strlen($s2)==0) {
			return 0;
		}
	
		//replace none alphanumeric charactors
		//i left - in case its used to combine words
		$s1clean = preg_replace("/[^A-Za-z0-9-]/", ' ', $s1);
		$s2clean = preg_replace("/[^A-Za-z0-9-]/", ' ', $s2);
	
		//remove double spaces
		while (strpos($s1clean, "  ")!==false) {
			$s1clean = str_replace("  ", " ", $s1clean);
		}
		while (strpos($s2clean, "  ")!==false) {
			$s2clean = str_replace("  ", " ", $s2clean);
		}
	
		//create arrays
		$ar1 = explode(" ",$s1clean);
		$ar2 = explode(" ",$s2clean);
		$l1 = count($ar1);
		$l2 = count($ar2);
	
		//flip the arrays if needed so ar1 is always largest.
		if ($l2>$l1) {
			$t = $ar2;
			$ar2 = $ar1;
			$ar1 = $t;
		}
	
		//flip array 2, to make the words the keys
		$ar2 = array_flip($ar2);
	
	
		$maxwords = max($l1, $l2);
		$matches = 0;
	
		//find matching words
		foreach($ar1 as $word) {
			if (array_key_exists($word, $ar2))
				$matches++;
		}
	
		return ($matches / $maxwords) * 100;    
	}