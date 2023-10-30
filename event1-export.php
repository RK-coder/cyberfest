<?php 
include "db_conn.php";
$query="SELECT r.*,re.* FROM register r, registrations re WHERE r.id=re.id and re.event_name='QUANTUM QUEST' and re.status=1  order by r.college";
$connect=mysqli_query($conn,$query);
$html='<table><tr><td>College Reg.No</td><td>Student Name</td><td>College Name</td><td>Phone.Number</td><td>Email Id</td><td>Degree</td></tr>';
while($data=mysqli_fetch_assoc($connect))
{
$html.='<tr><td>'.$data['reg_no'].'</td><td>'.$data['name'].'</td><td>'.$data['college'].'</td><td>'.$data['phone'].'</td><td>'.$data['email'].'</td><td>'.$data['degree'].'</td></tr>';

}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=Quantum Quest Report.xls');
echo $html;
?>
 