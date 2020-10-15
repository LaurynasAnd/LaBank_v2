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
            <div class="logo col-11">LaBank</div>
            <a href="../index.php?logout=1" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </header>
    <main id="main_content" class="container">
        <div class="row">
            <form class="infoscreen col-12" method="post">
                <h2 class="welcome">Sveiki, <?=$user['name']?> <?=$user['surname']?></h2>
                <div class="title">
                    <input type="checkbox" name="" id="check_all">
                    <div class="iban">Sąskaita</div>
                    <div class="amount">Galutinis likutis</div>
                </div>
                <div class="account">
                    <input type="checkbox" name="marked-checkbox" value="<?=$user['iban']?>" class="check check1">
                    <div class="iban"><?=$user['iban']?> <?=strtoupper($user['name'])?> <?=strtoupper($user['surname'])?></div>
                    <div class="amount"><?=$user['balance']?> &euro;</div>
                </div>
                
                <div class="mobile-account">
                    <div class="select">

                        <select name="iban-no" id="">
                            <option value="account1"><?=$user['iban']?></option>
                        </select>
                    </div>
                    <div class="amount">
                        <label>Sąskaitos likutis</label>
                        <h2><?=$user['balance']?> &euro;</h2>
                    </div>
                </div>
                <button id="delete" type="submit" name="delete">Ištrinti sąskaitą</button>
                <button href="../remove/index.php" class="link remove-money" type="submit" name="edit">Nuskaičiuoti lėšas</button>
            </form>
        </div>
        <?php if(isset($answers['message'])) : ?>
            <div id="message"><div class="message"><?=$answers['message']?></div></div>
        <?php 
            unset($answers['message']);
            endif; 
        ?>
        <?php if(isset($answers['delete'])) : ?>
            <div id="message"><div class="message"><?=$answers['delete']?></div></div>
        <?php 
            unset($answers['delete']);
            endif; 
        ?>
    </main>
    <script>
    <?php require DIR . '/public/js/app.js'; ?>
    </script>
</body>

</html>