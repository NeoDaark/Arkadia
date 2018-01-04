<?php
    $function = $_POST['function'];
    $file = 'Logs/'.$_POST['file'];
    $log = array();
    
    switch($function) {
        case('load'):
            if (file_exists($file)) {
                $lines = file($file);
                $text= array();
                foreach ($lines as $line_num => $line) {
                    $text[] =  $line = str_replace("\n", "", $line);
                }
                $log['text'] = $text; 
            }else{
                fwrite(fopen($file, 'a'), "<div class='chatbox pull-left f-11 text-center system'><span>¡Inicio de la sesion de roleo!</span></div>\n"); 
            }
            break;
        
        case('getState'):
            if (file_exists($file)) {
                $lines = file($file);
            }
            $log['state'] = count($lines); 
            break;  
      
        case('update'):
           $state = $_POST['state'];
           if (file_exists($file)) {
              $lines = file($file);
           }
           $count =  count($lines);
           if ($state == $count){
              $log['state'] = $state;
              $log['text'] = false;
           } else {
              $text= array();
              $log['state'] = $state + count($lines) - $state;
              foreach ($lines as $line_num => $line) {
                  if ($line_num >= $state){
                        $text[] =  $line = str_replace("\n", "", $line);
                  }
              }
              $log['text'] = $text; 
           }

           break;
       
        case('send'):
            $nickname = htmlentities(strip_tags($_POST['nickname']));
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            $message = htmlentities(strip_tags($_POST['message']));
            if (($message) != "\n") {
                if (preg_match($reg_exUrl, $message, $url)) {
                   $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
                } 
                $color = $_POST['color'];
                $message = str_replace(":animaster:", "<img src='../../Public/img/favicon/live.ico'>", $message);
                $message = str_replace(":damage:", "<img src='../../Public/img/favicon/damage.ico'>", $message);
                $message = str_replace(":bat:", "<img src='../../Public/img/favicon/bat.ico'>", $message);
                $message = str_replace(":fireball:", "<img src='../../Public/img/favicon/fireball.ico'>", $message);
                $message = str_replace(":heart:", "<img src='../../Public/img/favicon/heart.ico'>", $message);
                $message = str_replace(":nyan:", "<img src='../../Public/img/favicon/nyan.ico'>", $message);
                $message = str_replace(":skull:", "<img src='../../Public/img/favicon/skull.ico'>", $message);
                $message = str_replace(":sword:", "<img src='../../Public/img/favicon/sword.ico'>", $message);
                $message = str_replace(":wings:", "<img src='../../Public/img/favicon/wings.ico'>", $message);
                $message = str_replace(":music:", "<img src='../../Public/img/favicon/music.ico'>", $message);
                $message = str_replace(":cute:", "<img src='../../Public/img/favicon/npc.ico'>", $message);
                $message = str_replace(":smile:", "<img src='../../Public/img/favicon/smile.ico'>", $message);
                $message = str_replace(":d20:", "<img src='../../Public/img/favicon/d20.ico'>", $message);
                $message = str_replace(":lol:", "<img src='../../Public/img/favicon/lol.ico'>", $message);
                $message = str_replace(":LOL:", "<img src='../../Public/img/favicon/lol.ico'>", $message);
                fwrite(fopen($file, 'a'), "<div class='chatbox pull-left'> <div class='chatnick'><code class='".$color."'><span class='nick'>". $nickname . 
                        "</span><span class='time' >".date('h:i:s')."</span></code></div><div class='chatmsg'>". $message = str_replace("\n", " ", $message). 
                        "</div></div><div class='clearfix'></div> \n"); 
            }
            break;
        case('sendhs'):
            $nickname = htmlentities(strip_tags($_POST['nickname']));
            $message = htmlentities(strip_tags($_POST['message']));
            if (($message) != "\n") { 
                $color = $_POST['color'];
                $val = $_POST['val'];
                $res = calculatedices($val);
                if($res < 0){
                    $val = '<code class="c-white">Pifia en <strong>'.$message.':</strong> de <strong>'.$res.'</strong></code>';
                }else{
                    if($val == 0){
                        $res = $res - 30;
                    }
                    $val = '<code class="c-white">Tirada en <strong>'.$message.':</strong> de <strong>'.$res.'</strong></code>';
                }
                fwrite(fopen($file, 'a'), "<div class='chatbox pull-left'> <div class='chatnick'><code class='".$color."'><span class='nick'>". $nickname . 
                        "</span><span class='time' >".date('h:i:s')."</span></code></div><div class='chatmsg bgm-brown c-white'>" . $val.
                        "</div></div><div class='clearfix'></div> \n"); 
            }
            break;
        case('sendhp'):
            $nickname = htmlentities(strip_tags($_POST['nickname']));
            $message = htmlentities(strip_tags($_POST['message']));
            if (($message) != "\n") {
                $color = $_POST['color'];
                $val = $_POST['val'];
                $res = calculatedices($val);
                if($res < 0){
                    $val = '<code class="c-white"><strong>'.$message.':</strong> Pifia de <strong>'.$res.'</strong></code>';
                }else{
                    $val = '<code class="c-white"><strong>'.$message.':</strong> Tirada de <strong>'.$res.'</strong></code>';
                }
                fwrite(fopen($file, 'a'), "<div class='chatbox pull-left'> <div class='chatnick'><code class='".$color."'><span class='nick'>". $nickname . 
                        "</span><span class='time' >".date('h:i:s')."</span></code></div><div class='chatmsg bgm-red c-white'>" .$val.
                        "</div></div><div class='clearfix'></div> \n"); 
            }
            break;
        case('sendimg'):
            $nickname = htmlentities(strip_tags($_POST['nickname']));
            $imgurl = htmlentities(strip_tags($_POST['message']));
            $imgurl = str_replace("\n", " ", $imgurl);
            if (($message) != "\n") {
                $color = $_POST['color'];
                fwrite(fopen($file, 'a'), "<div class='chatbox pull-left'> <div class='chatnick'><code class='".$color."'><span class='nick'>". $nickname . 
                        "</span><span class='time' >".date('h:i:s')."</span></code></div><div class='chatmsgimg'> <a href='" .$imgurl."' target='_blank' ><img class='imgchat' src='" .$imgurl. 
                        "'></div></div><div class='clearfix'></div> \n"); 
            }
            break;
    }
    echo json_encode($log);
    
    
    function calculatedices($base){
        if($base == 0){
            $base = 0;
        }
        $getbase = $base;
        $high = 90;
        $throwdices = rand( 1 , 100 );
        $base = (int)$getbase;
        if($base >= 200){//En cas de tindre maestria
            //echo '<br>(Maestria) 1: '.$throwdices;
            if($throwdices <= 2){ //Pifia
                $result = rand( -1 , -100 );
                //echo '<br>(Maestria)Pifia 2: '.$result;
                return $result;
            }else{ //Tirada normal
                $result = $throwdices;
                while($throwdices >= $high){ //En cas de que sigui una tirada obert
                        $throwdices = rand( 1 , 100 );
                        $result += $throwdices;
                        //echo '<br>(Maestria)Obert 2: '.$throwdices.' -> '.$result.' | '.$high;
                        if($high != 100){
                            $high++;
                        }
                }

                $result += $base;
                return $result;
            }
        }else { //En cas de no tindre maestria
            //echo '<br> 1: '.$throwdices;
            if($throwdices <= 3){  //Pifia
                $result = rand( -1 , -100 );
                //echo '<br>Pifia 2: '.$result;
                return $result;
            }else{
                $result = $throwdices;
                while($throwdices >= $high){ //En cas de que sigui una tirada obert
                        $throwdices = rand( 1 , 100 );
                        $result += $throwdices;
                        //echo '<br>Obert 2: '.$throwdices.' -> '.$result.' | '.$high;
                        if($high != 100){
                            $high++;
                        }
                }
                $result += $base;
                return $result;
            }
        }
    }
?>

