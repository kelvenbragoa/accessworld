<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Inogest Inovatis, sistema de gestão">
	<meta name="author" content="Inogest">
	<meta name="keywords" content="gestão, management, erp, human resource, inogest, inovatis, tecnologia, mozambique">

	<link rel="shortcut icon" href="storage/img/sys/logoinogesticon.png" />

	<title>Inogest</title>

	<link href="{{asset('template/css/app.css')}}" rel="stylesheet">
</head>

<body style="background-image: url('storage/img/sys/background.jpg'); height: 100%; 
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;">
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2" style="color:white">{{__('text.welcome_back')}}</h1>
                            <h1 class="h2" style="color:white">InoGest - INOVATIS MZ LTD</h1>
							
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="storage/img/sys/logoinogestt.png" alt="inogest" class="img-fluid" width="350" height="250" />
										
									</div>
									<div class="text-center">
										<a class="btn btn-primary" href="{{ route('login') }}">Iniciar</a>
									</div>
									

									
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>