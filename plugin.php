<?php 

/**
 * @package Hello_World
 * @version 1.0.0
 */
/*
Plugin Name: Formulaire de contact
Description: Ajouter un formulaire a votre site .
*/


function add_menu(){
    add_menu_page('Menu','Contact_form','manage_options','add_menu','add_menu_main');
    
}


add_action('admin_menu','add_menu');
add_shortcode('input','getShortcode');

function add_menu_main(){

?>
<div><h1>Chose :</h1></div>
<div class='container'>
<form  method='POST'>
<input type="checkbox" name="firstname" <?php if (get_option("firstname")=="on") { echo"checked"; } ?>  >
<label id='label'>Nom</label> <br>
<input type='checkbox' name='lastname'<?php if (get_option("lastname")=="on") { echo"checked"; } ?>>
<label>Prénom</label>
<br>
<input id='input' type='checkbox' name='adress'<?php if (get_option("adress")=="on") { echo"checked"; } ?>>
<label>Adress</label> <br>
<input type='checkbox' name='phone'<?php if (get_option("phone")=="on") { echo"checked"; } ?> >
<label>Téléphone</label>
<br>
<input type='checkbox' name='email'<?php if (get_option("email")=="on") { echo"checked"; } ?> >
<label>Email</label>
<br>
<input type='checkbox' name='message'<?php if (get_option("message")=="on") { echo"checked"; } ?>>
<label>Message</label>
<br>
<input class='btn' type='submit' name='submit' >
</form>
</div>

<?php
}

$firstname_option = "firstname";
$lastname_option = "lastname";
$adress_option = "adress";
$phone_option = "phone";
$email_option = "email";
$message_option = "message";
$firstname_value =  0;
$lastname_value = 0;
$adress_value =  0;
$phone_value =  0;
$email_value = 0;
$message_value =  0;

if (isset($_POST["submit"])) { 
     
    if (isset($_POST['firstname'])) {
       $firstname_value =  $_POST['firstname'];
   }
    if (isset($_POST['lastname'])) {
    $lastname_value  =  $_POST['lastname'];
   }  
   if (isset($_POST['adress'])) {
    $adress_value =  $_POST['adress'];
   }  
    if (isset($_POST['phone'])) {
    $phone_value =  $_POST['phone'];
   }  
    if (isset($_POST['email'])) {
       $email_value =  $_POST['email'];
   }  
    
    if (isset($_POST['message'])) {
       $message_value =  $_POST['message'];
   }  
     update_option( $firstname_option,$firstname_value );
     update_option( $lastname_option,$lastname_value );
     update_option( $adress_option,$adress_value );
     update_option( $phone_option,$phone_value );
     update_option( $email_option,$email_value );
     update_option( $message_option,$message_value );
}  

function getShortcode(){

    if(get_option('firstname') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "first name">';
    }
    if(get_option('lastname') == 'on'){
        echo '<input type="text" style="margin-bottom: 20px;" placeholder="last name">';
    }
    if(get_option('adress') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "Adress">';
    }
    if(get_option('phone') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "phone">';
    }
   
    if(get_option('email') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "email">';
    }
    
    if(get_option('message') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "message">';
    }
    echo'<button style="width:100%;">Submit</button>';
}


?>

