<?php

public function redirection($url){
    header('Location: '. URL_PROJECT .$url);
}