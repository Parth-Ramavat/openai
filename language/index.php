<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
	<title>Easematic.io</title>

	<!-- Required CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row justify-content-center mt-5 pt-5">
			<div class="col-md-6">
				<h1>English to other languages</h1>
				<form class="mt-5 lang-change" method="post">
					<div class="row mb-3">
						<div class="col-md-3">
							<select class="form-select" name="lang-select" id="lang-select">
								<option value="English" selected="">English</option>
								<option value="Gujarati">Gujarati</option>
								<option value="Hindi">Hindi</option>
								<option value="French">French</option>
								<option value="Spenish">Spenish</option>
								<option value="Japanese">Japanese</option>
								<option value="Chinese">Chinese</option>
							</select>
						</div>
						<div class="col-md-9">
							<textarea name="lang-title" class="form-control mb-3" id="lang-title" placeholder="Enter your text" required></textarea>
						</div>
					</div>

					<button type="submit" name="submit" class="btn btn-primary lang-submit">Submit <span class="spinner-border lang-spinner spinner-border-sm ms-1" role="status" aria-hidden="true" style="display: none;"></span><span class="visually-hidden">Loading...</span></button>
				</form>

				<div class="mt-4">
					<h2>Your Result</h2>
					<p class="res-lang"></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Required JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>

	$(".lang-change").on('submit', function (e) {
	    e.preventDefault();
	    
		var lan_title = $('#lang-title').val();
		var lan_select = $('#lang-select').val();

	    $.ajax({
	        url: '../functions.php',
	        type: 'post',
	        dataType: 'json',
	        data: {"lan_title":lan_title ,"lan_select":lan_select,"action":"language"},
	        
	        beforeSend: function(msg){
		        $(".lang-spinner").css("display","inline-block");
		    },
	        success: function ( response ) {
				if( response.status ) {
					$(".lang-spinner").css("display","none");
					$('.res-lang').html(response.text);
				}	            
	        },
	    });
	});

	</script>

</body>
</html>

