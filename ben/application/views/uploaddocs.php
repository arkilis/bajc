<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Docuemnt uploads</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/ajaxfileupload.js"></script>
<script type="text/javascript">

        // name: the post name
        // 
        // msg: succeed information field
        // fileid2: upload type='file' id
        // field: the hidden input to receive the retured value 
      function ajaxFileUpload(fileid2, field, msg){   
          //var url = $(fileid1).val();
          $("#loading").ajaxStart(function(){
              $(this).show();
          }).ajaxComplete(function(){
              $(this).hide();
          });

          $.ajaxFileUpload({
              url:'<?php echo base_url();?>/recvDoc.php',
			  // data:{'type1': type1,'type2': type2}, additional value want to post
              secureuri:false,
              fileElementId: fileid2,//ÓëÒ³Ãæ´¦Àí´úÂëÖÐfileÏà¶ÔÓ¦µÄIDÖµ
              dataType: 'text',//·µ»ØÊý¾ÝÀàÐÍ:text£¬xml£¬json£¬html,scritp,jsonpÎåÖÖ
              success: function (data, status){
                  $("#"+field).val(data);   
                  $("#"+msg).html("Succeed!");   
		          //alert(data);
                  /*if(typeof(data.error) != 'undefined')   {   
                        if(data.error != '')   { 
                            $("#file").val(data.fileUrl); 
                            $("#msg").html("<b style='color:red;'>"+data.error+"</b>");   
                        }else {
                             $("#file").val(data.fileUrl);    
                            $("#msg").html("<b style='color:green;'>"+data.msg+"</b>"); 
                        }   
                    }*/ 
              },
              error: function (data, status, e){
                  alert(e);
              }
          });
		  
          return false;
      }
</script>
<body>
<!--include header-->
<?php include("includes/header2.php"); ?>

<!--body-->
<div id="bodyPan"><!--style="border: black solid 1px"-->
  <div id="leftPan">
    <?php include("admin_leftPan.php"); ?>
  </div>
  
  <div id="rightPan">
    <h2>Document Upload</h2>
    <hr />
    <?php
        $this->load->helper('form');
        echo form_open('admin/uploadDoc');
    ?>
    <table>
        <tr>
            <td>Document Name:</td>
            <td><input type="text" name="fileName" /></td>
            <td class="error"><?php echo form_error('fileName'); ?></td>
        </tr>
        <tr>
            <td>Upload:</td>
            <td>
				<input type="file" id="doc" name="doc" />
				<a href="javascript:void(0)" onclick="return ajaxFileUpload('doc', 'doc_path', 'msg');">Add</a>
			</td>
            <td class="error"><?php echo form_error('doc_path'); ?></td>
        </tr>
        <tr>
            <td><input id="doc_path" name="doc_path" type="hidden" /></td>
            <td><p id="msg"></p></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><img id="loading" style="display:none" src="<?php echo base_url();?>/images/loading.gif"/></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" /></td>
            <td></td>
        </tr>
    </table>
  </div>

</div>

<!--footer-->
<?php include("includes/footer.php"); ?>

</body>
</html>
