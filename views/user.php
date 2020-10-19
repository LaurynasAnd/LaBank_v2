<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaBank</title>
    <link rel="stylesheet" href="<?=URL?>/css/app.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/9bc37f7865.js"></script>
</head>

<body>
    <header id="header" class="container">
        <div class="row">
            <div class="logo col-11">LaBank</div>
            <a href="../index.php?logout=1" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </header>
    <main id="main_content" class="container">
        <div class="row">
            <form class="infoscreen col-12" method="post">
                <h2 class="welcome">Sveiki, <?=$user['name']?> <?=$user['surname']?></h2>
                <div class="title">
                    <input type="radio" name="" id="check_all" style="visibility: hidden">
                    <div class="iban">Sąskaita</div>
                    <div class="amount">Galutinis likutis</div>
                </div>
                <?php foreach($user['accounts'] as $index => $account) :?>
                <div class="account">
                    <input type="radio" name="marked-checkbox" value="<?=$index?>" class="check check1">
                    <div class="iban"><?=$account['iban']?> <?=strtoupper($user['name'])?> <?=strtoupper($user['surname'])?></div>
                    <div class="amount"><?=$account['balance']?> &euro;</div>
                </div>
                <?php endforeach; ?>
                
                <div class="buttons">
                    <button id="delete" type="submit" name="delete">Ištrinti sąskaitą</button>
                    <button href="<?= URL . 'account/edit' ?>" class="link remove-money" type="submit" name="edit">Pinigų operacijos</button>
                </div>
            </form>
        </div>
        <?php if(isset($this->answers['message'])) : ?>
            <div id="message"><div class="message"><?=$this->answers['message']?></div></div>
        <?php 
            unset($this->answers['message']);
            endif; 
        ?>
        <?php if(isset($this->answers['delete'])) : ?>
            <div id="message"><div class="message"><?=$this->answers['delete']?></div></div>
        <?php 
            unset($this->answers['delete']);
            endif; 
        ?>
    </main>
    <script src="<?=URL?>/js/app.js"></script>
</body>

</html>