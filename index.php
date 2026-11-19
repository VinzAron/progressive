<?php
$name = "Vinz";
$totalPurchase = 550;

$candies = [
    "Chocolate"   => ["price" => 45, "stock" => 15, "category" => "Popular"],
    "Mints"       => ["price" => 25, "stock" => 0,  "category" => "Refreshing"],
    "Fudge"       => ["price" => 40, "stock" => 8,  "category" => "Popular"],
    "Licorice"    => ["price" => 35, "stock" => 3,  "category" => "Classic"],
    "Bubble Gum"  => ["price" => 15, "stock" => 20, "category" => "Popular"],
    "Toffee"      => ["price" => 30, "stock" => 0,  "category" => "Classic"],
    "Jelly Beans" => ["price" => 45, "stock" => 12, "category" => "Popular"]
];

include 'header.php';
?>

<h1>The Candy Store</h1>
<p>Sweet treats for everyone!</p>

<h2>WELCOME, <?= strtoupper($name) ?>!</h2>
<p>Welcome to our candy shop located in Angeles City.</p>

<!-- Foor loop -->
<h2>OUR BEST SELLERS</h2>
<ol>
<?php
$bestSellers = array_keys($candies);
for ($i = 0; $i < count($bestSellers); $i++) {
    echo "<li>" . $bestSellers[$i] . "</li>";
}
?>
</ol>

<h2>OUR CANDY COLLECTION</h2>
<?php foreach ($candies as $candyName => $info): ?>
    <div class="candy">
        <strong><?= $candyName ?></strong><br>
        Price: ₱<?= $info['price'] ?><br>
        Category: <?= $info['category'] ?><br>
        Available Stock: <?= $info['stock'] ?><br>

        <?php if ($info['stock'] === 0): ?>
            <span class="out">Currently Out of Stock!</span>
        <?php elseif ($info['stock'] <= 5): ?>
            <span class="limited">Limited Stock! Order Soon!</span>
        <?php else: ?>
            <span class="available">Available for Purchase!</span>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<h2>CUSTOMER DISCOUNT</h2>
<p>Total Purchase: ₱<?= $totalPurchase ?></p>
<?php
if ($totalPurchase >= 500) {
    $discount = 50;
    echo "<p>Congratulations! You received a ₱50 discount!</p>";
} elseif ($totalPurchase >= 300) {
    $discount = 30;
    echo "<p>You received a ₱30 discount!</p>";
} else {
    $discount = 0;
    echo "<p>No discount applied.</p>";
}
?>
<p>Final Price: ₱<?= $totalPurchase - $discount ?></p>

<h2>OUR SPECIAL PROMOTIONS</h2>
<?php
$promo = 1;
while ($promo <= 5) {
    echo "<p>Promotion #$promo: Enjoy shopping at The Candy Store!</p>";
    $promo++;
}
?>

<h2>INVENTORY SUMMARY</h2>
<?php
$available = 0;
$low = 0;
$out = 0;

foreach ($candies as $info) {
    switch (true) {
        case ($info['stock'] === 0):
            $out++;
            break;
        case ($info['stock'] <= 5):
            $low++;
            break;
        default:
            $available++;
    }
}
?>
<p>Available Products: <?= $available ?></p>
<p>Low Stock Products: <?= $low ?></p> 
<p>Out of Stock Products: <?= $out ?></p>
<p>.<p>

<?php include 'footer.php'; ?>