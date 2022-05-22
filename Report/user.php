<?php
     if(isset($_POST['generate_pdf_user']))
     {
          function fetch_data1()  
          {  
               $output_student = '';  
               $conn = mysqli_connect("localhost", "root", "Dxun@931", "alumni_Portal");  
               $sql = "SELECT * FROM project WHERE category = 'user' ";  
               $result = mysqli_query($conn, $sql);  
               while($row = mysqli_fetch_array($result))  
               {       
                $output_student .= '<tr>  
                                <td>'.$row["id"].'</td>  
                                <td>'.$row["enrollment_Number"].'</td>  
                                <td>'.$row["name"].'</td>  
                                <td>'.$row["email"].'</td>
                                <td>'.$row["password"].'</td>  
                                <td>'.$row["mobile_No"].'</td>  
                                <td>'.$row["current_job"].'</td>  
                                <td>'.$row["package"].'</td>  
                                <td>'.$row["category"].'</td>
                                <td>'.$row["status"].'</td>  
                                </tr>';  
               }  
               return $output_student;  
          }  
          if(isset($_POST["generate_pdf_user"]))  
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
               <h4 align="center"> Report For User </h4><br /> 
               <table border="1" cellspacing="0" cellpadding="3">  
               <tr>  
               <th width="4%">Id</th>  
               <th width="14%">Enrollment</th>  
               <th width="10%">Name</th>  
               <th width="11%">Email</th> 
               <th width="14%">Password</th>  
               <th width="13%">Mobile No</th>  
               <th width="13%">Current Job</th>  
               <th width="11%">Package</th>  
               <th width="10%">Category</th>
               <th width="8%">Status</th>
           </tr>    
               ';  
               $content .= fetch_data1();  
               $content .= '</table>';  
               $obj_pdf->writeHTML($content);  
               $obj_pdf->Output('Report.pdf', 'I');  
          }  
     }
?>