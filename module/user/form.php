<?php

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

$button = "Update";
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");

$row = mysqli_fetch_array($queryUser);

$nama = $row["nama"];
$email = $row["email"];
$phone = $row["phone"];
$alamat = $row["alamat"];
$status = $row["status"];
$level = $row["level"];
?>
<form id="form-module" action="<?php echo BASE_URL . "module/user/action.php?user_id=$user_id" ?>" method="POST">

	<div class="element-form-module">
		<label>Nama Lengkap</label>
		<span><input class="element-type-text" type="text" name="nama" value="<?php echo $nama; ?>" /></span>
	</div>

	<div class="element-form-module">
		<label>Email</label>
		<span><input class="element-type-text" type="text" name="email" value="<?php echo $email; ?>" /></span>
	</div>

	<div class="element-form-module">
		<label>Phone</label>
		<span><input class="element-type-text" type="text" name="phone" value="<?php echo $phone; ?>" /></span>
	</div>

	<div class="element-form-module">
		<label>Alamat</label>
		<span><input class="element-type-text" type="text" name="alamat" value="<?php echo $alamat; ?>" /></span>
	</div>

	<div class="element-form-module">
		<label>Level</label>
		<span>
			<input type="radio" value="superadmin" name="level" <?php if ($level == "superadmin") {
																	echo "checked";
																} ?> /> Superadmin
			<input type="radio" value="customer" name="level" <?php if ($level == "customer") {
																	echo "checked";
																} ?> /> Customer
		</span>
	</div>

	<div class="element-form-module">
		<label>Status</label>
		<span>
			<input name="status" type="radio" value="on" <?php echo ($status == "on") ? "checked" : ""; ?>> On
			<input name="status" type="radio" value="off" <?php echo ($status == "off") ? "checked" : ""; ?>> Off
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