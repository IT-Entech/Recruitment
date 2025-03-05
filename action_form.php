<?php
session_start();
include_once '../connectDB/connectDB.php';
$objCon = connectDB();
$timezone = new DateTimeZone('Asia/Bangkok'); // Setting the timezone
$date = new DateTime('now', $timezone);
$record_datetime = $date->format('Y-m-d H:i:s');
$data = $_POST;
$Name_First = $data['Name_First'];
// สร้างชื่อไฟล์ใหม่โดยใช้ timestamp
$file = './log_file/data_' . time() . '.json';

// Encode the array into JSON format before saving
$jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

if (file_put_contents($file, $jsonData)) {
    echo 'Data successfully saved to ' . $file;
    include 'insertData1.php'; // Insert into the database
} else {
    echo 'Error writing to file';
}

//print_r($data);
$startDate = $data['StartDate'];
$position = $data['position'];
$present_salary = $data['present_salary'];
$requied_salary = $data['required_salary'];
$Name_Title = $data['Name_Title'];

$Name_Last = $data['Name_Last'];
$Name_Nickname = $data['Name_Nickname'];
$birth_date = $data['birth_date'];
$age = $data['age'];
$weight = $data['weight'];
$height = $data['height'];
$race = $data['race'];
$nationality = $data['nationality'];
$religion = $data['religion'];
$idcard = $data['idcard'];
$startcard = $data['startcard'];
$expcard = $data['expcard'];
$Address_AddressLine1 = $data['Address_AddressLine1'];
$amphur = $data['amphur'];
$tambon = $data['tambon'];
$province = $data['province'];


$same = $data['Same'];
$province1 = $data['province1'];
$Address_ZipCode = $data['Address_ZipCode'];
$Address1_AddressLine1 = $data['Address1_AddressLine1'];
$amphur1 = $data['amphur1'];
$tambon1 = $data['tambon1'];


$Address1_ZipCode = $data['Address1_ZipCode'];
$Tel = $data['Tel'];
$Email = $data['Email'];
$soldier = $data['soldier'];
if($soldier === 'ได้รับการยกเว้น'){
    $except = $data['except'];
}else{
    $except = NULL;
}
$status = $data['status'];
if($status === 'อื่นๆ'){
    $other1 = $data['other1'];
}else{
    $other1 = NULL;
}
$child_number = $data['child_number'];

$child_boy = $data['child_boy'];
if(empty($child_boy)){
    $male = NULL;
}else{
    $male = $data['child_boy'];
}
$child_girl = $data['child_girl'];
if(empty($child_girl)){
    $female = NULL;
}else{
    $female = $data['child_girl'];
}
$Chronic_Disease = $data['Chronic_Disease'];
if($Chronic_Disease === 'มี'){
    $other2 = $data['other2'];
}else{
    $other2 = NULL;
}

$contagious_disease = $data['contagious_disease'];
if($contagious_disease === 'เคย'){
    $other3 = $data['other3'];
}else{
    $other3 = NULL;
}

$criminal = $data['criminal'];
if($criminal === 'เคย'){
    $other4 = $data['other4'];
}else{
    $other4 = NULL;
}

$dad_name = $data['dad_name'];
$dad_age = $data['dad_age'];
$dad_job = $data['dad_job'];
$dad_workplace = $data['dad_workplace'];
$dad_tel = $data['dad_tel'];
$mom_name = $data['mom_name'];
$mom_age = $data['mom_age'];
$mom_job = $data['mom_job'];
$mom_workplace = $data['mom_workplace'];
$mom_tel = $data['mom_tel'];
$marry_name = $data['marry_name'];
$marry_age = $data['marry_age'];
$marry_job = $data['marry_job'];
$marry_workplace = $data['marry_workplace'];
$marry_tel = $data['marry_tel'];
$sum_sibling = $data['sum_sibling'];
$which_you = $data['which_you'];
$brother = $data['brother'];
$sister = $data['sister'];
$workplace1 = $data['workplace1'];
$tel_office1 = $data['tel_office1'];
$position1 = $data['position1'];
$salary1 = $data['salary1'];
$Date1 = $data['Date1'];
$Date2 = $data['Date2'];
$reason1 = $data['reason1'];
$nature1 = $data['nature1'];
$workplace2 = $data['workplace2'];
$tel_office2 = $data['tel_office2'];
$position2 = $data['position2'];
$salary2 = $data['salary2'];
$Date3 = $data['Date3'];
$Date4 = $data['Date4'];
$reason2 = $data['reason2'];
$nature2 = $data['nature2'];
$workplace3 = $data['workplace3'];
$tel_office3 = $data['tel_office3'];
$position3 = $data['position3'];
$salary3 = $data['salary3'];
$Date5 = $data['Date5'];
$Date6 = $data['Date6'];
$reason3 = $data['reason3'];
$nature3 = $data['nature3'];
$schoolName = $data['schoolName'];
$Educational_qualification = $data['Educational_qualification'];
$Apoint = $data['Apoint'];
$first_startyear = $data['first_startyear'];
$first_gruadeyear = $data['first_gruadeyear'];
$vocationName = $data['vocationName'];
$Educational_qualification2 = $data['Educational_qualification2'];
$depart2 = $data['depart2'];
$Apoint2 = $data['Apoint2'];
$first_startyear2 = $data['first_startyear2'];
$first_gruadeyear2 = $data['first_gruadeyear2'];
$UName = $data['UName'];
$Educational_qualification3 = $data['Educational_qualification3'];
$depart3 = $data['depart3'];
$Apoint3 = $data['Apoint3'];
$first_startyear3 = $data['first_startyear3'];
$first_gruadeyear3 = $data['first_gruadeyear3'];
$othernName = $data['otherName'];
$Educational_qualification4 = $data['Educational_qualification4'];
$depart4 = $data['depart4'];
$Apoint4 = $data['Apoint4'];
$first_startyear4 = $data['first_startyear4'];
$first_gruadeyear4 = $data['first_gruadeyear4'];



$statusmd = $data['statusmd'];
$StatusOthers = $data['StatusOthers'];
$readEng = isset($_POST['readEng']) ? $_POST['readEng'] : NULL;
$speakEng = isset($_POST['speakEng']) ? $_POST['speakEng'] : NULL;
$writeEng = isset($_POST['writeEng']) ? $_POST['writeEng'] : NULL;
$otherlang = isset($_POST['otherlang']) ? $_POST['otherlang'] : NULL;
$writeOther = isset($_POST['writeOther']) ? $_POST['writeOther'] : NULL;
$readOther = isset($_POST['readOther']) ? $_POST['readOther'] : NULL;
$speakOther = isset($_POST['speakOther']) ? $_POST['speakOther'] : NULL;
$candrive = isset($_POST['candrive']) ? $_POST['candrive'] : NULL;
$canride = isset($_POST['canride']) ? $_POST['canride'] : NULL;
$have_licensed = isset($_POST['have_licensed']) ? $_POST['have_licensed'] : NULL;
$have_licensed_motor = isset($_POST['have_licensed_motor']) ? $_POST['have_licensed_motor'] : NULL;
$have_car = isset($_POST['have_car']) ? $_POST['have_car'] : NULL;
$have_motor = isset($_POST['have_motor']) ? $_POST['have_motor'] : NULL;
$outside_office = isset($_POST['outside_office']) ? $_POST['outside_office'] : NULL;
$licenseCar_no = $data['licenseCar_no'];
$licensemotor_no = $data['licensemotor_no'];
$คอมพิวเตอร์  = isset($_POST['คอมพิวเตอร์']) ? $_POST['คอมพิวเตอร์'] : NULL;
$printer  = isset($_POST['printer']) ? $_POST['printer'] : NULL;
$officeOthers  = $data['officeOthers'];
$Word  = isset($_POST['Word']) ? $_POST['Word'] : NULL;
$Excel  = isset($_POST['Excel']) ? $_POST['Excel'] : NULL;
$PowerPoint  = isset($_POST['PowerPoint']) ? $_POST['PowerPoint'] : NULL;
$Adobe  = $data['Adobe'];
$Otherprogram  = $data['Otherprogram'];
$specialist  = $data['specialist'];
$hobby  = $data['hobby'];

$name_ref  = $data['name_ref'];
$related_ref  = $data['related_ref'];
$address_ref  = $data['address_ref'];
$post_ref  = $data['post_ref'];
$tel_ref  = $data['tel_ref'];

$name_ref2  = $data['name_ref2'];
$related_ref2  = $data['related_ref2'];
$address_ref2  = $data['address_ref2'];
$post_ref2  = $data['post_ref2'];
$tel_ref2  = $data['tel_ref2'];

$name_urgent  = $data['name_urgent'];
$related_urgent  = $data['related_urgent'];
$address_urgent  = $data['address_urgent'];
$tel_urgent  = $data['tel_urgent'];

$time = time();
date_default_timezone_set("Asia/Bangkok");
$timestamp = date('Y-m-d H:i:s', $time);

//print_r($data);

// SQL query to count the number of rows with the given idcard_no
$sqlid = "SELECT COUNT(*) AS count FROM hr_job_application WHERE idcard_no = ?";
$params = array($idcard);

// Execute the query
$stmt = sqlsrv_query($objCon, $sqlid, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle query execution error
}

// Fetch the result
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($row === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle fetch error
}

$count = $row['count'];

if ($count > 0) {
    echo '<script>';
    echo 'alert("Duplicate entry found for idcard_no: ' . $idcard . '");';
    echo 'window.location="https://erp-web.en-technology.com/Encrypt.php";';
    echo '</script>';
} else {

$strSQLHead = "INSERT INTO hr_job_application ([record_id]
,[record_date]
,[update_id]
,[update_date]
,[is_active]
,[application_date]
,[position_name]
,[present_salary]
,[ready_start_work_date]
,[required_salary]
,[pfix_code]
,[fname]
,[lname]
,[nick_name]
,[birth_date]
,[age]
,[weight]
,[height]
,[race_code]
,[nationality_code]
,[religion_code]
,[idcard_no]
,[issued_date]
,[expired_date]
,[military_status]
,[military_remark]
,[married_status]
,[married_others]
,[number_of_children]
,[boys]
,[girls]
,[is_chronic]
,[diseased_name]
,[is_contagious_diseased]
,[contagious_diseased_detail]
,[is_convicted]
,[convicted_detail]
,[father_name]
,[father_age]
,[father_occupation]
,[father_address]
,[father_phone]
,[mother_name]
,[mother_age]
,[mother_occupation]
,[mother_address]
,[mother_phone]
,[spouse_name]
,[spouse_age]
,[spouse_occupation]
,[spouse_address]
,[spouse_phone]
,[parent_status_code]
,[parent_status_other]
,[brethren_total]
,[your_number]
,[male]
,[female]
,[is_drive_car]
,[is_drive_car_license]
,[with_license_car]
,[is_ride_motorcycle]
,[is_motorcycle_license]
,[with_license_no]
,[is_own_car]
,[is_own_motorcycle]
,[is_work_outside]
,[use_computer]
,[use_printer]
,[use_other]
,[use_microsoft]
,[use_Adobe]
,[use_Other_software]
,[specialty]
,[hobby]
,[perception_channel]
,[pic_fname]
,[pic_lname]
,[pic_position]
,[pic_department]
,[pic_relationship]
,[urgent_fname]
,[urgent_lname]
,[urgent_relationship]
,[urgent_company_add]
,[urgent_phone]
,[other]
,[Excel]
,[Word]
,[PowerPoint]
,[selected]
,[begin_date]) VALUES (NULL, '$timestamp', NULL, '$timestamp' ,'Y' , '$timestamp', '$position', '$present_salary', '$startDate', '$requied_salary',
'$Name_Title', '$Name_First', '$Name_Last', '$Name_Nickname' ,'$birth_date' ,'$age', '$weight', '$height', '$race', '$nationality',
'$religion', $idcard, '$startcard', '$expcard' ,'$soldier' ,'$except', '$status', '$other1', '$child_number', '$male',
'$female', '$Chronic_Disease', '$other2', '$contagious_disease' ,'$other3' ,'$criminal', '$other4', '$dad_name', '$dad_age', '$dad_job',
'$dad_workplace', '$dad_tel', '$mom_name', '$mom_age' ,'$mom_job' ,'$mom_workplace', '$mom_tel', '$marry_name', '$marry_age', '$marry_job',
'$marry_workplace', '$marry_tel', '$statusmd', '$StatusOthers', '$sum_sibling' ,'$which_you' ,'$brother', '$sister', '$candrive', '$have_licensed', 
'$licenseCar_no','$canride', '$have_licensed_motor', '$licensemotor_no', '$have_car' ,'$have_motor' ,'$outside_office', '$คอมพิวเตอร์', '$printer','$officeOthers',
NULL,'$Adobe','$Otherprogram', '$specialist', '$hobby', NULL ,NULL ,NULL, NULL, NULL, 
NULL, '$name_urgent',NULL, '$related_urgent', '$address_urgent', '$tel_urgent', NULL, '$Excel', '$Word', '$PowerPoint','N', NULL)";
$objQuery = sqlsrv_query($objCon, $strSQLHead);
if ($objQuery === false) {
    die(print_r(sqlsrv_errors(), true));
}


$strSQL = "INSERT INTO hr_application_personal_references ([id_card_no]
,[name]
	,[company_name]
	,[address]
    ,[post1]
	,[phone_no]
	,[name2]
	,[company_name2]
	,[address2]
    ,[post2]
	,[phone_no2]) VALUES ('$idcard', '$name_ref', '$related_ref', '$address_ref', '$post_ref', '$tel_ref' , '$name_ref2', '$related_ref2', '$address_ref2', '$post_ref2', '$tel_ref2')";
$obj1 = sqlsrv_query($objCon, $strSQL);
if ($obj1 === false) {
    die(print_r(sqlsrv_errors(), true));
} 

$strSQLquery = "INSERT INTO hr_application_address_present ([id_card_no]
,[address]
,[province_name]
,[amphur_name]
,[tambon_name]
,[zip_code]
,[phone]
,[email]
,[system_type]) VALUES ('$idcard', '$Address1_AddressLine1', '$province', '$amphur', '$tambon', '$Address1_ZipCode', '$Tel', '$Email', 'Online')";
$objQuery1 = sqlsrv_query($objCon, $strSQLquery);
if ($objQuery1 === false) {
    die(print_r(sqlsrv_errors(), true));
} 

if($same === 'Y'){
$strSQLquery1 = "INSERT INTO hr_application_domicile ([id_card_no]
,[domicile]
,[province_name]
,[amphur_name]
,[tambon_name]
,[zip_code]
,[phone]
,[system_type]) VALUES ('$idcard', '$Address1_AddressLine1', '$province', '$amphur', '$tambon', '$Address1_ZipCode',' $Tel', 'Online')";
$objQuery2 = sqlsrv_query($objCon, $strSQLquery1);
}else{
    $strSQLquery1 = "INSERT INTO hr_application_domicile ([id_card_no]
    ,[domicile]
    ,[province_name]
    ,[amphur_name]
    ,[tambon_name]
    ,[zip_code]
    ,[phone]
    ,[system_type]) VALUES ('$idcard', '$Address_AddressLine1', '$province1', '$amphur1', '$tambon1', '$Address_ZipCode','$Tel', 'Online')";
    $objQuery2 = sqlsrv_query($objCon, $strSQLquery1); 
}
if ($objQuery2 === false) {
    die(print_r(sqlsrv_errors(), true));
} 


$sql = "INSERT INTO hr_application_experience ([id_card_no]
,[company_name]
,[phone_no]
,[position_name]
,[salary]
,[from_date]
,[to_date]
,[leave_reason]
,[job_detail]
,[company_name1]
,[phone_no1]
,[position_name1]
,[salary1]
,[from_date1]
,[to_date1]
,[leave_reason1]
,[job_detail1]
,[company_name2]
,[phone_no2]
,[position_name2]
,[salary2]
,[from_date2]
,[to_date2]
,[leave_reason2]
,[job_detail2]
,[system_type]) VALUES ('$idcard', '$workplace1', '$tel_office1', '$position1', '$salary1', '$Date1', '$Date2', '$reason1', '$nature1',
'$workplace2', '$tel_office2', '$position2', '$salary2', '$Date3', '$Date4', '$reason2', '$nature2',
'$workplace3', '$tel_office3', '$position3', '$salary3', '$Date5', '$Date6', '$reason3', '$nature3', 'O')";
$stmt = sqlsrv_query($objCon, $sql);
if (!$stmt) {
    die(print_r(sqlsrv_errors(), true));
}

$sql1 = "INSERT INTO hr_application_education ([id_card_no]
,[school_name]
,[school_degree]
,[school_grade]
,[Sbegin_year]
,[Send_year]
,[vacational_name]
,[vacational_degree]
,[vacational_major]
,[vacational_grade]
,[Vbegin_year]
,[Vend_year]
,[University_name]
,[University_degree]
,[University_major]
,[University_grade]
,[Ubegin_year]
,[Uend_year]
,[Other_name]
,[Other_degree]
,[Other_major]
,[Other_grade]
,[Obegin_year]
,[Oend_year]
,[system_type]) VALUES (
    ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, 'Online'
)";
// Parameters array
$params = array(
    $idcard, $schoolName, $Educational_qualification, $Apoint, $first_startyear, $first_gruadeyear,
    $vocationName, $Educational_qualification2, $depart2, $Apoint2, $first_startyear2, $first_gruadeyear2,
    $UName, $Educational_qualification3, $depart3, $Apoint3, $first_startyear3, $first_gruadeyear3,
    $othernName, $Educational_qualification4, $depart4, $Apoint4, $first_startyear4, $first_gruadeyear4
);
// Execute the query using the parameters
$objQueryeducation = sqlsrv_query($objCon, $sql1, $params);
if ($objQueryeducation === false) {
    die(print_r(sqlsrv_errors(), true));
} 



$sql12 = "INSERT INTO hr_application_linguistic_ability ([id_card_no]
,[Ewrite]
,[Ereading]
,[Espeak]
,[language]
,[write]
,[reading]
,[speak]) VALUES ('$idcard', '$writeEng', '$readEng', '$speakEng', '$otherlang', '$writeOther', '$readOther' , '$speakOther' )";
$stmt2 = sqlsrv_query($objCon, $sql12);

if (!$stmt2) {
    die(print_r(sqlsrv_errors(), true));
}

if($objQuery){

    //echo '<script>alert("บันทึกเรียบร้อย");window.location="https://erp-web.en-technology.com/Encrypt.php";</script>';
    }

}
?>