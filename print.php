	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript">
	$(function () {
		$("#btnPrint").click(function () {
			var contents = $("#main_content").html();
			var frame1 = $('<iframe />');
			frame1[0].name = "frame1";
			frame1.css({ "position": "absolute", "top": "-1000000px" });
			$("body").append(frame1);
			var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
			frameDoc.document.open();
			//Create a new HTML document.
			frameDoc.document.write('<html><head><title>Create Salary Structure</title>');
			frameDoc.document.write('</head><body>');
			//Append the external CSS file.
			frameDoc.document.write('<link href="assets/admin/css/style.css" rel="stylesheet" type="text/css" />');
			//Append the DIV contents.
			frameDoc.document.write(contents);
			frameDoc.document.write('</body></html>');
			frameDoc.document.close();
			setTimeout(function () {
				window.frames["frame1"].focus();
				window.frames["frame1"].print();
				frame1.remove();
			}, 500);
		});
	});
	</script>
	
	<div id="main_content">
		this content will be print
	</div>
