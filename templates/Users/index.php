
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        User Listing
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
                Welcome to User System <?= h(Configure::version()) ?> Chiffon (🍰)
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    
                <table id="usersTable">
    <thead>
        <tr><th>Name</th>
        <th>Email</th>
        <th>Plan</th>
        <th>Picture</th>
        <th>Registered</th>
    </tr>
    </thead>
</table>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable({
        ajax: '/users/list',
        columns: [
            { data: 'name' },
            { data: 'email' },
            { data: 'plan.name' },
            {
                data: 'profile_picture',
                render: function(data) {
                    return `<img src="/${data}" width="50"/>`;
                }
            },
            { data: 'created' }
        ]
    });
});
</script>
                </div>
               
              
                
                
               
            </div>
        </div>
    </main>
</body>
</html>
