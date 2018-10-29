<?php
  include("../../helpers/require.php");
  include("../../helpers/auth.php");
  include("controller/controller_article_category.php");
  $curpage = "article-category";
  $navpage = "Article";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$title['article-category'];?></title>
    <?php include("../../parts/part-module-head.php");?>
  </head>
  <body class="menubar-left menubar-unfold menubar-light theme-primary">

    <!-- APP NAVBAR !-->
    <?php include("../../parts/part-navbar.php");?>

    <!-- APP ASIDE !-->
    <?php include("../../parts/part-aside.php");?>

    <!-- APP MAIN -->
    <main id="app-main" class="app-main">
      <div class="wrap">
      	<section class="app-content">
      		<div class="row">

            <!-- Breadcrumb !-->
      			<div class="col-md-12 pad0">
              <ol class="breadcrumb" style="background: none;">
                <li><a href="<?=$path['home'];?>">Home</a></li>
                <li class="active">Article Category Management</li>
              </ol>
      			</div>

            <!-- start: PAGE CONTENT -->
            <div class="col-md-12">
              <div class="widget">
                <header class="widget-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h4 class="widget-title">Manage Article Category</h4>
                    </div>
                    <div class="hidden-xs">
                      <div class="col-sm-6 text-right">
                        <a href="<?=$path['article-category-add'];?>" class="btn btn-xs btn-outline btn-primary"><i class='fa fa-plus'></i> Create New Category</a>
                      </div>
                    </div>
                    <div class="visible-xs">
                      <div class="col-sm-6 text-left up1">
                        <a href="<?=$path['article-category-add'];?>" class="btn btn-xs btn-outline btn-primary"><i class='fa fa-plus'></i> Create New Category</a>
                      </div>
                    </div>
                  </div>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-horizontal-scroll">
                      <tbody>
                        <tr>
                          <th class="text-left">#</th>
                          <th class="text-center" style="width: 10%;">Action</th>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Create Date</th>
                        </tr>
                        <?php $num=1; if(is_array($datas)){ foreach($datas as $data){?>
                        <tr>
                          <td class="text-left"><?=$num;?>.</td>
                          <td class="text-center">
                            <a href="<?=$path['article-category-edit']."?id=".$data['id'];?>" class="btn btn-xs btn-outline btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class='fa fa-edit'></i> Edit</a>
                            <a href="javascript:void(0)" onclick="confirmDelete('<?=$data['id'];?>', '<?=$data['title'];?>' , 0);" class="btn btn-xs btn-outline btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                          <td><?=correctDisplay($data['title']);?></td>
                          <td><?=checkStatus($data['status']);?></td>
                          <td><?=date("d-M-Y, H:i:s", strtotime($data['datetime']));?></td>
                        </tr>
                        <?php $num++;}}else{?>
                        <tr>
                          <td colspan="5">There is no data!</td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <div id="default-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap up2">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="dataTables_info" id="default-datatable_info" role="status" aria-live="polite"><?="Showing ".(is_array($datas) ? 1 : 0)." to ".$total_data." of ".$total_data." entries";?></div>
                      </div>
                    </div>
                  </div>                  
                </div><!-- .widget-body -->
              </div><!-- .widget -->
            </div>		
            <!-- end: PAGE CONTENT-->
      	
        	</div><!-- .row -->
      	</section><!-- #dash-content -->
      </div><!-- .wrap -->

      <!-- APP FOOTER !-->
      <?php include("../../parts/part-footer.php");?>

    </main>
  	<?php include("../../parts/part-footer-js.php");?>
    <script type="text/javascript">
      <?php if($message != ""){?>
        //use session here for alert success/failed
        var alertText = "<?=$message;?>"; //text for alert
        <?php if($alert != "success"){?>
          //error alert
          errorAlert(alertText);
        <?php } else { ?>
          //success alert
          successAlert(alertText);
        <?php } ?>
      <?php } ?>

      function confirmDelete(id, title, total_data){
        if(total_data == 0){
          var x = confirm("Are you sure want to delete \""+title+"\" ?");
          if(x == true){
            window.location.href = "index.php?action=delete&id="+id+"&title="+title;
          }else{
            //nothing
          }
        }else{
          alert("You cannot delete \""+title+"\" when used in another page")
        }
      }
    </script>
  </body>
</html>