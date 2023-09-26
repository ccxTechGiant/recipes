<?php
if (strlen($_SESSION['contact']==0)) {
  header('location:logout.php');
  } else{
  
	   $aid= $_SESSION['contact'];
	   $aid1= $_SESSION['mail'];
	   $sql="SELECT * from designers where Phone=:aid";
	   $query = $dbh -> prepare($sql);
	   $query->bindParam(':aid',$aid,PDO::PARAM_STR);
	   $query->execute();
	   $results=$query->fetchAll(PDO::FETCH_OBJ);
	   if($query->rowCount() > 0){
		   foreach($results as $row)
		   {               ?>

<footer id="footer" class="footer" style="font-weight: 800;color: #000;">
    <div class="copyright">
       <span class="text-muted d-block text-center text-sm-left d-sm-inline-block" style="color: blue;text-align: center;font-weight: 600">CCN &copy;  <script>
              document.write(new Date().getFullYear());
            </script>,  <span style="color: red">Web</span><i style="color: blue;font-weight: 600;">-</i>COOKBOOK</span><?php }}}?>
    </div>
    <div class="credits">
      Powered by: <a href="./">ccn.org</a>
    </div>
  </footer><!-- End Footer -->