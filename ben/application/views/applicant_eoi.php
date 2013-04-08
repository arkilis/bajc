<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - EOI submission</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/ajaxfileupload.js"></script>
<script type="text/javascript">
      function ajaxFileUpload(type1, type2, fileid1, fileid2){   
          //var url = $(fileid1).val();
          $("#loading").ajaxStart(function(){
              $(this).show();
          }).ajaxComplete(function(){
              $(this).hide();
          });

          $.ajaxFileUpload({
              url:'<?php echo base_url();?>/recvEOI.php',
			  data:{'type1': type1,'type2': type2},
              secureuri:false,
              fileElementId: fileid2,//��ҳ�洦�������file���Ӧ��IDֵ
              dataType: 'text',//������������:text��xml��json��html,scritp,jsonp����
              success: function (data, status){
				alert(data);
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
    <?php include("applicant_leftPan.php"); ?>
  </div>
  
  <div id="rightPan">
    <h2>EOI Submission</h2>
    <hr />
    <?php
        $this->load->helper('form');
        echo form_open('applicant/addEOIUser');
    ?>
    <table>
        <tr>
            <td></td>
            <td><input type="hidden" name="eoiid" value="1" /></td>
            <td></td>
        </tr>
        <tr>
            <td>EOI Title:</td>
            <td><input type="text" name="eoiTitle" /></td>
            <td class="error"><?php echo form_error('eoiTitle'); ?></td>
        </tr>
        <tr>
            <td>Chief Investigator:</td>
            <td><input type="text" name="ci" value="7" /></td>
            <td class="error"><?php echo form_error('ci'); ?></td>
        </tr>
        <tr>
            <td>Chief Investigator's Organization:</td>
            <td><input type="text" name="org" /></td>
            <td class="error"><?php echo form_error('org'); ?></td>
        </tr>
        <tr>
            <td>Group Member:</td>
            <td><input type="text" name="member" /></td>
            <td class="error"><?php echo form_error('member'); ?></td>
        </tr>
        <tr>
            <td>Upload Word Documents:</td>
            <td>
				<input type="file" id="word_doc" name="word_doc" />
				<a href="javascript:void(0)" onclick="return ajaxFileUpload('EOI','doc','word_doc','word_doc');">Add</a>
			</td>
            <td class="error"><?php echo form_error('word'); ?></td>
        </tr>
        <tr>
            <td>Upload PDF Documents:</td>
            <td>
				<input type="file" id="pdf_doc" name="pdf_doc" />
				<a href="javascript:void(0)" onclick="return ajaxFileUpload('EOI','pdf','pdf_doc');">Add</a>
			</td>
            <td class="error"><?php echo form_error('pdf'); ?></td>
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
