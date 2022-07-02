<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>
		<div class="container pt-5">
			<div class="row">
				<div class="col-md-12 col-xl-12">
					<div class="card">
						
						<?php foreach($list_user as $r) : ?>
							
							<div class="card-header">
								<a href="<?= base_url ?>chat/as/<?= $r['id'] ?>">
									
									<div class="d-flex">
										<h1><i class="fa fa-users"></i></h1>
										<span>Login as <?= $r['nama'] ?></span>
									</div>

								</a>
							</div>

						<?php endforeach; ?>

						<h5 class="text-center text-danger bg-dark">"Untuk cek websoketnya silahkan buka website ini di dua halaman yang berbeda, dan login dengan 2 akun di atas secara terpisah"</h5>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
