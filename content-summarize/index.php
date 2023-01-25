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
				<h1>Article Summarize</h1>
				<form class="mt-5 article-summarize" method="post">
					<div class="mb-3">
						<textarea name="content" class="form-control" id="content" placeholder="Enter your text" rows="5" required></textarea>
					</div>
					<input type="hidden" name="action" value="article-summarize">
					<button type="submit" name="submit" class="btn btn-primary article-submit">Submit <span class="spinner-border sum-spinner spinner-border-sm ms-1" role="status" aria-hidden="true" style="display: none;"></span><span class="visually-hidden">Loading...</span></button>
				</form>

				<div class="mt-4">
					<h2>Your Result..</h2>
					<p class="res-article-summ"></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Required JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
	$(".article-summarize").on('submit', function (e) {
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
		        $(".sum-spinner").css("display","inline-block");
		    },
	        success: function ( response ) {
				if( response.status ) {
					$(".sum-spinner").css("display","none");
					$('.res-article-summ').html(response.text);
				}	            
	        },
	    });
	});
	</script>

</body>
</html>
