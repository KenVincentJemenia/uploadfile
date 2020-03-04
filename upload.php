<?php
    //check if upload is empty or not 
 
        $files = $_FILES['files'];
        $fileName = $files['name'];
        $fileExtension = $files['type'];
        $filetmp_name = $files['tmp_name'];
        $fileSize = $files['size'];
        $target_dir = "uploads/"; // asa mabutang ang gi upload
        
        $allowed = array('jpeg', 'jpg', 'png');
        //echo "<pre>",print_r($fileExtension),"</pre>";
        //if(){
            foreach($fileName as $position => $fileNames){
                $fileExt = explode('/',$fileExtension[$position]);
                $fileExtFinal = end($fileExt);

                //check if file type is allowed
            
                    if(in_array($fileExtFinal,$allowed)){
                        //check file size
                        if($fileSize[$position] <= 10000000){
                            //asa gi butang plus iyang file name
                            $target_file = $target_dir. basename($fileName[$position]);
                            //check if nag exist naba ang file na e upload
                            if(!file_exists($target_file)){
                                //e move niya ang file
                                if (move_uploaded_file($filetmp_name[$position],$target_file)) {
                                    echo "The file ". basename( $filetmp_name[$position]). " has been uploaded.";
                                   
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            }else{
                                    echo "file exist";
                            }
                        }else{
                            echo "dako ra kaayu <br>";
                        }
                    }else{
                        echo "wdi mao ang file type";
                    }
            
    
            }
       /*  }else{
            echo "wala kay gi upload";
        } */
   
     //scan "uploads" folder and display them accordingly
     $folder = "uploads";
     $results = scandir('uploads');
     foreach ($results as $result) {
         if ($result === '.' or $result === '..') continue;
 
         if (is_file($folder . '/' . $result)) {
             echo '
                 <div class="col-md-3">
                     <img src="'.$folder . '/' . $result.'" alt="..." style="width:250px; height:auto;">
                 </div>';
         }
     }
 
?>