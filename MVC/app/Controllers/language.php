<?php
class Language extends Controller
{
	public function ar()
	{
		set_lang('ar');
		redirect("home");
	}

	public function en()
	{
		set_lang('en');
		redirect("home");
	}


}
