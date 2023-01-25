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
				<h1>Language Translation</h1>
				<form class="mt-5 lan-generator" method="post">
					<div class="row mb-3">
						<div class="col-md-3">
							<select class="form-select" name="lan-select" id="lan-select">
								<option value="English" selected>English</option>
								<option value="Gujarati">Gujarati</option>
								<option value="Hindi">Hindi</option>
							</select>
						</div>
						<div class="col-md-9">
							<input type="text" name="lan-title" class="form-control" id="lan-title" placeholder="Enter your text" required>
							<div class="spinner-border spinner-border-sm text-spinner" style="display: none;"></div>
						</div>
					</div>
					<input type="hidden" name="action" value="lan-article">
					<button type="submit" name="submit" class="btn btn-primary lan-submit">Submit <span class="spinner-border lan-spinner spinner-border-sm ms-1" role="status" aria-hidden="true" style="display: none;"></span><span class="visually-hidden">Loading...</span></button>
				</form>

				<div class="mt-4">
					<h2>Your Result</h2>
					<p class="res-lan"></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Required JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
	$("#lan-select").on('change', function(e){
		var lan_select = $(this).val();
		var lan_title = $('#lan-title').val();

		if( lan_title != '' ){
			
			$.ajax({
		        url: '../functions.php',
		        type: 'post',
		        dataType: 'json',
		        data: {"lan_title":lan_title ,"lan_select":lan_select,"action":"language"},
		        beforeSend: function(msg){
		        	$(".lan-submit"). attr("disabled", true);
			    	$(".text-spinner").css("display","block");
			    },
		        success: function ( response ) {
					if( response.status ) {
						$(".text-spinner").css("display","none");
						$(".lan-submit"). attr("disabled", false);
						$('#lan-title').val(response.text);
					}	            
		        },
		    });

		}
	});

	$("#lan-title").on('keyup', function(e){
		var lan_title = $(this).val();
		var lan_select = $('#lan-select').val();

		if( lan_title != '' ){
			
			$.ajax({
		        url: '../functions.php',
		        type: 'post',
		        dataType: 'json',
		        data: {"lan_title":lan_title ,"lan_select":lan_select,"action":"language"},
		        beforeSend: function(msg){
		        	$(".lan-submit"). attr("disabled", true);
			    	$(".text-spinner").css("display","block");
			    },
		        success: function ( response ) {
					if( response.status ) {
						$(".lan-submit"). attr("disabled", false);
						$(".text-spinner").css("display","none");
						$('#lan-title').val(response.text);
					}	            
		        },
		    });

		}
	});

	$(".lan-generator").on('submit', function (e) {
	    e.preventDefault();
	    
	    var lan_select = $('#lan-select').val();
		var lan_title = $('#lan-title').val();

	    var form_data = new FormData(this);
	    $.ajax({
	        url: '../functions.php',
	        type: 'post',
	        dataType: 'json',
	        data: {"lan-title":lan_title ,"action":"lan-article"},
	        
	        beforeSend: function(msg){
		        $(".lan-spinner").css("display","inline-block");
		    },
	        success: function ( response ) {
				if( response.status ) {
					$(".lan-spinner").css("display","none");
					$('.res-lan').html(response.text);
				}	            
	        },
	    });
	});

	</script>

</body>
</html>

