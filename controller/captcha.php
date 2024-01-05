<?php

class RandomStrings {
    public function captcha() {
      $moy=6;
      function getRand($moy) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i=0; $i < $moy; $i++) { 
          $index = rand(0, strlen($characters) - 1);
          $randomString .= $characters[$index];
        }

        return $randomString;
      }

      $rand = getRand($moy);

      return $rand;
    }
}