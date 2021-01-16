<?php
class Role extends Controller
{

    public function index()
    {
        // $this->view('login_regist/login');
    }

    public function members()
    {
        view('roles/members/index');
    }

    public function ameeen_home()
    {
        $user = $this->model("User");
    
        $user->get_all_user_info($_SESSION['login_id'],"ameeen");

    }

    public function leaders()
    {
       view('roles/leaders/index');
    }

    /////////////////////////////////ameeen Section
    public function ameeen (){
        view('roles/ameeen/index');
    }
    /////////////////////////////////End of ameeen Section

 }

?>