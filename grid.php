<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Bingo!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    
    <?php 
    function multiply($min,$max) {
	$a = mt_rand($min,$max);
	$b = mt_rand($min,$max);
	$product = $a * $b;
	
	return $product;
}

function grid($side_size,$min,$max) {
	$products = array();
    $grid_size = $side_size ** 2;
	for ($i=0; $i<$grid_size; $i++):
		$multiple = multiply($min,$max);
		if ( !in_array($multiple, $products) ):
			array_push($products, $multiple);
		else: $i--;
		endif;
	endfor;
	
	return $products;
}
    
    $rows = $_POST["rows"];
    $cols = $_POST["cols"];
    $grid_side = $_POST["grid-dims"];
    $min = $_POST["min"];
    $max = $_POST["max"];
    
    //Data validation
    if ( $min >= $max ): ?>
    <div id="options-box" class="error">
    <h2>Minimum value must be less than the maximum value</h2>
        <a href="index.html" class="btn btn-lg btn-success">Try again</a>
    </div>
    <?php
    
    elseif ( ($max-$min)<=($grid_side) ): ?>
    <div id="options-box" class="error">
    <h2>The max and min values are too close together to generate enough unique values</h2>
        <a href="index.html" class="btn btn-lg btn-success">Try again</a>
    </div>
    <?php else: 
    ?>

<div class="container top20">
	<?php for ($j=0; $j<$rows; $j++): ?>
	<div class="row justify-content-around bottom30">
		<?php for ($i=0; $i<$cols; $i++): ?>
		<?php $gridnumbers = grid($grid_side,$min,$max); 
		$counter=1; ?>
		<div class="col">
<table>
	<tbody>
	<tr>
	<?php foreach ($gridnumbers as $number): 
		if ( $counter>$grid_side ): ?>
		</tr>
		<tr>
			<?php $counter=1; endif; $counter++; ?>
		<td><?php echo $number; ?></td>
	<?php endforeach; ?>
	</tbody>
</table>
	</div>
<?php endfor; ?>
	</div>
	<?php endfor; endif; ?>
	</div>

    
    
    </body>