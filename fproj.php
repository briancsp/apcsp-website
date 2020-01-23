<!DOCTYPE html>
<html>
  <head>
    <title>Final Project</title>
    <link rel="stylesheet" href="styles.css">
  </head>


  <body>
    <div>
      <h1>Final Project - Vigenere Encryption/Decryption</h1>
    </div>
      <p>Enter plaintext or ciphertext to be encrypted/decrypted, keyword to encrypt/decrypt with, and select encryption or decryption process to be executed.<br>Enter "1TP" (just like that) for keyword to use One-Time Pad to ENCRYPT ONLY. Decrypting with a random key doesn't make sense!<br>Use '_' for spaces... they'll get removed in the encryption process anyway.<br>Cryptography is fun!</p>
    <li>
      <a href="index.html">Back to home</a>
    </li>
    <br>

    <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $arg3 = $output = $retc = "";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);
         $arg2 = test_input($_POST["arg2"]);
         $arg3 = test_input($_POST["arg3"]);
         exec("/usr/lib/cgi-bin/sp1a/proj " . $arg1 . " " . $arg2 . " " . $arg3, $output, $retc); 
       }

       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Text Input: <input type="text" name="arg1"><br>
      Keyword: <input type="text" name="arg2"><br>
      Function:
      <input type="radio" name="arg3" value="encrypt">encrypt
      <input type="radio" name="arg3" value="decrypt">decrypt
      <br><br>
      <input type="submit" value="Go!">
    </form>

    <?php
       // only display if return code is numeric - i.e. exec has been called
       if (is_numeric($retc)) {
         echo "<h2>Program Output:</h2>";
         foreach ($output as $line) {
           echo $line;
           echo "<br>";
         }
       }
    ?>
    
  </body>
</html>
