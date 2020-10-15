<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaBank</title>
    <style>
    <?php require DIR . '/public/css/app.css'; ?>
    </style>
</head>

<body>
    <header id="header" class="container">
        <div class="row">
            <div class="logo col-12">LaBank</div>
            
        </div>
    </header>
    <main id="main_content" class="container">
        <div class="row">
            <div class="infoscreen col-12">
                <h1>Sveiki atvykę į LaBank</h1>
                <p>Norėdami prisijungti, įveskite prisijungimo duomenis</p>
                <form action="" method="post">
                    <input type="text" name="idNumber" id="idNumber" placeholder="Asmens kodas">
                    <input type="password" name="psw" id="psw" placeholder="Slaptažodis">
                    <button id="submit" type="submit">Prisijungti</button>
                </form>
            </div>
        </div>
        
        <?php if(isset($answers['message'])) : ?>
            <div id="message"><div class="message"><?=$answers['message']?></div></div>
        <?php 
            unset($answers['message']);endif; 
        ?>
        <?php if(isset($answers['badInput'])) : ?>
            <div id="message"><div class="message"><?=$answers['badInput']?></div></div>
        <?php 
            unset($answers['badInput']);endif; 
        ?>
    </main>
    <a href="<?php URL . 'account/create'; ?>">Atidaryti sąskaitą</a>
</body>

</html>