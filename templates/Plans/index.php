
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        User System
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank" rel="noopener">
                <img alt="CakePHP" src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" width="350" />
            </a>
            <h1>
                Welcome to User System 
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="message default text-center">
                            <small>Please select plan.</small>
                        </div>
                        
                        <?php foreach ($plans as $plan): ?>
                            <div class="plan-box">
                            <h3><?= h($plan->name) ?></h3>
                            <p>Price: ₹<?= h($plan->price) ?></p>
                            <a href="/users/register/<?= $plan->id ?>">Select Plan</a>
                            </div>
                            <?php endforeach; ?>
                    </div>
                </div>
               
              
                
                
               
            </div>
        </div>
    </main>
</body>
</html>
