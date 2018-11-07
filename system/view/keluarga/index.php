<?php
  include("../../helpers/require.php");
  include("../../helpers/auth.php");
  include("controller/controller_keluarga.php");
  $curpage = "keluarga";
  $navpage = "Master";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$title['keluarga'];?></title>
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
                <li class="active">Keluarga Management</li>
              </ol>
      			</div>

            <!-- start: PAGE CONTENT -->
            <div class="col-md-12">
              <div class="widget">
                <header class="widget-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h4 class="widget-title">Manage Keluarga</h4>
                    </div>
                    <div class="hidden-xs">
                      <div class="col-sm-6 text-right">
                        <a href="<?=$path['keluarga-add'];?>" class="btn btn-xs btn-outline btn-primary"><i class='fa fa-plus'></i> Create New Keluarga</a>
                      </div>
                    </div>
                    <div class="visible-xs">
                      <div class="col-sm-6 text-left up1">
                        <a href="<?=$path['keluarga-add'];?>" class="btn btn-xs btn-outline btn-primary"><i class='fa fa-plus'></i> Create New Keluarga</a>
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
                          <th class="text-center">Action</th>
                          <th>Nama Keluarga</th>
                          <th class="text-center">Sektor</th>
                          <th>Status</th>
                          <th>Create Date</th>
                          <th>Last Updated</th>
                        </tr>
                        <?php $num=1; if(hasProperty($datas, "data")){ foreach($datas->data as $data){?>
                        <tr>
                          <td class="text-left"><?=($_page-1)*20+$num;?>.</td>
                          <td class="text-center">
                            <a href="<?=$path['keluarga-edit']."?id=".$data->id;?>" class="btn btn-xs btn-outline btn-success"><i class='fa fa-edit'></i> Edit</a>
                            <a href="javascript:void(0)" onclick="confirmDelete('<?=$data->id;?>', '<?=$data->name;?>');" class="btn btn-xs btn-outline btn-danger"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                          <td><?=correctDisplay($data->name);?></td>
                          <td class="text-center"><?=$data->sector;?></td>
                          <td><?=checkStatus($data->status);?></td>
                          <td><?=date("d-M-Y, H:i:s", strtotime($data->datetime));?></td>
                          <td><?=($data->datetime != $data->timestamp ? time_ago($data->timestamp) : "-");?></td>
                        </tr>
                        <?php $num++;}}else{?>
                        <tr>
                          <td colspan="7">There is no data!</td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <div id="default-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap up2">
                    <div class="row">
                      <div class="col-sm-5">
                        <div class="dataTables_info" id="default-datatable_info" role="status" aria-live="polite"><?="Showing ".(($_page-1)*20+1)." to ".($total_data+(($_page-1)*20))." of ".$total_data_all." entries";?></div>
                      </div>
                      <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="default-datatable_paginate">
                          <ul class="pagination">
                            <?php
                            $batch = getBatch($_page);
                            if($batch < 1){$batch = 1;}
                            $prevLimit = 1 +(5*($batch-1));
                            $nextLimit = 5 * $batch;

                            if($nextLimit > $total_page){
                              $nextLimit = $total_page;
                            }
                            if($_page > 1){
                              echo "<li id='default-datatable_previous' class='paginate_button previous'>";
                              echo "<a href='".$path['keluarga']."?page=".($_page-1)."' aria-controls='default-datatable' data-dt-idx='0' tabindex='0'><i class='fa fa-chevron-left'></i> Previous</a>";
                              echo "</li>";
                            }
                            for($mon = $prevLimit; $mon <= $nextLimit;$mon++){?>
                              <li class="paginate_button <?php if($mon == $_page){echo 'active';}?>">
                                <a href="<?=$path['keluarga']."?page=".$mon;?>" aria-controls="default-datatable" data-dt-idx="<?=$mon;?>" tabindex="0"><?=$mon;?></a>
                              </li>
                            <?php } if($total_page > 1 && $_page != $total_page){
                              echo "<li id='default-datatable_next' class='paginate_button next'>";
                              echo "<a href='".$path['keluarga']."?page=".($_page+1)."' aria-controls='default-datatable' data-dt-idx='".($_page+1)."' tabindex='0'><i class='fa fa-chevron-right'></i> Next</a>";
                              echo "</li>";
                            } ?>
                          </ul>
                        </div>
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

      function confirmDelete(id, name){
        var x = confirm("Are you sure want to delete \""+name+"\" ?");
        if(x == true){
          window.location.href = "index.php?action=delete&id="+id+"&name="+name;
        }else{
          //nothing
        }
      }
    </script>
  </body>
</html>