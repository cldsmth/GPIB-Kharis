<?php
  include("../../helpers/require.php");
  include("../../helpers/auth.php");
  include("controller/controller_jemaat.php");
  $curpage = "jemaat";
  $navpage = "Master";
  $param_keyword = "q=".$_keyword;
  $param_sector = "sector=".$_sector;
  $param_pelkat = "pelkat=".$_pelkat;
  $param_gender = "gender=".$_gender;
  $param_marriage = "marriage=".$_marriage;
  $param_status = "status=".$_status;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$title['jemaat'];?></title>
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
                <li class="active">Jemaat Management</li>
              </ol>
      			</div>

            <!-- start: PAGE CONTENT -->
            <div class="col-md-12">
              <div class="widget">
                <header class="widget-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h4 class="widget-title">Manage Jemaat</h4>
                    </div>
                    <div class="hidden-xs">
                      <div class="col-sm-6 text-right">
                        <a href="<?=$path['jemaat-add'];?>" class="btn btn-xs btn-outline btn-primary"><i class='fa fa-plus'></i> Create New Jemaat</a>
                      </div>
                    </div>
                    <div class="visible-xs">
                      <div class="col-sm-6 text-left up1">
                        <a href="<?=$path['jemaat-add'];?>" class="btn btn-xs btn-outline btn-primary"><i class='fa fa-plus'></i> Create New Jemaat</a>
                      </div>
                    </div>
                  </div>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                  <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                      <div class="form-group">
                        <div class="search-wrap">
                          <form action="" enctype="multipart/form-data" method="get">
                            <div class="search-group">
                              <div class="search-input">
                                <input name="page" type="hidden" value="1">
                                <input name="q" type="text" class="form-control input-style" placeholder="What are you looking for" autocomplete="off" value="<?=inputDisplay($_keyword);?>">
                              </div>
                              <span class="search-group-btn">
                                <button class="btn btn-default" type="submit"><i class='fa fa-search'></i> Search</button>
                              </span>
                            </div>
                            <div class="link-search">
                              <a href="javascript:void(0)" onclick="alert('export excel')">Export Excel</a> <span>&nbsp;|&nbsp;</span> <a href="javascript:void(0)" data-toggle="modal" data-target="#panel-advanced-search">Advanced Search</a> <?php if(!empty($_search)){?> <span>&nbsp;|&nbsp;</span> <a href="<?=$path['jemaat'];?>">Clear Advanced Search</a> <?php }?>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-4"></div>
                  </div>
                  <?php if(!empty($_search)){?>
                  <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                      <div class="form-group">
                        <div class="table-responsive">
                          <table class="table table-horizontal-scroll">
                            <tbody>
                              <?php if($_keyword != ""){?>
                              <tr>
                                <td><a href="<?=$path['jemaat']."?page=1&q=&".$param_sector."&".$param_pelkat."&".$param_gender."&".$param_marriage."&".$param_status;?>"><i class="fa fa-remove" style="color:#444;"></i></a></td>
                                <td><?=TextAdvancedSearch("keyword", $_keyword);?></td>
                              </tr>
                              <?php }?>

                              <?php if($_sector != ""){?>
                              <tr>
                                <td><a href="<?=$path['jemaat']."?page=1&".$param_keyword."&sector=&".$param_pelkat."&".$param_gender."&".$param_marriage."&".$param_status;?>"><i class="fa fa-remove" style="color:#444;"></i></a></td>
                                <td><?=TextAdvancedSearch("sector", $_sector);?></td>
                              </tr>
                              <?php }?>

                              <?php if($_pelkat != ""){?>
                              <tr>
                                <td><a href="<?=$path['jemaat']."?page=1&".$param_keyword."&".$param_sector."&pelkat=&".$param_gender."&".$param_marriage."&".$param_status;?>"><i class="fa fa-remove" style="color:#444;"></i></a></td>
                                <td><?=TextAdvancedSearch("pelkat", $_pelkat);?></td>
                              </tr>
                              <?php }?>

                              <?php if($_gender != ""){?>
                              <tr>
                                <td><a href="<?=$path['jemaat']."?page=1&".$param_keyword."&".$param_sector."&".$param_pelkat."&gender=&".$param_marriage."&".$param_status;?>"><i class="fa fa-remove" style="color:#444;"></i></a></td>
                                <td><?=TextAdvancedSearch("gender", $_gender);?></td>
                              </tr>
                              <?php }?>
                              
                              <?php if($_marriage != ""){?>
                              <tr>
                                <td><a href="<?=$path['jemaat']."?page=1&".$param_keyword."&".$param_sector."&".$param_pelkat."&".$param_gender."&marriage=&".$param_status;?>"><i class="fa fa-remove" style="color:#444;"></i></a></td>
                                <td><?=TextAdvancedSearch("marriage", $_marriage);?></td>
                              </tr>
                              <?php }?>
                              
                              <?php if($_status != ""){?>
                              <tr>
                                <td><a href="<?=$path['jemaat']."?page=1&".$param_keyword."&".$param_sector."&".$param_pelkat."&".$param_gender."&".$param_marriage."&status=";?>"><i class="fa fa-remove" style="color:#444;"></i></a></td>
                                <td><?=TextAdvancedSearch("status", $_status);?></td>
                              </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div> 
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-4"></div>
                  </div>
                  <?php }?>
                  <div class="table-responsive">
                    <table class="table table-striped table-horizontal-scroll">
                      <tbody>
                        <tr>
                          <th class="text-left">#</th>
                          <th class="text-center">Action</th>
                          <th class="text-center">Status</th>
                          <th>Nama Jemaat</th>
                          <th>Nama Keluarga</th>
                          <th class="text-center">Sektor</th>
                          <th>Jenis Kelamin</th>
                          <th>No. HP</th>
                          <th>Tanggal Lahir</th>
                          <th>Status Menikah</th>
                          <th>Create Date</th>
                          <th>Last Updated</th>
                        </tr>
                        <?php $num=1; if(hasProperty($datas, "data")){ foreach($datas->data as $data){?>
                        <tr>
                          <td class="text-left"><?=($_page-1)*20+$num;?>.</td>
                          <td class="text-center">
                            <a href="<?=$path['jemaat-edit']."?id=".$data->id;?>" class="btn btn-xs btn-outline btn-success"><i class='fa fa-edit'></i> Edit</a>
                            <a href="javascript:void(0)" onclick="confirmDelete('<?=$data->id;?>', '<?=$data->full_name;?>');" class="btn btn-xs btn-outline btn-danger"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                          <td class="text-center"><?=checkStatus($data->status);?></td>
                          <td><?=correctDisplay($data->full_name);?></td>
                          <td><?=correctDisplay($data->keluarga->name);?></td>
                          <td class="text-center"><?=$data->keluarga->sector;?></td>
                          <td><?=checkGender($data->gender);?></td>
                          <td><?=$data->phone1;?></td>
                          <td><?=($data->birthday != "0000-00-00" ? date("d-M-Y", strtotime($data->birthday)) : "-");?></td>
                          <td><?=checkStatusMarriage($data->status_marriage);?></td>
                          <td><?=date("d-M-Y, H:i:s", strtotime($data->datetime));?></td>
                          <td><?=($data->datetime != $data->timestamp ? time_ago($data->timestamp) : "-");?></td>
                        </tr>
                        <?php $num++;}}else{?>
                        <tr>
                          <td colspan="12">There is no data!</td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <div id="default-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap up2">
                    <div class="row">
                      <div class="col-sm-5">
                        <?php if(hasProperty($datas, "data")){?>
                        <div class="dataTables_info" id="default-datatable_info" role="status" aria-live="polite"><?="Showing ".(($_page-1)*20+1)." to ".($total_data+(($_page-1)*20))." of ".$total_data_all." entries";?></div>
                        <?php }?>
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
                              echo "<a href='".$path['jemaat']."?page=".($_page-1)."&".$param_keyword."&".$param_sector."&".$param_pelkat."&".$param_gender."&".$param_marriage."&".$param_status."' aria-controls='default-datatable' data-dt-idx='0' tabindex='0'><i class='fa fa-chevron-left'></i> Previous</a>";
                              echo "</li>";
                            }
                            for($mon = $prevLimit; $mon <= $nextLimit;$mon++){?>
                              <li class="paginate_button <?php if($mon == $_page){echo 'active';}?>">
                                <a href="<?=$path['jemaat']."?page=".$mon."&".$param_keyword."&".$param_sector."&".$param_pelkat."&".$param_gender."&".$param_marriage."&".$param_status;?>" aria-controls="default-datatable" data-dt-idx="<?=$mon;?>" tabindex="0"><?=$mon;?></a>
                              </li>
                            <?php } if($total_page > 1 && $_page != $total_page){
                              echo "<li id='default-datatable_next' class='paginate_button next'>";
                              echo "<a href='".$path['jemaat']."?page=".($_page+1)."&".$param_keyword."&".$param_sector."&".$param_pelkat."&".$param_gender."&".$param_marriage."&".$param_status."' aria-controls='default-datatable' data-dt-idx='".($_page+1)."' tabindex='0'><i class='fa fa-chevron-right'></i> Next</a>";
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

            <!-- start: PANEL SEARCH MODAL FORM -->
            <div class="modal fade" id="panel-advanced-search" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      &times;
                    </button>
                    <h4 class="modal-title">Advanced Search</h4>
                  </div>
                  <form name="form-advanced-search" action="" enctype="multipart/form-data" method="get">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-3 col-xs-12 form-label">Kata Kunci :</div>
                        <div class="col-sm-8 col-xs-12">
                          <input name="page" type="hidden" value="1">
                          <input name="q" type="text" class="form-control input-style" placeholder="Cari berdasarkan Nama, Keluarga, No. HP, atau Alamat" value="<?=inputDisplay($_keyword);?>">
                        </div>
                      </div>
                      <div class="row up1"></div>
                      <div class="row">
                        <div class="col-sm-3 col-xs-12 form-label">Sektor :</div>
                        <div class="col-sm-8 col-xs-12">
                          <select name="sector" class="form-control">
                            <option value="">Pilih Sektor</option>
                            <?php if(is_array($sectors)){ foreach($sectors as $sector){?>
                            <option <?=isSelected($_sector, $sector['value']);?> value="<?=$sector['value'];?>"><?=$sector['text'];?></option>
                            <?php }}?>
                          </select>
                        </div>
                      </div>
                      <div class="row up1"></div>
                      <div class="row">
                        <div class="col-sm-3 col-xs-12 form-label">Pelkat :</div>
                        <div class="col-sm-8 col-xs-12">
                          <select name="pelkat" class="form-control">
                            <option value="">Pilih Pelkat</option>
                            <?php if(is_array($pelkats)){ foreach($pelkats as $pelkat){?>
                            <option <?=isSelected($_pelkat, $pelkat['value']);?> value="<?=$pelkat['value'];?>"><?=$pelkat['text'];?></option>
                            <?php }}?>
                          </select>
                        </div>
                      </div>
                      <div class="row up1"></div>
                      <div class="row">
                        <div class="col-sm-3 col-xs-12 form-label">Jenis Kelamin :</div>
                        <div class="col-sm-8 col-xs-12">
                          <select name="gender" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <?php if(is_array($genders)){ foreach($genders as $gender){?>
                            <option <?=isSelected($_gender, $gender['value']);?> value="<?=$gender['value'];?>"><?=$gender['text'];?></option>
                            <?php }}?>
                          </select>
                        </div>
                      </div>
                      <div class="row up1"></div>
                      <div class="row">
                        <div class="col-sm-3 col-xs-12 form-label">Status Menikah :</div>
                        <div class="col-sm-8 col-xs-12">
                          <select name="marriage" class="form-control">
                            <option value="">Pilih Status Menikah</option>
                            <?php if(is_array($marriages)){ foreach($marriages as $marriage){?>
                            <option <?=isSelected($_marriage, $marriage['value']);?> value="<?=$marriage['value'];?>"><?=$marriage['text'];?></option>
                            <?php }}?>
                          </select>
                        </div>
                      </div>
                      <div class="row up1"></div>
                      <div class="row">
                        <div class="col-sm-3 col-xs-12 form-label">Status :</div>
                        <div class="col-sm-8 col-xs-12">
                          <select name="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <?php if(is_array($statuss)){ foreach($statuss as $status){?>
                            <option <?=isSelected($_status, $status['value']);?> value="<?=$status['value'];?>"><?=$status['text'];?></option>
                            <?php }}?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer f5-bg">
                      <div class="btn-group">
                        <button type="reset" class="btn btn-default" data-dismiss="modal"><i class='fa fa-times'></i> Cancel</button>
                        <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-check"></i> Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- end: SPANEL CONFIGURATION MODAL FORM -->
      	
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