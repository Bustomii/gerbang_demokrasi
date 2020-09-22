<?php namespace App\Controllers;

class AdminControllers extends BaseController
{

	public function index()
	{
		return redirect()->to(base_url('/admin') );
    }
    
    public function dashboard()
	{
        $active = 'dashboard';
        return view('admin/dashboard', ['active'=>$active]);
	}

    public function calonPasangan()
	{
        $active = 'pasangan_calon';
        return view('admin/lihat_calon', ['active'=>$active]);
    }
    
    public function panitia()
	{
        $active = 'panitia';
        return view('admin/lihat_panitia', ['active'=>$active]);
	}
	//--------------------------------------------------------------------

}
