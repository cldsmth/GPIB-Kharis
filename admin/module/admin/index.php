<?php
  include("../../packages/require.php");
  include("../../packages/check_login.php");
  $curpage = "admin";
  $navpage = "Master";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$title['admin'];?></title>
    <?php include("../../packages/module-head.php");?>
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
                <li class="active">Admin Management</li>
              </ol>
      			</div>

            <!-- start: PAGE CONTENT -->
            <div class="col-md-12">
              <div class="widget">
                <header class="widget-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h4 class="widget-title">Manage Admin</h4>
                    </div>
                    <div class="hidden-xs">
                      <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Create New Admin</button>
                      </div>
                    </div>
                    <div class="visible-xs">
                      <div class="col-sm-6 text-left up1">
                        <button type="button" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Create New Admin</button>
                      </div>
                    </div>
                  </div>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <th class="text-left">#</th>
                          <th class="text-center">Action</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <?php for($i=1; $i<=10; $i++){?>
                        <tr>
                          <td class="text-left"><?=$i;?>.</td>
                          <td class="text-center">
                            <button type="button" class="btn btn-xs btn-outline btn-success"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-xs btn-outline btn-danger"><i class="fa fa-trash"></i></button>
                          </td>
                          <td>Mark <?=$i;?></td>
                          <td>Otto <?=$i;?></td>
                          <td>@mdo <?=$i;?></td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                    <div id="default-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap up2">
                      <div class="row">
                        <div class="col-sm-5">
                          <div class="dataTables_info" id="default-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-7">
                          <div class="dataTables_paginate paging_simple_numbers" id="default-datatable_paginate">
                            <ul class="pagination">
                              <li class="paginate_button previous disabled" id="default-datatable_previous">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="0" tabindex="0">Previous</a>
                              </li>
                              <li class="paginate_button active">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="1" tabindex="0">1</a>
                              </li>
                              <li class="paginate_button">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="2" tabindex="0">2</a>
                              </li>
                              <li class="paginate_button">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="3" tabindex="0">3</a>
                              </li>
                              <li class="paginate_button">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="4" tabindex="0">4</a>
                              </li>
                              <li class="paginate_button">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="5" tabindex="0">5</a>
                              </li>
                              <li class="paginate_button">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="6" tabindex="0">6</a>
                              </li>
                              <li class="paginate_button next" id="default-datatable_next">
                                <a href="#" aria-controls="default-datatable" data-dt-idx="7" tabindex="0">Next</a>
                              </li>
                            </ul>
                          </div>
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
  	<?php include("../../packages/footer-js.php");?>
  </body>
</html>