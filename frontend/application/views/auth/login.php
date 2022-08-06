<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <?php if (!empty($this->session->flashdata('msg'))) { ?>
        <script>
            alert('<?= $this->session->flashdata('msg') ?> ')
        </script>
    <?php } ?>
    <title>REST APIKEY</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>

<style>
    body {
        font-family: sans-serif;
        background-color: #cccccc; /* Used if the image is unavailable */
  height: 500px; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
  background-image: url("https://bandungbarat.net/wp-content/uploads/2019/07/kampus-poltekpos.jpg")
    }

    h1 {
        text-align: center;
        font-weight: 300;
    }

    .tulisan_login {
        text-align: center;
        text-transform: uppercase;
    }

    .kotak_login {
        width: 350px;
        background: whitesmoke;
        margin: 80px auto;
        padding: 35px 20px;
    }

    label {
        font-size: 11pt;
    }

    .form_login {
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 20px;
    }

    .tombol_login {
        background: #46de4b;
        color: white;
        font-size: 11pt;
        width: 100%;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
    }
    .tombol_generate {
        background: #46de4b;
        color: white;
        font-size: 11pt;
        width: 100%;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
    }

    .link {
        color: #232323;
        text-decoration: none;
        font-size: 10pt;
    }
</style>


<body>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <form action="<?php echo base_url('auth/login') ?>" method="POST">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username ..">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password ..">

            <input type="submit" class="tombol_login" value="LOGIN">
            <br />
            <br />
        </form>
        <a href="<?php echo base_url('auth/daftar') ?>"><button class="tombol_login">Daftar</button></a><br><br>
 </div>


    </div>


</body>

</html>