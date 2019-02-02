<?php
		session_start();
                define('CAPTCHA_WIDTH',100);
                define('CAPTCHA_HEIGHT',25);
                define('CAPTCHA_NUMCHARS',6);
                $img=imagecreatetruecolor(CAPTCHA_WIDTH,CAPTCHA_HEIGHT);
		$bg_color=imagecolorallocate($img,255,255,255);
                $text_color=imagecolorallocate($img,0,0,0);
                $graphic_color=imagecolorallocate($img,64,64,64);       
                              $pass_phrase="";
                              for($i=0;$i<CAPTCHA_NUMCHARS;$i++)
                              { 
                                      $pass_phrase.=chr(rand(97,122));
                              }
                                $_SESSION['dash_pass_phrase']=sha1($pass_phrase);
                                    imagefilledrectangle($img,0,0,CAPTCHA_WIDTH,CAPTCHA_HEIGHT,$bg_color);
                                  for($i=0;$i<5;$i++){
                                   imageline($img,0,rand()%CAPTCHA_HEIGHT,CAPTCHA_WIDTH,rand()%CAPTCHA_HEIGHT,$graphic_color);
                                }
                                for($i=0;$i<50;$i++){
                                   imagesetpixel($img,rand()%CAPTCHA_WIDTH,rand()%CAPTCHA_HEIGHT,$graphic_color);
                                }
                                imagettftext($img,18,0,5,CAPTCHA_HEIGHT-5,$text_color,'Courier New Bold.ttf',$pass_phrase);
                                
                                header("Content-type:image/png");
                                imagepng($img);
                                imagedestroy($img);
                              ?>