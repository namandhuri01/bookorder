$( function() {

	$('#packageForm').validate({
		rules: {
			'title':{
                required:true,
                minlength:5
			},
			'price':{
				required:true,
				minlength:1
			},
			'author':{
				required:true,
				minlength:1,
			},
			'genre':{
				required:true,
			},
			'quantity':{
				required:true,
				minlength:1,
			},
	    }
    });
});