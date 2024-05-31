<?php
    if(isset($_POST['submit'])){
        $status=$_POST['submit'];
        $id=explode(':',$status)[0];
        $stati=explode(':',$status)[1];
        session_start();
        $dbname=$_SESSION['dbname'];
        $table=$_SESSION['table'];
        $email=$_SESSION['email'];
        if($dbname=='clean'){
                $details='As you complained about the cleaning process in the MIT campus,here is the status of that Work.For further information contact us in the WhatsApp..!';
        }
        else if($dbname=='room'){
            $details='As you requested for the room cleaning process in the MIT campus,here is the status of that Work.For further information contact us in the WhatsApp..!';
        }
        else if($dbname=='complaint'){
            $details='As you complained about the fault in the MIT campus,here is the status of that Work.For further information contact us in the WhatsApp..!';
        }            
        else if($dbname=='transport'){
            $details='As you requested for the transport service from the MIT campus,here is the status of your request.For further information contact us in the WhatsApp..!';
        }
        else if($dbname=='club'){
            $details='As you requested for the joining in the club of MIT ,here is the status of your request.For further information contact us in the WhatsApp..!';
        }
        echo $id;
        
        
        
        $conc=mysqli_connect('localhost','root','',$dbname);
        if(!$conc){

            die('error');
        }
        $query="UPDATE $table SET status='$stati' WHERE id='$id'";
        
        $result=mysqli_query($conc,$query);
        if($result){
            echo "
            <script type=\"text/javascript\"
            src=\"https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js\">
   </script>
   <script type=\"text/javascript\">
      (function(){
         emailjs.init(\"5mPbHBMcW52T7RHRf\");
      })();
           </script>;
   
             <script>
                       function sendotp(e,d,f)
             {
               console.log('Done'+d+f);
               const ser='service_55pmb5y';
               const temp='template_21td48q';
               param={email:d+'Status:'+f,message:e};
               emailjs.send(ser,temp,param);
               alert('User Form Submitted!');
             }
   
              </script>
      </script>";
//             echo"<script>
// sendotp('{$details}','{$email}','{$stati}')</script>";

            echo '<script>alert("Updated")</script>';
        }
        else{
            echo '<script>alert("Not Done")</script>';
        }
    }
    ?>
    