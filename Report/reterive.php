<?php  
function fetch_data()  
{  
     $output_all = '';  
     $conn = mysqli_connect("localhost", "root", "Dxun@931", "alumni_Portal");  
     $sql = "SELECT * FROM user_details ORDER BY enrollment_Number ASC";  
     $result = mysqli_query($conn, $sql);  
     while($row = mysqli_fetch_array($result))  
     {       
     $output_all .= '<tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["enrollment_Number"].'</td>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["email"].'</td>
                         <td>'.$row["mobile_No"].'</td>  
                         <td>'.$row["current_job"].'</td>  
                         <td>'.$row["package"].'</td>  
                         <td>'.$row["category"].'</td>   
                    </tr>';  
     }  
     return $output_all;  
}  
if(isset($_POST["generate_pdf_All"]))  
{  
     require_once('./tcpdf.php');  
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle("Report");  
     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
     $obj_pdf->setPrintHeader(false);  
     $obj_pdf->setPrintFooter(false);  
     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
     $obj_pdf->SetFont('helvetica', '', 11);  
     $obj_pdf->AddPage();  
     $content = '';  
     $content .= '  
     <h4 align="center"> Report </h4><br /> 
     <table border="1" cellspacing="0" cellpadding="3">  
     <tr>  
     <th width="4%">Id</th>  
     <th width="14%">Enrollment</th>  
     <th width="10%">Name</th>  
     <th width="11%">Email</th> 
     <th width="13%">Mobile No</th>  
     <th width="13%">Current Job</th>  
     <th width="11%">Package</th>  
     <th width="10%">Category</th>
 </tr>  
     ';  
     $content .= fetch_data();  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output('Report.pdf', 'I');  
}  
?>  

<!DOCTYPE html>  
<html>  
     <head>  
          <title>Report</title>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
     </head>  
     <body>  
          <div class="container">  
               <h4 align="center"> Report </h4>  
               <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                         <form method="post">  
                              <input type="submit" name="generate_pdf_All" class="btn btn-success" value="Generate PDF" />  
                         </form>
                    </div><br><br>

                    <table class="table" style="border: 1px solid black; width: 100%;">
                         <div style="font-size: normal;"> 
                              <th colspan="2" style="text-align: center; border:1px solid black"> Current Job </th>

                              <form action="./student.php" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center">Student</td>  
                                        <td><input type="submit" name="generate_pdf_student" class="btn btn-success" value="Student Report"/></td>  
                                   </tr>
                              </form>

                              <form action="./manager.php" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center">Manager</td>
                                        <td><input type="submit" name="generate_pdf_manager" class="btn btn-success" value="Manager Report"/></td> 
                                   </tr>
                              </form>

                              <form action="./employee.php" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center"> Employee</td>  
                                        <td><input type="submit" name="generate_pdf_employee" class="btn btn-success" value="Employee Report"/></td> 
                                   </tr>
                              </form>

                              <form action="./exective.php" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center"> Executive </td>
                                        <td><input type="submit" name="generate_pdf_executive" class="btn btn-success" value="Executive Report"/></td> 
                                   </tr>
                              </form>

                              <form action="./senior executive.php" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center"> Senior Executive </td>
                                        <td><input type="submit" name="generate_pdf_seniorexecutive" class="btn btn-success" value="Senior Exective Report"/></td> 
                                   </tr>
                              </form>
                         </div>
                    </table><br>

                    <table class="table" style="border: 1px solid black; width: 100%;">
                         <div style="font-size: normal;"> 
                              <th colspan="2" style="text-align: center; border:1px solid black"> Category </th>

                              <form action="./user.php" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center">User</td>  
                                        <td><input type="submit" name="generate_pdf_user" class="btn btn-success" value="User Report"/></td>  
                                   </tr>
                              </form>

                              <form action="./admin.php" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center">Admin</td>  
                                        <td><input type="submit" name="generate_pdf_admin" class="btn btn-success" value="Admin Report"/></td>  
                                   </tr>
                              </form>
                         </div>
                    </table><br>

                    <table class="table" style="border: 1px solid black; width: 100%;">
                         <div style="font-size: normal;"> 
                              <th colspan="2" style="text-align: center; border:1px solid black"> Salary/Income/Package</th>

                              <form action="" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center">100000-500000</td>  
                                        <td><input type="submit" name="generate_pdf_user" class="btn btn-success" value="Package Report"/></td>  
                                   </tr>
                              </form>

                              <form action="" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center">500001 - 1000000</td>  
                                        <td><input type="submit" name="generate_pdf_admin" class="btn btn-success" value="Package Report"/></td>  
                                   </tr>
                              </form>

                              <form action="" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center">1000001 - 1500000</td>  
                                        <td><input type="submit" name="generate_pdf_admin" class="btn btn-success" value="Packages Report"/></td>  
                                   </tr>
                              </form>

                              <form action="" method="post">
                                   <tr>  
                                        <td width="50%" style="text-align: center"> 1500001+ </td>  
                                        <td><input type="submit" name="generate_pdf_admin" class="btn btn-success" value="Package Report"/></td>  
                                   </tr>
                              </form>
                         </div>
                    </table>

               </div>  
          </div>
     </body>  
</html>

