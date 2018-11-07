<?php
  include("../../helpers/require.php");
  include("../../helpers/auth.php");
  include("controller/controller_jemaat.php");
  $curpage = "jemaat";
  $navpage = "Master";
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
                <li><a href="<?=$path['jemaat'];?>">Jemaat Management</a></li>
                <li class="active">Insert</li>
              </ol>
      			</div>

            <!-- start: PAGE CONTENT -->
            <div class="col-md-12">
              <div class="widget">
                <header class="widget-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h4 class="widget-title">Create New Jemaat</h4>
                    </div>
                  </div>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                  <form id="form-jemaat" action="<?=$path['jemaat'];?>index.php?action=add" enctype="multipart/form-data" method="post" onsubmit="return confirmSubmit();">
                    <div class="panel-body">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 form-label"><strong>Nama Depan <span class="symbol-required">*</span></strong> :</div>
                          <div class="col-sm-5 col-xs-12">
                            <input id="input-first-name" name="first_name" type="text" class="form-control input-style" placeholder="Nama Depan" maxlength="100">
                            <div id="error-first-name" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12"></div>
                          <div class="col-sm-5 col-xs-12">
                            <span class="note-input">
                              <i class="fa fa-info-circle"></i> Max char 100
                            </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label"><strong>Nama Tengah <span class="symbol-required">*</span></strong> :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <input id="input-middle-name" name="middle_name" type="text" class="form-control input-style" placeholder="Nama Tengah" maxlength="100">
                            <div id="error-middle-name" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12"></div>
                          <div class="col-sm-5 col-xs-12">
                            <span class="note-input">
                              <i class="fa fa-info-circle"></i> Max char 100
                            </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label"><strong>Nama Marga <span class="symbol-required">*</span></strong> :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <input id="input-last-name" name="last_name" type="text" class="form-control input-style" placeholder="Nama Marga" maxlength="100">
                            <div id="error-last-name" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12"></div>
                          <div class="col-sm-5 col-xs-12">
                            <span class="note-input">
                              <i class="fa fa-info-circle"></i> Max char 100
                            </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label"><strong>Nama Keluarga <span class="symbol-required">*</span></strong> :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <select id="input-keluarga" name="keluarga" class="form-control">
                              <option value="">Pilih Nama Keluarga</option>
                              <?php if(is_array($keluargas)){ foreach($keluargas as $keluarga){?>
                              <option value="<?=$keluarga->id;?>"><?=$keluarga->name;?></option>
                              <?php }}?>
                            </select>
                            <div id="error-keluarga" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row up1"></div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label"><strong>Jenis Kelamin <span class="symbol-required">*</span></strong> :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <label class="radio-inline">
                              <input id="input-gender-1" type="radio" name="gender" value="m"> Laki-laki
                            </label>
                            <label class="radio-inline">
                              <input id="input-gender-2" type="radio" name="gender" value="f"> Perempuan
                            </label>
                            <div id="error-gender" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row up1"></div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label">Tanggal Lahir :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <input id="input-birthday" name="birthday" type="text" class="form-control input-style" placeholder="Tanggal Lahir">
                            <div id="error-birthday" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row up1"></div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label">No. HP 1 :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <input id="input-phone1" name="phone1" type="text" class="form-control input-style" placeholder="No. HP 1">
                            <div id="error-phone1" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row up1"></div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label">No. HP 2 :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <input id="input-phone2" name="phone2" type="text" class="form-control input-style" placeholder="No. HP 2">
                            <div id="error-phone2" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row up1"></div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label">No. HP 3 :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <input id="input-phone3" name="phone3" type="text" class="form-control input-style" placeholder="No. HP 3">
                            <div id="error-phone3" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row up1"></div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label">Catatan :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <textarea id="input-notes" name="notes" class="form-control" rows="3" placeholder="Catatan" maxlength="255"></textarea>
                            <div id="error-notes" class="is-error"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12"></div>
                          <div class="col-sm-5 col-xs-12">
                            <span class="note-input">
                              <i class="fa fa-info-circle"></i> Max char 255
                            </span>
                          </div>
                        </div>
                        <div class="row up1"></div>
                        <div class="row">
                          <div class="col-sm-4 col-xs-12 up1 form-label">Status :</div>
                          <div class="col-sm-5 col-xs-12 up1">
                            <div class="checkbox checkbox-primary">
                              <input id="input-status" checked name="status" type="checkbox" value="1">
                              <label for="input-status">
                                <span class="note-input">Unchecked if status inactive</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <div class="row">
                        <div class="col-sm-12 text-right">
                          <div class="btn-group">
                            <a href="<?=$path['jemaat'];?>" class="btn btn-default"><i class='fa fa-times'></i> Cancel</a>
                            <button id="btn-submit" type="submit" class="btn btn-primary btn-md"><i class="fa fa-check"></i> Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
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
      function validateForm(){
        var first_name = $("#input-first-name").val();
        var middle_name = $("#input-middle-name").val();
        var last_name = $("#input-last-name").val();
        var keluarga = $("#input-keluarga").val();
        var gender = document.getElementsByName('gender');
        var is_gender = false;

        for(var i=0; i < gender.length; i++){
            if(gender[i].checked == true){
                is_gender = true;    
            }
        }
        if(first_name != ""){
          $("#error-first-name").html("");
          $("#error-first-name").hide();
          $("#input-first-name").removeClass("input-error");
        } else {
          $("#error-first-name").show();
          $("#error-first-name").html("<i class='fa fa-warning'></i> This field is required.");
          $("#input-first-name").addClass("input-error");
          $("#input-first-name").focus();
          return false;
        }
        if(middle_name != ""){
          $("#error-middle-name").html("");
          $("#error-middle-name").hide();
          $("#input-middle-name").removeClass("input-error");
        } else {
          $("#error-middle-name").show();
          $("#error-middle-name").html("<i class='fa fa-warning'></i> This field is required.");
          $("#input-middle-name").addClass("input-error");
          $("#input-middle-name").focus();
          return false;
        }
        if(last_name != ""){
          $("#error-last-name").html("");
          $("#error-last-name").hide();
          $("#input-last-name").removeClass("input-error");
        } else {
          $("#error-last-name").show();
          $("#error-last-name").html("<i class='fa fa-warning'></i> This field is required.");
          $("#input-last-name").addClass("input-error");
          $("#input-last-name").focus();
          return false;
        }
        if(keluarga != ""){
          $("#error-keluarga").html("");
          $("#error-keluarga").hide();
          $("#input-keluarga").removeClass("input-error");
        } else {
          $("#error-keluarga").show();
          $("#error-keluarga").html("<i class='fa fa-warning'></i> This field is required.");
          $("#input-keluarga").addClass("input-error");
          $("#input-keluarga").focus();
          return false;
        }
        if(is_gender){
          $("#error-gender").html("");
          $("#error-gender").hide();
          $("#input-gender").removeClass("input-error");
        } else {
          $("#error-gender").show();
          $("#error-gender").html("<i class='fa fa-warning'></i> This field is required.");
          $("#input-gender").addClass("input-error");
          $("#input-gender").focus();
          return false;
        }
        return true;
      }

      function confirmSubmit(){
        if(validateForm()){
            var name = $("#input-first-name").val();
            var result = confirm("Are you sure want to create \""+name+"\" ?");
            if(result){
              $("#btn-submit").attr('disabled', 'disabled');
              $("#btn-submit").html("<i class='fa fa-spinner fa-spin'></i> Loading");
              document.getElementById("form-jemaat").submit();
            }
        }
        return false;
      }
    </script>
  </body>
</html>