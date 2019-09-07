<?php
   if(!empty($_FILES['arquivo'])){
      $imgs = array();
   
      $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
      //ler todo o arquivo para um array
      $dados = file($arquivo_tmp);
      foreach($dados as $value){
         //Retirar os espaços em branco no inicio e no final da string
         $value = trim($value);
         //Colocar em um array cada item separado pela virgula na string
         $imgs = explode(';', $value);

         $imgurl = 'https://cdn-cosmos.bluesoft.com.br/products/';
         $myString = '';

      }

      //print_r($imgs);

      foreach($imgs as $dados){
         if(!empty($dados)){
            if( !@copy( $imgurl.$dados, $dados ) ) {
               $errors= error_get_last();
               echo "<br>PY ERROR: ".$errors['type'];
               echo "<br>".$errors['message']." img ".$dados;
            } else {
                  echo "File copied from remote! ".$dados."<br>";
                  
            }
         }else{
            exit;
         }
         
      }
      
   }else{
      echo "Não mandou o arquivo";
   }