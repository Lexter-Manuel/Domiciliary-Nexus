<?php
if (file_exists('includes/database.php')) {
    include_once('includes/database.php');
}
if (file_exists('../includes/database.php')) {
    include_once('../includes/database.php');
}

include_once('../includes/tallyDashboard.php');
?>

<section id="dashboard">
    <h2>Dashboard</h2>
    <div class="grid-wrapper">
        <div class="grid-item flex-wrapper">
            <div class="fas fa-users"></div>
            <div class="tally">
                <h4>Population</h4>
                <p><?php echo $population; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
        <div class="grid-item flex-wrapper">
            <div class="fas fa-male"></div>
            <div class="tally">
                <h4>Male</h4>
                <p><?php echo $male; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
        <div class="grid-item flex-wrapper">
            <div class="fas fa-female"></div>
            <div class="tally">
                <h4>Female</h4>
                <p><?php echo $female; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
        <div class="grid-item flex-wrapper">
            <div class="fas fa-home"></div>
            <div class="tally">
                <h4>Households</h4>
                <p><?php echo $household; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
        <div class="grid-item flex-wrapper">
            <div class="fas fa-hand-holding-heart"></div>
            <div class="tally">
                <h4>Senior Citizen</h4>
                <p><?php echo $senior; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
        <div class="grid-item flex-wrapper">
            <div class="fas fa-business-time"></div>
            <div class="tally">
                <h4>Unemployed</h4>
                <p><?php echo $unemployed; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
        <div class="grid-item flex-wrapper">
            <div class="fas fa-exclamation-circle"></div>
            <div class="tally">
                <h4>Pending Cases</h4>
                <p><?php echo $pending; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
        <div class="grid-item flex-wrapper">
            <div class="fas fa-check-circle"></div>
            <div class="tally">
                <h4>Settled Cases</h4>
                <p><?php echo $settled; ?></p>
            </div><!-- .tallly -->
        </div><!-- .grid-item.flex-wrapper -->
    </div><!-- .grid-wrapper -->
</section><!-- #dashboard -->