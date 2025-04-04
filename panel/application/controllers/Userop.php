<?php

class Userop extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_model");

    }

    public function login(){

        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function do_login(){

        if(get_active_user()){
            redirect(base_url());
        }

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("user_email", "E-posta", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Şifre", "required|trim|min_length[6]|max_length[8]");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz",
                "min_length"  => "<b>{field}</b> en az 6 karakterden oluşmalıdır",
                "max_length"  => "<b>{field}</b> en fazla 8 karakterden oluşmalıdır",
            )
        );

        // Form Validation Calistirilir..
        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            //email ve şifremle uyumlu tek kayıt olacağından get fonksiyonu kullandık
            //md5 hashleme kullanıldı şifreyi dönüştürüyor
            $user = $this->user_model->get(
                array(
                    "email"    => $this->input->post("user_email"),
                    "password" => md5($this->input->post("user_password")),
                    "isActive" => 1
                )
            );

            if($user){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "$user->full_name Hoş Geldiniz!",
                    "type"  => "success"
                );
                //session değeri buradan veritabanındaki userı çeker 
                //kullanıcımın giriş yapıp yapmadığını user adlı indiste tutuyorum
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {

                // Hata Verilecek...

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Lütfen giriş bilgilerinizi kontrol ediniz!",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));

            }
        }
    }

    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("login"));

    }

}
