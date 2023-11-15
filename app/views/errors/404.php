<?php
// http://leanmanager/index.php?page=pages
ob_start(); 
?>

<header class="content-header">
    <h1 class="title">404</h1>
</header>

<h2>Not Found</h2>
<p>Данная страница не найдена</p>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>