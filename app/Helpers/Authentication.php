<?php

	use Illuminate\Support\Facades\Auth;
	use App\Models\Student;
	use App\Models\Admin;
	use App\Models\Doctor;

	//singloTon desgin pattern
	class Authentication{
		private static $Auth;
		private function __construct()
		{
		}

		public static function getAuth()
		{
			if(!self::$Auth)
			{
				if(Auth::check())
					self::$Auth= Admin::find(Auth::user()->id);
				elseif( Auth::guard('students')->check())
					self::$Auth= Student::find(Auth::guard('students')->user()->id);
				elseif( Auth::guard('doctors')->check())
					self::$Auth= Doctor::find(Auth::guard('doctors')->user()->id);
				else 
					self::$Auth= NULL;
			}
			return self::$Auth;
		}

		public static function setAuth($auth)
		{
			if(!self::$Auth)
				self::$Auth= $auth;
		}

	}