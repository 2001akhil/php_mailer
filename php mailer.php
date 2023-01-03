//Not working
//Author Rishi
//comment author and tester:2001akhil
<?php 
if($_POST){
require("class.phpmailer.php");//extention
$first_name = $_POST['first_name'];//fetching from web site
$email = $_POST['email'];//fetching from web site
$number = $_POST['number'];//fetching from web site
$fileName = $_POST['file_name'];//fetching from web site
$file_url = $_POST['file_url'];//fetching from web site
$word_count = $_POST['word_count'];//fetching from web site
$translate_from = $_POST['translate_from'];//fetching from web site 
$FeatureCodes = $_POST['transto'];
    
    $lan = $_POST['lan'];

if(!empty($fileName)){    
$file_names = explode(',',$fileName);
}else{$file_names='';}
    
$link = "";
    
    
 
if(!empty($file_names)){
 foreach($file_names as $file){ 
    $file = str_replace(' ','_',$file); 
     
     
     $filename="uploads/".$file;



        if (file_exists($filename)) {
            $file_path = "http://datagainservices.com/translation/mail/uploads/".$file; 
            $link .= "<tr>   
             <td>Download Link : &nbsp;  </td>
             <td> <a href='".$file_path."'>Download </a> </td></tr> ";
        } else {
            $link.=" ";
        }
 }   
   
}
    
   
   
$r= rand(1,10000);

//$regis_email =	'nilesh.mehra18@gmail.com';
$regis_email =	'ravi@datagainservices.com';
$regis_email2 =	'rishi@datagainservices.com';
			
/****** send actvation code to registered user - start ***********/
$mail = new PHPMailer();
$mail->IsMail();                 	// set mailer to use SMTP
$mail->Host = "";  		// specify main and backup server
$mail->SMTPAuth = true;     		// turn on SMTP authentication
$mail->Port = 25; 	// SMTP password
$mail->SMTPSecure = "tls"; 	// SMTP password
$mail->CharSet="windows-1251";
$mail->CharSet="utf-8";
$mail->Username = "";  	// SMTP username("Missing")
$mail->Password = ''; 	// SMTP password("Missing")
$mail->From = "info@datagainservices.com";
$mail->FromName = "Datagain Inc.";
$mail->AddAddress($regis_email);	//sender user email id
$mail->AddCC($regis_email2);
$mail->WordWrap = 50;      			// set word wrap to 50 characters
$mail->IsHTML(true);      			// set email format to HTML
 
//$mail->AddAttachment('mail/upload/'.$name, $name);  			// set email format to HTML
$mail->Subject = utf8_encode("New Request");


$body = "<table>


<tr>
				<td>Translate From : </td>
				<td>  ".$translate_from." </td>
			</tr>
            
            <tr>
				<td>Translate To : </td>
				<td>  ".$FeatureCodes." </td>
			</tr>
            
			<tr>
				<td>Name : </td>
				<td>  ".$first_name." </td>
			</tr>
			<tr>
				<td>Email : </td>
				<td>  ".$email."  </td>
			</tr>
			<tr>
				<td>Phone : </td>
				<td>  ".$number."  </td>
			</tr>
            
            <tr>
				<td>Dropbox Link : </td>
				<td>  ".$file_url."  </td>
			</tr>
            
            
			".$link."
            
			<tr>
				<td>Word Count : </td>
				<td>  ".$word_count."  </td>
			</tr>
			
			
			
		</table>";

    //echo "<pre/>";
//print_r($body);die;
$mail->Body    = utf8_encode($body);


if($mail->Send())
{
	echo "Thank you, we have received your request and we will be in touch soon.";
}
else
{
	echo "Mail not sent";//???? find the error 
}

} 
//echo "<pre/>";
//print_r($mail);


?>
