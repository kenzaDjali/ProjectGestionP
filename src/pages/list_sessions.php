<?php
    $title = "Admin";
    
    ob_start();
?>
		<!-- pour l'admin -->
        <link href="css/pages/admin.css" rel="stylesheet">
<?php
    $endHeader = ob_get_clean();
?>

<div class="container">
    <div class="contenu">
        <table>
        </table>
    </div>
</div>


<?php 
    ob_start();
?>
<script>
</script>
<?php 
    $endFooter = ob_get_clean();
?>