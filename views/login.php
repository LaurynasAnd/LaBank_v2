<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaBank</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap');    
    <?php require DIR . '/public/css/app.css'; ?>
    </style>
    <script src="https://use.fontawesome.com/9bc37f7865.js"></script>
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
                <form action="<?= URL . 'account/login'; ?>" method="post">
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
    <a href="<?= URL . 'account/create'; ?>" class="login">Atidaryti sąskaitą</a>
</body>

</html>