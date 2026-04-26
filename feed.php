<?php
ini_set('display_errors', 0);
error_reporting(0);

header('Content-Type: application/xml; charset=utf-8');

$conn = new mysqli("127.0.0.1", "saferasc_saferas", "saferasc_saferas", "saferasc_saferas");

if ($conn->connect_error) {
    die("Connection failed");
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">';
echo '<channel>';

$query = "
SELECT 
p.id,
p.ProductName,
p.ProductSlug,
p.ProductImage,
p.ProductSku,
c.category_name,
s.size,
s.RegularPrice,
s.SalePrice
FROM products p
LEFT JOIN categories c ON p.category_id = c.id
LEFT JOIN sizes s ON p.id = s.product_id
WHERE p.status = 'Active'
AND s.status = 'Active'
AND s.size = 'Free Size'
";

$result = $conn->query($query);

if (!$result) {
    echo "</channel></rss>";
    exit;
}

while($row = $result->fetch_assoc()) {

    $title = htmlspecialchars($row['ProductName'] . ' - ' . $row['size']);
    $brand = "Saferas";

    $content_id = $row['id'];
    $item_group_id = $row['ProductSku'];

    $link = "https://saferas.com/view-product/" . trim($row['ProductSlug']);
    $image = "https://saferas.com/" . $row['ProductImage'];

    $product_type = !empty($row['category_name']) 
        ? $row['category_name'] 
        : $row['ProductName'];

    $regular_price_raw = isset($row['RegularPrice']) ? (float)$row['RegularPrice'] : 0;
    $sale_price_raw = isset($row['SalePrice']) ? (float)$row['SalePrice'] : 0;

    $regular_price = number_format($regular_price_raw, 2);
    $sale_price = number_format($sale_price_raw, 2);

    echo "<item>";
    echo "<g:id>".$content_id."</g:id>";
    echo "<g:item_group_id>".$item_group_id."</g:item_group_id>";
    echo "<g:title>".$title."</g:title>";
    echo "<g:description><![CDATA[".$title."]]></g:description>";
    echo "<g:link>".$link."</g:link>";
    echo "<g:image_link>".$image."</g:image_link>";
    echo "<g:availability>in stock</g:availability>";
    echo "<g:condition>new</g:condition>";

    if ($sale_price_raw > 0 && $sale_price_raw < $regular_price_raw) {
        echo "<g:price>".$regular_price." BDT</g:price>";
        echo "<g:sale_price>".$sale_price." BDT</g:sale_price>";
    } else {
        echo "<g:price>".$regular_price." BDT</g:price>";
    }

    echo "<g:size>".$row['size']."</g:size>";
    echo "<g:brand>".$brand."</g:brand>";
    echo "<g:product_type>".$product_type."</g:product_type>";
    echo "</item>";
}

echo "</channel>";
echo "</rss>";
?>