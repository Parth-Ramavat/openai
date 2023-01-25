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
				<h1>Grammar correction</h1>
				<form class="mt-5 grammer-check" method="post">
					
					<textarea name="gram-title" class="form-control mb-3" id="gram-title" placeholder="Enter your text" required></textarea>

					<button type="submit" name="submit" class="btn btn-primary gram-submit">Submit <span class="spinner-border gram-spinner spinner-border-sm ms-1" role="status" aria-hidden="true" style="display: none;"></span><span class="visually-hidden">Loading...</span></button>
				</form>

				<div class="mt-4">
					<h2>Your Result</h2>
					<p class="res-gram"></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Required JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>

	$(".grammer-check").on('submit', function (e) {
	    e.preventDefault();
	    
		var gram_title = $('#gram-title').val();

	    $.ajax({
	        url: '../functions.php',
	        type: 'post',
	        dataType: 'json',
	        data: {"gram-title":gram_title ,"action":"grammer-check"},
	        
	        beforeSend: function(msg){
		        $(".gram-spinner").css("display","inline-block");
		    },
	        success: function ( response ) {
				if( response.status ) {
					$(".gram-spinner").css("display","none");
					$('.res-gram').html(response.text);
				}	            
	        },
	    });
	});

	</script>

</body>
</html>

