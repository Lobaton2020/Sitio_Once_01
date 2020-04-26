   <!-- Traemos la bibreria de jquery -->
   <script src="libs/jquery/jquery.min.js"></script>

   <!-- se trae la libreria de logos  -->
   <script src="libs/fontawesome-5.1/js/all.min.js"></script>

   <!--  Traemos la bibreria de jquery -->
   <script src="libs/bootstrap-4.3/js/bootstrap.min.js"></script>
   				<!-- Footer -->


			</div>
      <?php if($_SESSION["rol_user"] == 2):?>
			<script>
$(document).ready(function(){
  $.ajax({
    url:"?c=admin&m=ajax_get_number_image",
    type:"GET",
    success: function(data){
		console.log(data);
		var msg = ""; 
		if(data == 1){
             msg = "1 imagen registrada";
		}else{
			 msg =  data + " imagenes registradas";
		}
        $("#number").html(msg);
    },
    error : function(){
      $("#number").html("Not Connection");
    }
  });
});
</script>
  <?php endif; ?>
		<!-- Scripts -->
			<script src="libs/template-img/js/jquery.min.js"></script>
			<script src="libs/template-img/js/jquery.poptrox.min.js"></script>
			<script src="libs/template-img/js/browser.min.js"></script>
			<script src="libs/template-img/js/breakpoints.min.js"></script>
			<script src="libs/template-img/js/util.js"></script>
			<script src="libs/template-img/js/main.js"></script>
	</body>
</html>
