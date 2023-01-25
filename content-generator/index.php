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
				<h1>Article Generator</h1>
				<form class="mt-5 article-generator" method="post">
					<div class="mb-3">
						<input type="text" name="title" class="form-control" id="title" placeholder="Enter your title" required>
					</div>
					<input type="hidden" name="action" value="article">
					<button type="submit" name="submit" class="btn btn-primary article-submit">Submit <span class="spinner-border art-spinner spinner-border-sm ms-1" role="status" aria-hidden="true" style="display: none;"></span><span class="visually-hidden">Loading...</span></button>
				</form>

				<div class="mt-4">
					<h2>Your Result</h2>
					<p class="res-article"></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Required JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
	$(".article-generator").on('submit', function (e) {
	    e.preventDefault();
	    
	    var form_data = new FormData(this);
	    $.ajax({
	        url: '../functions.php',
	        type: 'post',
	        dataType: 'json',
	        data: form_data,
	        contentType: false,
	        processData: false,
	        beforeSend: function(msg){
		        $(".art-spinner").css("display","inline-block");
		    },
	        success: function ( response ) {
				if( response.status ) {
					$(".art-spinner").css("display","none");
					$('.res-article').html(response.text);
				}	            
	        },
	    });
	});
	</script>

</body>
</html>

