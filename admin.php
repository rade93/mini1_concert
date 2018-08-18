<?php include'server.php'; 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Concerts</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/moj.css?version=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      
    <h1>Table of available concerts</h1>
    
    <div class="admbtn">
      <a href="index.php"><button type="button" class="btn btn-primary">
          Back
        </button></a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myNew">
        New Item
      </button>
      <p>Type something in the input field to search the list for specific items:</p>  
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
        
    <div class="row col-lg-12">
      <table class="table table-hover">
        <thead>
          <tr id="glava">
            <th>ID Number</th>
            <th>GROUP</th>
            <th>PLACE</th>
            <th>DATE</th>
            <th>AVAILABLE/PURCHASED TICKETS</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody id="myList">
          <?php
            $sel_sql = "SELECT * FROM concert";
            $run_sql = mysqli_query($db,$sel_sql);
            while($rows = mysqli_fetch_assoc($run_sql)){
                echo '
          <tr>
          <td>'.$rows['concert_id'].'</td>
          <td>'.$rows['concert_name'].'</td>
          <td>'.$rows['concert_place'].'</td>
          <td>'.$rows['concert_date'].'</td>
          <td>'.$rows['concert_ticket'].' / '.$rows['concert_ticket'].'</td>
          <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#myEdit"><a href="admin.php?editcon='.$rows['concert_id'].'">EDIT</a></button>
              <button class="btn btn-danger" data-toggle="modal" data-target="#myDelete">DELETE</button>
          </td>
          ';}?>
        </tr>
        </tbody>
        
      </table>
    </div>
    </div>

<?php
  if(isset($_GET['editcon'])){
  $sql = "SELECT * FROM concert WHERE concert_id = '$_GET[editcon]'";
  $run = mysqli_query($db,$sql);
  while($rows = mysqli_fetch_assoc($run)){

  
?>
<!-- Modal Window for Edit-->
  <form method="post" action="admin.php" enctype="multipart/form-data">
  <div class="modal fade" id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">You edit the item with ID <?php echo $_GET['editcon']; ?></h4>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label for="groupname">Name of group</label>
              <input type="text" class="form-control" name="conname" id="groupname" value="<?php echo $rows['concert_name']; ?>">
            </div>
            <div class="form-group">
              <label for="grouplace">Place of concert</label>
              <input type="text" class="form-control" name="conplace" id="grouplace" value="<?php echo $rows['concert_place']; ?>">
            </div>
            <div class="form-group">
              <label for="groupdate">Date of concert</label>
              <input type="date" class="form-control" name="condate" id="groupdate" value="<?php echo $rows['concert_date']; ?>">
            </div>
            <div class="form-group">
              <label for="grouticket">Number of tickets</label>
              <input type="text" class="form-control" name="conticket" id="groupticket" value="<?php echo $rows['concert_ticket']; ?>">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" name="update" class="btn btn-primary">Update</button>
        </div>
       
      </div>
    </div>
    
  </div>
</form>
<?php }} ?>

    <!-- Modal Window for delete-->
    <div class="modal fade" id="myDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
          </div>
          <div class="modal-body">
            Do you really want to delete this item?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No, I don't want to delete it</button>
            <button type="button" class="btn btn-primary">Yes, I'm sure!</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Window for New-->
  <div class="modal fade" id="myNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Enter New item</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="groupname">Name of group</label>
            <input type="text" class="form-control" id="groupname" placeholder="Enter the name of the group">
          </div>
          <div class="form-group">
            <label for="grouplace">Place of concert</label>
            <input type="text" class="form-control" id="grouplace" placeholder="Enter the place of the group">
          </div>
          <div class="form-group">
            <label for="groupdate">Date of concert</label>
            <input type="date" class="form-control" id="groupdate" placeholder="Enter the date of the concert">
          </div>
          <div class="form-group">
            <label for="grouticket">Number of tickets</label>
            <input type="text" class="form-control" id="groupticket" placeholder="Enter the number of the available tickets">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList td").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
  </body>
</html>