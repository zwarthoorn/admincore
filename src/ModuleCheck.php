<?php namespace Zwarthoorn\Admincore;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class ModuleCheck
{

	
	private $allcheck;
	public function test()
	{
		return 'yes';
	}
	public function checkAll()
	{
		$this->allcheck['blog'] = $this->checkBlog();

		return $this->allcheck;
	}
	private function checkBlog()
	{
		return config('admincore.Blog');
	}
}