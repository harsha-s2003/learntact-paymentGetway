<?php error_reporting(0);?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="  " />

<title>ADCC ACADEMY | Invoice</title> 
 <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/adcc logo.png">
<style>
.main-box{ border:2px solid #3a2063; overflow:hidden;  border-radius:20px; background:#FFFFFF; width:60%; margin:auto; padding:12px;}
.school-head{color:#023053; font-size:35px;  font-weight:bold;  }
.school-head span{color:#000; font-size:13px !important;  text-align:center; font-weight:bold;}
.bank-tital{ border:0px solid red; background:#CCCCCC;   text-align:center; padding:10px;}

.bg-td{ background:#ffe6e6;}
.body-bg{ background:white;}
 input{ width:90%; border:#CCCCCC 1px solid; height:25px;}
 .btn{width:100px; background:#0000CC; color:#FFFFFF; font-size:18px;}
 .table-bor tr td{ border:1px solid #CCCCCC; padding:5px;}
 
 @media only screen and (max-width: 768px) {
  .main-box{  width:90%;  }
}
</style>
<style type="text/css" media="print">
  @page {
    size: auto;  
    margin: 0;
    padding:20px 20px;
  }
</style>
</head>
<body class="body-bg" >
 <button type="button" onclick="printDiv('printableArea')" style="width:160px;float: right;" class="btn-primary">Print/Download Invoice</button>
    <div class="main-box" id="printableArea">    
    <table width="100%" border="0">
  <tr>      
    <td><img class="logo-scrolled-to-fixed" src="<?php echo base_url('assets/logo-wide.png');?>" alt="logo" style="width:150px;background-color: white;padding:5px 10px;float: right;"></td>
   
     <td><div class="school-head" style="font-size: 25px;">ADCC Academy<br></div>
      <small style="color: #023053;">Corporate Office: Plot No.144, Pandey layout,Khamla, Nagpur. Ph: 8412 048 877</small>
</td>
  </tr>
  
</table>
<br>
<table width="100%" border="0" cellpadding="5" cellspacing="5">
  <tr>
    <td width="20%"><div align="left">Invoice No : </div></td>
    <td width="80%"><span class="form-group mb-5">
      <b><?= $studentfeeD->transation_id;?></b>
    </span></td>
  </tr>

  <tr>
    <td><div align="left"><span class="form-group mb-5">Full Name </span></div></td>
    <td><span class="form-group mb-5">
     <b><?= $school->name;?></b>
    </span></td>
  </tr>

  <tr>
    <td><div align="left"><span class="form-group mb-5">Class </span></div></td>
    <td><span class="form-group mb-5">
     <b><?= $school->class;?></b>
    </span></td>
  </tr>

  <tr>
    <td><div align="left"><span class="form-group mb-5">School </span></div></td>
    <td><span class="form-group mb-5">
     <b><?= $school->school;?></b>
    </span></td>
  </tr>

  <tr>
    <td><div align="left"><span class="form-group mb-5">Academic Session </span></div></td>
    <td><span class="form-group mb-5">
     <b>2025-2026</b>
    </span></td>
  </tr>

  <tr>
    <td><div align="left"><span class="form-group mb-5">Program </span></div></td>
    <td><span class="form-group mb-5">
     <b>
        <?= $studentfeeD->program;?>
      
     </b>
    </span></td>
  </tr>
  
   <tr>
    <td><div align="left"><span class="form-group mb-5">Date </span></div></td>
    <td><span class="form-group mb-5">
      <b><?= date('d-m-Y',strtotime($studentfeeD->created));?></b>
    </span></td>
  </tr>
</table>

  <table width="100%" border="0" class="table-bor" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10%" class="bg-td"><div align="center"><strong>Sr. No.</strong></div></td>
    <td class="bg-td"><strong>Particulars</strong></td>
    <td class="bg-td"><strong>Amount</strong></td>
  </tr>
 

        <tr>
              <td><div align="center">1</div></td>
              <td class="bg-td">
                Program fee
              </td>
              <td> 

                
                <?= $studentfeeD->fee_amt.'.00';?>
              </td>
        </tr>
        <!-- <tr>
            <td><div align="center"></div></td>
            <td class="bg-td"><div align="right">Sub Total Rs.</div></td>
            <td><b></b></td>
        </tr> -->
        <!-- <tr>
            <td><div align="center"></div></td>
            <td class="bg-td"><div align="right">CGST @ 9%</div></td>
            <td><b> <?= $cgst_total;?></b></td>
        </tr>
        <tr>
            <td><div align="center"></div></td>
            <td class="bg-td"><div align="right">SGST @ 9%</div></td>
            <td><b> <?= $sgst_total;?></b></td>
        </tr> -->
  <tr>
    <td><div align="center"></div></td>
    <td class="bg-td"><div align="right"><strong>Grand Total Rs.</strong></div></td>
    <td><b> <?= $studentfeeD->fee_amt.'.00';?></b></td>
  </tr>
  
</table><br>
<table width="100%" border="0">
  <tr>
    <td>Amount In Word</td>
    <td  ><span class="form-group mb-5">
      <strong><?= $word;?>&nbsp;Rupees</strong>
    </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="left"><br>
<br>

      <p>This is electronic generated receipt which does not required any signature.</p>
    </div></td>
  </tr>
 </table>
 
    </div> 
</body>
</html>
<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    
     
}
</script>