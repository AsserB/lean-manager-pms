<?php

namespace controllers\info;

class InfoController
{

    public function index()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/index.php';
    }

    public function rcbt()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/rcbt.php';
    }

    public function about()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/about.php';
    }
    public function school()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/school.php';
    }
    public function courses()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/courses.php';
    }
    public function policy()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/policy.php';
    }

    public function cookie()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/cookie.php';
    }

    public function useragreement()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        include 'app/views/info/useragreement.php';
    }
}
