<?php

$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";

$banner = "";
$link = "";
$gambar = "";
$keterangan_gambar = "";
$status = "";

$button = "Add";

if ($banner_id != "") {
	$button = "Update";

	$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
	$row = mysqli_fetch_array($queryBanner);

	$banner = $row["banner"];
	$link = $row["link"];
	$gambar = "<img src='" . BASE_URL . "images/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
	$keterangan_gambar = "--'Pilih foto'";
	$status = $row["status"];
}
?>

<form id="form-module" action="<?php echo BASE_URL . "module/banner/action.php?banner_id=$banner_id" ?>" method="post" enctype="multipart/form-data">

	<div class="element-form-module">
		<label>Banner</label>
		<span><input class="element-type-text" type="text" name="banner" value="<?php echo $banner; ?>" /></span>
	</div>

	<div class="element-form-module">
		<label>Link</label>
		<span><input class="element-type-text" type="text" name="link" value="<?php echo $link; ?>" /></span>
	</div>

	<div class="element-form-module">
		<label>Gambar Banner <?php echo $keterangan_gambar; ?></label>
		<span><input id="images" type="file" name="file" /><?php echo $gambar; ?></span>
	</div>

	<div class="element-form-module">
		<label>Status</label>
		<span>
			<input type="radio" value="on" name="status" <?php if ($status == "on") {
																echo "checked";
															} ?> /> On
			<input type="radio" value="off" name="status" <?php if ($status == "off") {
																echo "checked";
															} ?> /> Off
		</span>
	</div>

	<div class="element-form-button">
		<button name="button" type="submit" value="<?php echo $button; ?>">
			<?php
			echo $button;
			?>
		</button>
	</div>
</form>