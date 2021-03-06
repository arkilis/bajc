<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Proposal Submission</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/ajaxfileupload.js"></script>
<script type="text/javascript">

        /*
            type1:      upload type (EOI, proposal, reports), no use
            type2:      file type (word, pdf)
            fileid1:  
            fileid2:    file upload id <input>  
            field:      form submit file value, hidden, the actual path
            msg:        error message
        */
        
      function ajaxFileUpload(type1, type2, fileid2, field, msg){  

          if(document.getElementById(fileid2).value=="")
          {
            alert("Please select choose a file first!");
            return false;
          }
             
          $("#loading").ajaxStart(function(){
              $(this).show();
          }).ajaxComplete(function(){
              $(this).hide();
          });

          $.ajaxFileUpload({
              url:'<?php echo base_url();?>recvProposal.php',
			  data:{'type1': type1,'type2': type2},
              secureuri:false,
              fileElementId: fileid2,//与页面处理代码中file相对应的ID值
              dataType: 'text',//返回数据类型:text，xml，json，html,scritp,jsonp五种
              success: function (data, status){
                  //alert(status);
                  if(data=="0")
                  {
                    $("#"+msg).html("Please upload the file with right file format!");   
		          }
                  else if(data=="-1")
                  {
                    $("#"+msg).html("Upload Failed!");
		          }
                  else
                  {
                    $("#"+field).val(data);  
                    $("#"+msg).html("Succeed!");
                  } 
              },
              error: function (data, status, e){
                  $("#"+msg).html(e);   
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
    <h2>Proposal Submission</h2>
    <hr />
    <?php
        $this->load->helper('form');
        echo form_open('applicant/addProposalUser');
    ?>
    <table style="width:500px;">
        <tr>
            <td>Proposal Title:</td>
            <td><input type="text" name="ProposalTitle" value="<?php echo($ay_res[3]); ?>" />*</td>
            <td class="error"><?php echo form_error('ProposalTitle'); ?></td>
        </tr>
        <tr>
            <td>Chief Investigator:</td>
            <td><input type="hidden" name="ci" value="<?php echo($this->session->userdata('id')); ?>" />
                <input style="background-color:#DEDEDE"
                    type="text" readonly 
                    value="<?php echo($this->session->userdata('fname')." ".$this->session->userdata('lname')); ?>" 
                />
            *</td>
            <td class="error"><?php echo form_error('ci'); ?></td>
        </tr>
        <tr>
            <td>Chief Investigator's Organization:</td>
            <td><input type="text" name="org" value="<?php echo($ay_res[4]); ?>" />*</td>
            <td class="error"><?php echo form_error('org'); ?></td>
        </tr>
        <!--
        <tr>
            <td>Group Member:</td>
            <td><input type="text" name="member" />*</td>
            <td class="error"><?php echo form_error('member'); ?></td>
        </tr>
        -->
        <tr>
            <td>Upload Word Documents:</td>
            <td>
				<input type="file" id="word_doc" name="word_doc" />
				<a href="javascript:void(0)" onclick="return ajaxFileUpload('Proposal','doc', 'word_doc', 'word_msg', 'msg1');">Add</a>
			</td>
            <td></td>
        </tr>
        <tr>
            <td><input type="hidden" name="word" id="word_msg" /></td>
            <td class="error"><p id="msg1"></p></td>
            <td></td>
        </tr>
        <tr>
            <td>Upload PDF Documents:</td>
            <td>
				<input type="file" id="pdf_doc" name="pdf_doc" />
				<a href="javascript:void(0)" onclick="return ajaxFileUpload('Proposal','pdf','pdf_doc', 'pdf_msg', 'msg2');">Add</a>
			</td>
            <td></td>
        </tr>
        <tr>
            <td><input type="hidden" name="pdf" id="pdf_msg" /></td>
            <td class="error"><p id="msg2"></p></td>
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
<!--footer-->
<?php include("includes/footer.php"); ?>
</div>

</body>
</html>
