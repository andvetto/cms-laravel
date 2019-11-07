        function mostraFile(val){

            var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
            console.log(fileName);
            var containerWidth = window.innerWidth
            var lung = fileName.length;
            console.log(containerWidth);
            if(fileName == ""){
                fileName = "Choose a file..."
            }

            if(containerWidth<768){
                
                if(lung>16){
                    fileName = fileName.substr(0,9)+"..."+fileName.substr(lung - 9, lung);
                }
            }
            if(containerWidth>=768){
	            if(lung>45){
	                fileName = fileName.substr(0,14)+"..."+fileName.substr(lung - 14, lung);
	            }
        	}
            console.log(fileName);
            $('#selectedImage').text(fileName);
            $('#preview-container').removeClass("d-none");
            $('#old-img-container').addClass("d-none");

        }

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }