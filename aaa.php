<form action="contact.php" method="POST"  class="php-email-form">
    <div class="form-group">
      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
    </div>
    <div class="form-group mt-3">
      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
    </div>
    <div class="form-group mt-3">
      <input type="text" class="form-control" name="subjection" id="subject" placeholder="Subject" required>
    </div>
    <div class="form-group mt-3">
      <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
    </div>
    <div class="my-3">
      <div class="loading">Loading</div>
      <div class="error-message"></div>
      <div class="sent-message">Your message has been sent. Thank you!</div>
    </div>
    <div class="text-center"><button type="submit" name="jj">Send Message</button></div>
  </form>






  <?php
echo"dddd";
// if(isset($_POST['send'])){
//   if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['subjection']) and !empty($_POST['']))
  
// }
$serve="localhost";
$user="root";
$password="";
$base="touka_dev";

try{
  $bdd=new PDO("mysql:host=$serve;dbname=$base",$user,$password);
$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo"connection reussite";
}catch(PDOException $e){
  echo"Une erreur est survenue".$e->getMessage();
}
try{ 
$sql= $bdd->prepare("INSERT INTO client (nom,E-mail,subjection,messages)  values (:nom,:email,:sub,:mes)");
$sql->execute(array(
  'nom' => $_POST['name'],
  'email' => $_POST['email'],
  'sub' => $_POST['subjection'],
  'mes' => $_POST['message']
));
  
}catch(PDOException $e){
  echo"Une erreur est survenue".$e->getMessage();
}
?>