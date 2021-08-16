<?php

class App{
    public function __construct()
    {
        $url = $this->parseURL(); // method ada di bawah
        var_dump($url);
    }

    public function parseURL(){
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'],'/');
            /* 
                rtrim digunakan untuk menghappus sebuah karakter
                dalam kasus ini di URL terdapat char '/' oleh sebab itu
                yang ingin ditrim di parameter 2 adalah '/' maka char
                tersebut akan hilang
            */
            $url = filter_var($url,FILTER_SANITIZE_URL);
            /*
                filter_var adalah fungsi yang digunakan untuk
                menghapus dan mengfilter karakter yang diinput
                oleh user di URL dari char char yang sembarangan
                atau aneh (* $ % dsb)
            */
            $url = explode('/',$url);
            /*
                url dipecah kembali menggunakan fungsi explode
                dengan pemecahan setiap /, contoh :
                www.facebook.com/profil/hobby 

                maka akan dipecah menjadi :
                ["www.facebook.com","profil","hobby"] 
                jadi array
            */
            return $url;
        }
    }
}

?>