<?php
include_once '../connectDB/connectDB.php';
$objCon = connectDB();

if ($objCon === false) {
    die(print_r(sqlsrv_errors(), true));
}

function executeQuery($conn, $sql) {
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));  // Output detailed SQL errors
    }
    return $stmt;
}

$queries = [
    'province' => "SELECT * FROM ms_province",
    'amphur' => "SELECT * FROM ms_amphur ORDER BY amphur_name ASC",
    'tambon' => "SELECT * FROM ms_tambon ORDER BY tambon_name ASC",
    'pfix' => "SELECT * FROM ms_pfix WHERE pfix_code IN ('03', '04', '05', '09')",
    'race' => "SELECT * FROM ms_race",
    'nationality' => "SELECT * FROM ms_nationality",
    'religion' => "SELECT * FROM ms_religion",
    'position' => "SELECT * FROM ms_position WHERE position_code NOT IN (001, 002, 003, 004, 005, 006, 007, 008)",
    'degree' => "SELECT * FROM ms_degree",
    'major' => "SELECT * FROM ms_major",
];

// Execute the query for 'pfix'
$pfix = executeQuery($objCon, $queries['pfix']);
$race = executeQuery($objCon, $queries['race']);
$nationality = executeQuery($objCon, $queries['nationality']);
$religion = executeQuery($objCon, $queries['religion']);
$province = executeQuery($objCon, $queries['province']);
$province1 = executeQuery($objCon, $queries['province']);
$amphur = executeQuery($objCon, $queries['amphur']);
$tambon = executeQuery($objCon, $queries['tambon']);
$position = executeQuery($objCon, $queries['position']);
$degree = executeQuery($objCon, $queries['degree']);
$degree1 = executeQuery($objCon, $queries['degree']);
$degree2 = executeQuery($objCon, $queries['degree']);
$degree3 = executeQuery($objCon, $queries['degree']);
$major = executeQuery($objCon, $queries['major']);



// Check if $pfix is a valid resource before using sqlsrv_fetch_array()
if (!$pfix) {
    die("Query execution failed: " . print_r(sqlsrv_errors(), true));
} else if(!$race){
    die("Query execution failed: " . print_r(sqlsrv_errors(), true));
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ใบสมัครงาน บริษัท เอ็นเทคโนโลยี คอนซัลแตนท์ จำกัด</title>
    <link rel="shortcut icon" type="image/x-icon" href="./image/google-forms.png">
    <link href="css/form.css" rel="stylesheet" type="text/css">
    <script src="js/validation.js"></script>
</head>
<body class="zf-backgroundBg">
<div class="zf-templateWidth">
        <form action="action_form.php" name="form" method="POST" onsubmit="javascript:document.charset='UTF-8'; return zf_ValidateAndSubmit();" accept-charset="UTF-8" enctype="multipart/form-data" id="form">
            <div class="zf-templateWrapper">
                <!-- Form Header Starts -->
                <ul class="zf-tempHeadBdr">
                    <li class="zf-tempHeadContBdr">
                        <h2 class="zf-frmTitle"><em>ใบสมัครงาน บริษัท เอ็นเทคโนโลยี คอนซัลแตนท์ จำกัด</em></h2>
                        <p class="zf-frmDesc"></p>
                        <div class="zf-clearBoth"></div>
                    </li>
                </ul>
                <!-- Form Header Ends -->

                <!-- Form Container Starts -->
                <div class="zf-subContWrap zf-topAlign">
                    <ul>
                        <!-- Start Date Section -->
                        <li class="zf-tempFrmWrapper zf-date">
                            <label for="StartDate" class="zf-labelName">วันที่เริ่มงานได้</label>
                            <div class="zf-tempContDiv">
                                <span>
                                    <input type="date" id="StartDate" name="StartDate" checktype="c4" required readonly onclick="this.removeAttribute('readonly')" onblur="this.setAttribute('readonly', true)" />
                                    <label for="StartDate">กรอกเป็นปี ค.ศ.</label>
                                </span>
                                <div class="zf-clearBoth"></div>
                                <p id="Date4_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                            </div>
                            <div class="zf-clearBoth"></div>
                        </li>
                        <!---------Date Ends Here----------> 
<!---------Name Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            
            <!-- Position Input -->
            <span>
                <input type="text" name="position" id="position" style="width: 100%; border: 1px solid #e5e5e5; padding-bottom: 2%;" required>
                <label for="position" for="position">สมัครตำแหน่ง</label>
            </span> 
            
            <!-- Present Salary Input -->
            <span>
                <input type="text" maxlength="255" name="present_salary" fieldtype="7" placeholder="" required>
                <label for="present_salary">เงินเดือนปัจจุบัน</label>
            </span> 
            
            <!-- Required Salary Input -->
            <span>
                <input type="text" maxlength="255" name="required_salary" fieldtype="7" placeholder="" required>
                <label for="required_salary">เงินเดือนที่ต้องการ</label>
            </span>

            <div class="zf-clearBoth"></div>
        </div>

        <!-- Error Message -->
        <p id="Name5_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
        
        <!-- Instruction for New Graduates -->
        <p class="zf-instruction">* นักศึกษาจบใหม่ ถ้าไม่เคยมีเงินเดือนในช่อง "เงินเดือนปัจจุบัน" ใส่ "-"</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Name Ends Here----------> 

<!---------Section Starts Here----------> 
<li class="zf-tempFrmWrapper zf-section">
    <h2>ประวัติส่วนตัว</h2>
    <p></p>
</li>
<!---------Section Ends Here----------> 

<!---------Name Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-fourType">
        <div class="zf-nameWrapper zf-salutationWrapper">

            <!-- Name Title Dropdown -->
            <span>
                <select name="Name_Title" class="form-select" required>
                    <option value="">-- เลือกคำนำหน้า --</option>
                    <?php
                    // Fetching all titles into the select options
                    while ($row = sqlsrv_fetch_array($pfix, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['pfix_code']) . "\">" . htmlspecialchars($row['pfix_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="Name_Title">คำนำหน้า</label>
            </span>

            <!-- First Name Input -->
            <span>
                <input type="text" maxlength="255" name="Name_First" fieldType="7" placeholder="" required>
                <label for="Name_First">ชื่อ</label>
            </span>

            <!-- Last Name Input -->
            <span>
                <input type="text" maxlength="255" name="Name_Last" fieldType="7" placeholder="" required>
                <label for="Name_Last">นามสกุล</label>
            </span>
            <!-- Nickname Input -->
            <span>
                <input type="text" maxlength="255" name="Name_Nickname" fieldType="7" placeholder="">
                <label for="Name_Nickname">ชื่อเล่น</label>
            </span>

            <div class="zf-clearBoth"></div>
        </div>
        <p id="Name_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Name Ends Here----------> 

<!---------Date Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">

            <!-- Birth Date Input -->
            <span>
                <input type="date" id="birth_date" name="birth_date" placeholder="" required readonly onclick="this.removeAttribute('readonly')" onblur="this.setAttribute('readonly', true)"/>
                <label for="birth_date">วัน/เดือน/ปีเกิด</label>
            </span>

            <!-- Age Input -->
            <span>
                <input type="text" maxlength="2" name="age" fieldType="7" placeholder="" required />
                <label for="age">อายุ</label>
            </span>

        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name3_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    <div class="zf-clearBoth"></div>
</li>
<!---------Date Ends Here----------> 


<!---------Name Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-twoType">
        <div class="zf-nameWrapper">
            <!-- Weight Input -->
            <span>
                <input type="text" maxlength="3" name="weight" fieldType="7" placeholder="" required />
                <label for="weight">น้ำหนัก</label>
            </span>

            <!-- Height Input -->
            <span>
                <input type="text" maxlength="3" name="height" fieldType="7" placeholder="" required />
                <label for="height">ส่วนสูง</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name3_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    <div class="zf-clearBoth"></div>
</li>
<!---------Name Ends Here----------> 

<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">

            <!-- Race Select -->
            <span>
                <select name="race" id="race" class="form-select" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " required> 
                    <option value="">-- เลือก --</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($race, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['race_code']) . "\">" . htmlspecialchars($row['race_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="race">เชื้อชาติ</label>
            </span> 

            <!-- Nationality Select -->
            <span>
                <select name="nationality" id="nationality" class="form-select" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " required> 
                    <option value="">-- เลือก --</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($nationality, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['nationality_code']) . "\">" . htmlspecialchars($row['nationality_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="nationality">สัญชาติ</label>
            </span> 

            <!-- Religion Select -->
            <span>
                <select name="religion" id="religion" class="form-select" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " required> 
                    <option value="">-- เลือก --</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($religion, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['religion_code']) . "\">" . htmlspecialchars($row['religion_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="religion">ศาสนา</label>
            </span> 

        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name4_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    <div class="zf-clearBoth"></div>
</li>
<!---------Name Ends Here----------> 

<!---------Name Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">บัตรประจำตัวประชาชน</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">

            <!-- ID Card Input -->
            <span>
                <input type="text" name="idcard" maxlength="13" fieldType="7" placeholder="" required />
                <label for="idcard">บัตรประจำตัวประชาชน</label>
            </span> 

            <!-- Card Issue Date -->
            <span>
                <input type="date"  id="startcard" name="startcard" fieldType="7" placeholder="" required />
                <label for="startcard">วันที่ออกบัตร</label>
            </span> 

            <!-- Card Expiry Date -->
            <span>
                <input type="date" id="expcard" name="expcard" fieldType="7" placeholder="" required />
                <label for="expcard">วันที่บัตรหมดอายุ</label>
            </span> 

        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name10_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    <div class="zf-clearBoth"></div>
</li>
<!---------Name Ends Here----------> 

<!---------Address Starts Here---------->  
<li class="zf-tempFrmWrapper zf-address zf-addrlarge">
    <label class="zf-labelName">ที่อยู่ปัจจุบัน <em class="zf-important">*</em></label>
    <div class="zf-tempContDiv zf-address">
        <div class="zf-addrCont">

            <!-- Address Line -->
            <span class="zf-addOne">
                <input type="text" maxlength="255" name="Address1_AddressLine1" checktype="c1" placeholder="" required />
                <label for="Address1_AddressLine1">ที่อยู่</label>
            </span>

            <!-- Province Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="province" name="province" style="width: 100%; border: 1px solid #e5e5e5;" onchange="fetchAmphur()">
                    <option value="">-- เลือกจังหวัด --</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($province, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['province_code']) . "\">" . htmlspecialchars($row['province_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="province">จังหวัด</label>
            </span>

            <!-- Amphur Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="amphur" name="amphur" style="width: 100%; border: 1px solid #e5e5e5;" onchange="fetchTambon()">
                    <option value="">-- เลือกอำเภอ --</option>
                </select> 
                <label for="amphur">อำเภอ/เขต</label>
            </span>

            <!-- Tambon Selection -->
            <span class="zf-flLeft zf-addtwo"> 
                <select id="tambon" name="tambon" style="width: 100%; border: 1px solid #e5e5e5;">
                    <option value="">-- เลือกตำบล --</option>
                </select> 
                <label for="tambon">ตำบล/แขวง</label>
            </span>

            <!-- Zip Code -->
            <span class="zf-flLeft zf-addtwo"> 
                <input type="text" maxlength="255" name="Address1_ZipCode" checktype="c1" placeholder="" required />
                <label for="Address1_ZipCode">รหัสไปรษณีย์</label>
            </span>

            <div class="zf-clearBoth"></div>
            <p id="Address1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
        </div>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Address Ends Here----------> 


<li class="zf-tempFrmWrapper zf-address zf-addrlarge">
    <input type="checkbox" name="Same" onchange="toggleAddress()" value="Y">
    <span style="
        color: blueviolet;
        font-size: medium;
        margin-left: 10px;
    ">ที่อยู่เดียวกับที่อยู่ปัจจุบัน</span>
</li>

<!---------Address Starts Here---------->  
<li class="zf-tempFrmWrapper zf-address zf-addrlarge aa">
    <label class="zf-labelName">ที่อยู่ตามทะเบียนบ้าน</label>
    <div class="zf-tempContDiv zf-address">
        <div class="zf-addrCont">
            
            <!-- Address Line -->
            <span class="zf-addOne">
                <input type="text" maxlength="255" name="Address_AddressLine1" checktype="c1" placeholder="" />
                <label for="Address_AddressLine1">ที่อยู่</label>
            </span>

            <!-- Province Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select name="province1" id="province1" style="width: 100%; border: 1px solid #e5e5e5;" onchange="fetchAmphur1()">
                    <option value="">-- เลือกจังหวัด --</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($province1, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['province_code']) . "\">" . htmlspecialchars($row['province_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="province1">จังหวัด</label>
            </span>

            <!-- Amphur Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="amphur1" name="amphur1" style="width: 100%; border: 1px solid #e5e5e5;" onchange="fetchTambon1()">
                    <option value="">-- เลือกอำเภอ --</option>
                </select> 
                <label for="amphur1">อำเภอ/เขต</label>
            </span>

            <!-- Tambon Selection -->
            <span class="zf-flLeft zf-addtwo"> 
                <select id="tambon1" name="tambon1" style="width: 100%; border: 1px solid #e5e5e5;">
                    <option value="">-- เลือกตำบล --</option>
                </select> 
                <label for="tambon1">ตำบล/แขวง</label>
            </span>

            <!-- Zip Code -->
            <span class="zf-flLeft zf-addtwo"> 
                <input type="text" maxlength="255" name="Address_ZipCode" checktype="c1" placeholder="" />
                <label for="Address_ZipCode">รหัสไปรษณีย์</label>
            </span>

            <div class="zf-clearBoth"></div>
            <p id="Address_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
        </div>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Address Ends Here----------> 


<!---------Phone Starts Here----------> 
<li class="zf-tempFrmWrapper zf-address zf-addrlarge">
    <div class="zf-tempContDiv zf-address">
        <div class="zf-addrCont">
            <!-- Phone Input -->
            <span class="zf-flLeft zf-addtwo"> 
                <input type="text" maxlength="255" name="Tel" checktype="c1" placeholder="" required />
                <label for="Tel">เบอร์โทรศัพท์</label>
            </span>

            <!-- Email Input -->
            <span class="zf-flLeft zf-addtwo"> 
                <input type="text" maxlength="255" name="Email" checktype="c1" placeholder="" />
                <label for="Email">E-mail</label>
            </span>
            <div class="zf-clearBoth"></div>
        </div>
        <p id="PhoneNumber_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Phone Ends Here----------> 

<!---------Military Status Starts Here----------> 
<li class="zf-tempFrmWrapper zf-address zf-addrlarge">
    <div class="zf-tempContDiv zf-address">
        <div class="zf-addrCont">
            <!-- Military Status Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="mySelect" name="soldier" onchange="showInput()" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="00">-Select-</option>
                    <option value="เกณฑ์แล้ว">เกณฑ์แล้ว</option>
                    <option value="ยังไม่ได้เกณฑ์">ยังไม่ได้เกณฑ์</option>
                    <option value="ได้รับการยกเว้น">ได้รับการยกเว้น</option>
                </select>
                <div id="inputContainer"></div>
                <label for="mySelect">สถานภาพทางการทหาร</label>
            </span>

            <!-- Family Status Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="mySelect1" name="status" onchange="showInput1()" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " required>
                    <option value="">-Select-</option>
                    <option value="โสด">โสด</option>
                    <option value="สมรส">สมรส</option>
                    <option value="แยกกันอยู่">แยกกันอยู่</option>
                    <option value="หย่าร้าง">หย่าร้าง</option>
                    <option value="อื่นๆ">อื่นๆ โปรดระบุ</option>
                </select>
                <div id="inputContainer1"></div>
                <label for="mySelect1">สถานภาพทางครอบครัว</label>
            </span>
        </div>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Military Status Ends Here----------> 

<!---------Children Information Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">จำนวนบุตร</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <!-- Total Number of Children -->
            <span>
                <input type="text" maxlength="2" name="child_number" placeholder="" required />
                <label for="child_number">จำนวนบุตร</label>
            </span> 

            <!-- Number of Boys -->
            <span>
                <input type="text" maxlength="1" name="child_boy" placeholder="" required />
                <label for="child_boy">ชาย</label>
            </span> 

            <!-- Number of Girls -->
            <span>
                <input type="text" maxlength="1" name="child_girl" placeholder="" required />
                <label for="child_girl">หญิง</label>
            </span> 

            <div class="zf-clearBoth"></div>
        </div>
        <p id="Name11_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Children Information Ends Here----------> 

<!---------Medical History Starts Here---------->    
<li class="zf-tempFrmWrapper zf-address zf-addrlarge">
    <label class="zf-labelName">ประวัติโรค</label>
    <div class="zf-tempContDiv zf-address">
        <div class="zf-addrCont">
            <!-- Chronic Disease Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="mySelect2" name="Chronic_Disease" onchange="showInput2()" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " required>
                    <option value="">-Select-</option>
                    <option value="มี">มี</option>
                    <option value="ไม่มี">ไม่มี</option>
                </select>
                <div id="inputContainer2"></div>
                <label for="mySelect2">โรคประจำตัว</label>
            </span>

            <!-- Contagious Disease Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="mySelect3" name="contagious_disease" onchange="showInput3()" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " required>
                    <option value="">-Select-</option>
                    <option value="เคย">เคย</option>
                    <option value="ไม่เคย">ไม่เคย</option>
                </select>
                <div id="inputContainer3"></div>
                <label for="mySelect3">โรคติดต่อ</label>
            </span>
        </div>
    </div>
    <div class="zf-clearBoth"></div>
    <p class="zf-instruction">หมายเหตุ ถ้ามีโปรดระบุโรคประจำตัวหรือโรคติดต่อ ตั้งแต่เมื่อใด และมีการติดตามอาการอยู่หรือไม่อย่างไร</p>
</li>
<!---------Medical History Ends Here---------->  

<!---------Criminal History Starts Here---------->    
<li class="zf-radio zf-tempFrmWrapper zf-twoColumns">
    <label class="zf-labelName">ประวัติอาชญากรรม</label>
    <div class="zf-tempContDiv zf-address">
        <div class="zf-addrCont">
            <!-- Criminal History Selection -->
            <span class="zf-flLeft zf-addtwo">
                <select id="mySelect4" name="criminal" onchange="showInput4()" style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " required>
                    <option value="">-Select-</option>
                    <option value="เคย">เคย</option>
                    <option value="ไม่เคย">ไม่เคย</option>
                </select>
                <div id="inputContainer4"></div>
            </span>
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Radio4_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
        <p class="zf-instruction">หมายเหตุ ถ้าเคยมีประวัติอาชญากรรมโปรดระบุสาเหตุ วันเริ่มต้นคดี และสิ้นสุดคดีความเมื่อใด</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Criminal History Ends Here---------->    

<!---------Father's Information Starts Here---------->    
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">บิดา</label>
    <span>
        <input type="text" maxlength="255" name="dad_name" fieldtype="2" placeholder="ชื่อ-นามสกุล" style="
            margin-bottom: 2%;
            width: 44%;
            "  />
    </span>

    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper zf-salutationWrapper">
            <!-- Father's Age -->
            <span class="zf-salutation">
                <input type="text" maxlength="255" name="dad_age" fieldtype="7" placeholder=""  />
                <label for="dad_age">อายุ</label>
            </span>

            <!-- Father's Job -->
            <span>
                <input type="text" maxlength="255" name="dad_job" fieldtype="7" placeholder=""  />
                <label for="dad_job">อาชีพ</label>
            </span> 

            <!-- Father's Workplace -->
            <span>
                <input type="text" maxlength="255" name="dad_workplace" fieldtype="7" placeholder=""  />
                <label for="dad_workplace">สถานที่ทำงาน</label>
            </span> 

            <!-- Father's Phone Number -->
            <span>
                <input type="text" maxlength="255" name="dad_tel" fieldtype="7" placeholder=""  />
                <label for="dad_tel">เบอร์โทรศัพท์</label>
            </span> 
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name12_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Father's Information Ends Here----------> 

<!---------Mother's Information Starts Here---------->    
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">มารดา</label>
    <span>
        <input type="text" maxlength="255" name="mom_name" fieldtype="2" placeholder="ชื่อ-นามสกุล" style="
            margin-bottom: 2%;
            width: 44%;
            "  />
    </span>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper zf-salutationWrapper">
            <!-- Mother's Age -->
            <span class="zf-salutation">
                <input type="text" maxlength="255" name="mom_age" fieldtype="7" placeholder=""  />
                <label for="mom_age">อายุ</label>
            </span>

            <!-- Mother's Job -->
            <span>
                <input type="text" maxlength="255" name="mom_job" fieldtype="7" placeholder=""  />
                <label for="mom_job">อาชีพ</label>
            </span> 

            <!-- Mother's Workplace -->
            <span>
                <input type="text" maxlength="255" name="mom_workplace" fieldtype="7" placeholder=""  />
                <label for="mom_workplace">สถานที่ทำงาน</label>
            </span> 

            <!-- Mother's Phone Number -->
            <span>
                <input type="text" maxlength="255" name="mom_tel" fieldtype="7" placeholder=""  />
                <label for="mom_tel">เบอร์โทรศัพท์</label>
            </span> 
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name12_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Mother's Information Ends Here----------> 

<!---------Parental Status Starts Here---------->    
<li class="zf-radio zf-tempFrmWrapper zf-twoColumns">
    <label class="zf-labelName">สถานภาพบิดา-มารดา
        <em class="zf-important">*</em>
    </label>
    <div class="zf-tempContDiv">
        <div class="zf-overflow">
            <!-- Living Situation Radio Buttons -->
            <span class="zf-multiAttType"> 
                <input class="zf-radioBtnType" type="radio" id="Radio5_1" name="statusmd" checktype="c1" value="อยู่ร่วมกัน" required>
                <label for="Radio5_1" class="zf-radioChoice">อยู่ร่วมกัน</label>
            </span>
            <span class="zf-multiAttType"> 
                <input class="zf-radioBtnType" type="radio" id="Radio5_2" name="statusmd" checktype="c1" value="แยกกันอยู่">
                <label for="Radio5_2" class="zf-radioChoice">แยกกันอยู่</label>
            </span>
            <span class="zf-multiAttType"> 
                <input class="zf-radioBtnType" type="radio" id="Radio5_3" name="statusmd" checktype="c1" value="หย่าร้าง">
                <label for="Radio5_3" class="zf-radioChoice">หย่าร้าง</label>
            </span>
            <span class="zf-multiAttType"> 
                <input class="zf-radioBtnType" id="Radio5_others" type="radio" value="อื่นๆ" name="statusmd">
                <label for="Radio5_others" class="zf-radioChoice">อื่นๆ</label> 
                <input name="StatusOthers" type="text" maxlength="150" placeholder="โปรดระบุ">
            </span>
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Radio5_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
        <p class="zf-instruction">อื่นๆ โปรดระบุ</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Parental Status Ends Here---------->   

<!---------Spouse Information Starts Here---------->    
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">คู่สมรส</label>
    <span>
        <input type="text" maxlength="255" name="marry_name" fieldtype="2" placeholder="ชื่อ-นามสกุล" style="
            margin-bottom: 2%;
            width: 44%;
            "  />
    </span>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper zf-salutationWrapper">
            <!-- Spouse Age -->
            <span class="zf-salutation">
                <input type="text" maxlength="255" name="marry_age" fieldType=7 placeholder=""  />
                <label for="marry_age">อายุ</label>
            </span>

            <!-- Spouse Job -->
            <span>
                <input type="text" maxlength="255" name="marry_job" fieldType=7 placeholder=""  />
                <label for="marry_job">อาชีพ</label>
            </span> 

            <!-- Spouse Workplace -->
            <span>
                <input type="text" maxlength="255" name="marry_workplace" fieldType=7 placeholder=""  />
                <label for="marry_workplace">สถานที่ทำงาน</label>
            </span> 

            <!-- Spouse Phone Number -->
            <span>
                <input type="text" maxlength="255" name="marry_tel" fieldType=7 placeholder=""  />
                <label for="marry_tel">เบอร์โทรศัพท์</label>
            </span> 
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name12_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Spouse Information Ends Here----------> 
 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">มีพี่น้องทั้งหมดกี่คน</label>
    <div class="zf-tempContDiv zf-threeType">
    <div class="zf-nameWrapper">
            <span>
                <input type="text" maxlength="10" name="sum_sibling" placeholder="จำนวนพี่น้อง" required />
                <label for="sum_sibling">มีพี่น้องทั้งหมดกี่คน</label>
            </span>
            <span>
                <input type="text" maxlength="10" name="which_you" placeholder="" required />
                <label for="which_you">คุณเป็นคนที่เท่าไหร่</label>
            </span>
            <span>
                <input type="text" maxlength="10" name="brother" placeholder="จำนวนพี่ชาย"  />
                <label for="brother">ชายกี่คน</label>
            </span>
            <div class="zf-clearBoth"></div>
            </div>
            <div class="zf-nameWrapper">
            <span>
                <input type="text" maxlength="10" name="sister" placeholder="จำนวนพี่สาว"  />
                <label for="sister">หญิงกี่คน</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name12_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>

<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName" style="font-size: 150%; color: darkslategray;">ระดับการศึกษา</label>
    <label class="zf-labelName">มัธยมศึกษา</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span>
                <input type="text" id="schoolName" name="schoolName" placeholder="ชื่อสถาบัน" required /> 
                <label for="schoolName">ชื่อสถาบัน</label>
            </span> 

            <span>
                <select name="Educational_qualification" id="Educational_qualification" 
                style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                "required>
                    <option value="">-Select-</option>
                    <?php while ($row = sqlsrv_fetch_array($degree, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['degree_name']) . "\">" . htmlspecialchars($row['degree_name']) . "</option>";
                    } ?>
                </select>
                <label for="Educational_qualification">วุฒิการศึกษา</label>
            </span> 

            <span>
                <input type="text" name="depart" id="depart" placeholder="สาขาวิชา" disabled /> 
                <label for="depart">สาขาวิชา</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <div class="zf-nameWrapper">
            <span>
                <input type="text" name="Apoint" placeholder="คะแนนเฉลี่ย" required /> 
                <label for="Apoint">คะแนนเฉลี่ย</label>
            </span> 

            <span>
                <select name="first_startyear" id="startYearDropdown"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                "required>
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="startYearDropdown">ปีที่เข้าศึกษา</label>
            </span> 

            <span>
                <select name="first_gruadeyear" id="gradeYearDropdown"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                "required>
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="gradeYearDropdown">ปีที่สำเร็จ</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Name11_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>


<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">อาชีวศึกษา</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span>
                <input type="text" id="vocationName" name="vocationName" placeholder="ชื่อสถาบัน"  /> 
                <label for="vocationName">ชื่อสถาบัน</label>
            </span> 

            <span>
                <select name="Educational_qualification2" id="Educational_qualification2"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($degree1, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['degree_name']) . "\">" . htmlspecialchars($row['degree_name']) . "</option>";
                    }
                    ?>
                </select> 
                <label for="Educational_qualification2">วุฒิการศึกษา</label>
            </span> 

            <span>
                <input type="text" id="depart2" name="depart2" placeholder="สาขาวิชา" style="width: 100%;"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                "/> 
                <label for="depart2">สาขาวิชา</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <div class="zf-nameWrapper">
            <span>
                <input type="text" id="Apoint2" name="Apoint2" placeholder="คะแนนเฉลี่ย"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                " /> 
                <label for="Apoint2">คะแนนเฉลี่ย</label>
            </span> 

            <span>
                <select name="first_startyear2" id="startYearDropdown2"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="startYearDropdown2">ปีที่เข้าศึกษา</label>
            </span> 

            <span>
                <select name="first_gruadeyear2" id="gradeYearDropdown2"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="gradeYearDropdown2">ปีที่สำเร็จ</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Name11_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>

<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">มหาวิทยาลัย</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span>
                <input type="text" id="UName" name="UName" placeholder="ชื่อสถาบัน"  /> 
                <label for="UName">ชื่อสถาบัน</label>
            </span> 

            <span>
                <select name="Educational_qualification3" id="Educational_qualification3"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($degree2, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['degree_name']) . "\">" . htmlspecialchars($row['degree_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="Educational_qualification3">วุฒิการศึกษา</label>
            </span> 
            <span>
                <select name="depart3" id="depart3"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($major, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['major_name']) . "\">" . htmlspecialchars($row['major_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="depart3">สาขาวิชา</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <div class="zf-nameWrapper">
            <span>
                <input type="text" id="Apoint3" name="Apoint3" placeholder="คะแนนเฉลี่ย"  /> 
                <label for="Apoint3">คะแนนเฉลี่ย</label>
            </span> 

            <span>
                <select name="first_startyear3" id="startYearDropdown3"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="startYearDropdown3">ปีที่เข้าศึกษา</label>
            </span> 

            <span>
                <select name="first_gruadeyear3" id="gradeYearDropdown3"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="gradeYearDropdown3">ปีที่สำเร็จ</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Name11_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>


<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">อื่นๆ</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span>
                <input type="text" id="otherName" name="otherName" placeholder="ชื่อสถาบัน"  /> 
                <label for="otherName">ชื่อสถาบัน</label>
            </span> 

            <span>
                <select name="Educational_qualification4" id="Educational_qualification4"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <?php
                    while ($row = sqlsrv_fetch_array($degree3, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['degree_name']) . "\">" . htmlspecialchars($row['degree_name']) . "</option>";
                    }
                    ?>
                </select>
                <label for="Educational_qualification4">วุฒิการศึกษา</label>
            </span> 

            <span>
                <input type="text" id="depart4" name="depart4" placeholder="สาขาวิชา"  style="width: 100%;" /> 
                <label for="depart4">สาขาวิชา</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <div class="zf-nameWrapper">
            <span>
                <input type="text" id="Apoint4" name="Apoint4" placeholder="คะแนนเฉลี่ย" /> 
                <label for="Apoint4">คะแนนเฉลี่ย</label>
            </span> 

            <span>
                <select name="first_startyear4" id="startYearDropdown4"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                ">
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="startYearDropdown4">ปีที่เข้าศึกษา</label>
            </span> 

            <span>
                <select name="first_gruadeyear4" id="gradeYearDropdown4"  style="
                    width: 100%;
                    border: 1px solid #e5e5e5;
                    padding-bottom: 2%;
                "   >
                    <option value="">-Select-</option>
                    <!-- Populate with years -->
                </select>
                <label for="gradeYearDropdown4">ปีที่สำเร็จ</label>
            </span> 
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Name11_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>


<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName" style="font-size: 150%; color: darkslategray;">ความสามารถทางภาษา</label>
    <label class="zf-labelName">ภาษาอังกฤษ</label>
    <div class="zf-tempContDiv zf-matrixTable">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice5">
            <thead>
                <tr>
                    <th></th>
                    <th>ดีมาก</th>
                    <th>ดี</th>
                    <th>พอใช้</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>การเขียน</th>
                    <td><input type="radio" name="writeEng" value="ดีเยี่ยม" required></td>
                    <td><input type="radio" name="writeEng" value="ดี"></td>
                    <td><input type="radio" name="writeEng" value="พอใช้"></td>
                </tr>
                <tr>
                    <th>การอ่าน</th>
                    <td><input type="radio" name="readEng" value="ดีเยี่ยม" required></td>
                    <td><input type="radio" name="readEng" value="ดี"></td>
                    <td><input type="radio" name="readEng" value="พอใช้"></td>
                </tr>
                <tr>
                    <th>การพูด</th>
                    <td><input type="radio" name="speakEng" value="ดีเยี่ยม" required></td>
                    <td><input type="radio" name="speakEng" value="ดี"></td>
                    <td><input type="radio" name="speakEng" value="พอใช้"></td>
                </tr>
            </tbody>
        </table>
        <p id="MatrixChoice5_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
</li>


<li class="zf-tempFrmWrapper zf-name zf-namelarge">
<label class="zf-labelName">ภาษาอื่นๆ</label><input type="text" name="otherlang" style="width: 30%;" value="" placeholder="อื่นๆ">
<div class="zf-tempContDiv zf-matrixTable"><table width="100%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice5"><thead> <tr><th></th> 
<th>ดีมาก</th>
<th>ดี</th>
<th>พอใช้</th>
</tr></thead> 
<tbody>
<tr><th>การเขียน</th>
<td><input type="radio" name="writeOther" checktype="c1" value="ดีเยี่ยม" ></td> 
<td><input type="radio" name="writeOther" checktype="c1" value="ดี" ></td> 
<td><input type="radio" name="writeOther" checktype="c1" value="พอใช้" ></td> 
</tr>
<tr><th>การอ่าน</th>
<td><input type="radio" name="readOther" checktype="c1" value="ดีเยี่ยม" ></td> 
<td><input type="radio" name="readOther" checktype="c1" value="ดี" ></td> 
<td><input type="radio" name="readOther" checktype="c1" value="พอใช้" ></td> 
</tr>
<tr><th>การพูด</th>
<td><input type="radio" name="speakOther" checktype="c1" value="ดีเยี่ยม" ></td> 
<td><input type="radio" name="speakOther" checktype="c1" value="ดี" ></td> 
<td><input type="radio" name="speakOther" checktype="c1" value="พอใช้" ></td> 
</tr>
</tbody>
</table>
<p id="MatrixChoice5_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</div>
</li>

<!---------Matrix Choice Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName" style="font-size: 150%; color: darkslategray;">ความสามารถในการขับขี่ยานพาหนะ</label>
    <div class="zf-tempContDiv zf-matrixTable">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice5">
            <thead>
                <tr>
                    <th></th> 
                    <th>ได้</th>
                    <th>ไม่ได้</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>ขับรถยนต์</th>
                    <td><input type="radio" name="candrive" value="ได้" required></td> 
                    <td><input type="radio" name="candrive" value="ไม่ได้" required></td> 
                </tr>
                <tr>
                    <th>ขี่รถจักรยานยนต์</th>
                    <td><input type="radio" name="canride" value="ได้" required></td> 
                    <td><input type="radio" name="canride" value="ไม่ได้" required></td> 
                </tr>
            </tbody>
        </table>
        <p id="MatrixChoice5_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Matrix Choice Ends Here---------->

<!---------Matrix Choice Starts Here----------> 
<li class="zf-tempFrmWrapper">
    <label class="zf-labelName">ใบอนุญาตขับขี่</label>
    <div class="zf-tempContDiv zf-matrixTable">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice6">
            <thead>
                <tr>
                    <th></th> 
                    <th>มี</th>
                    <th>ไม่มี</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="width: 55%;">
                        รถยนต์
                        <input type="text" style="margin-left: 13%; width: 50%;" name="licenseCar_no" value="">
                    </th>
                    <td><input type="radio" name="have_licensed" value="มี" required></td> 
                    <td><input type="radio" name="have_licensed" value="ไม่มี" required></td> 
                </tr>
                <tr>
                    <th>
                        จักรยานยนต์ 
                        <input type="text" style="margin-left: 5%; width: 50%;" name="licensemotor_no" value="">
                    </th>
                    <td><input type="radio" name="have_licensed_motor" value="มี" required></td> 
                    <td><input type="radio" name="have_licensed_motor" value="ไม่มี" required></td> 
                </tr>
            </tbody>
        </table>
        <p id="MatrixChoice6_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Matrix Choice Ends Here----------> 

<!---------Matrix Choice Starts Here----------> 
<li class="zf-tempFrmWrapper">
    <label class="zf-labelName">ท่านมียานพาหนะหรือไม่</label>
    <div class="zf-tempContDiv zf-matrixTable">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice4">
            <thead>
                <tr>
                    <th></th> 
                    <th>มี</th>
                    <th>ไม่มี</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>รถยนต์</th>
                    <td><input type="radio" name="have_car" value="มี" required></td> 
                    <td><input type="radio" name="have_car" value="ไม่มี" required></td> 
                </tr>
                <tr>
                    <th>รถจักรยานยนต์</th>
                    <td><input type="radio" name="have_motor" value="มี" required></td> 
                    <td><input type="radio" name="have_motor" value="ไม่มี" required></td> 
                </tr>
            </tbody>
        </table>
        <p id="MatrixChoice4_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Matrix Choice Ends Here---------->

<!---------Radio Starts Here---------->    
<li class="zf-tempFrmWrapper zf-twoColumns">
    <label class="zf-labelName">การปฏิบัติงานต่างจังหวัด/ต่างสาขา</label>
    <div class="zf-tempContDiv">
        <div class="zf-overflow">
            <span class="zf-multiAttType"> 
                <input class="zf-radioBtnType" type="radio" id="Radio6_1" name="outside_office" value="ได้" required>
                <label for="Radio6_1" class="zf-radioChoice">ได้</label>
            </span>
            <span class="zf-multiAttType"> 
                <input class="zf-radioBtnType" type="radio" id="Radio6_2" name="outside_office" value="ไม่ได้" required>
                <label for="Radio6_2" class="zf-radioChoice">ไม่ได้</label>
            </span>
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Radio6_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
</li>
<!---------Radio Ends Here----------> 

<!---------Matrix Choice Starts Here----------> 
<li class="zf-tempFrmWrapper">
    <label class="zf-labelName">การใช้อุปกรณ์สำนักงาน</label>
    <div class="zf-tempContDiv zf-matrixTable">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice4">
            <thead>
                <tr>
                    <th></th> 
                    <th>ได้</th>
                    <th>ไม่ได้</th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                    <th>คอมพิวเตอร์</th>
                    <td><input type="radio" name="computer" value="ได้" required></td> 
                    <td><input type="radio" name="computer" value="ไม่ได้" required></td> 
                </tr>
                <tr>
                    <th>เครื่องถ่ายเอกสาร</th>
                    <td><input type="radio" name="printer" value="ได้" required></td> 
                    <td><input type="radio" name="printer" value="ไม่ได้" required></td> 
                </tr>
                <tr>
                    <th><input type="text" name="officeOthers" style="width: 50%;" value="" placeholder="อื่นๆ"></th>
                </tr>
            </tbody>
        </table>
        <p id="MatrixChoice4_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Matrix Choice Ends Here---------->

<!---------Matrix Choice Starts Here----------> 
<li class="zf-tempFrmWrapper">
    <label class="zf-labelName">โปรแกรมคอมพิวเตอร์</label>
    <div class="zf-tempContDiv zf-matrixTable">
        <table width="75%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice4">
            <thead>
                <tr>
                    <th></th> 
                    <th>Word</th>
                    <th>Excel</th>
                    <th>PowerPoint</th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                    <th>Microsoft Office</th>
                    <td><input type="checkbox" name="Word" value="ได้"></td> 
                    <td><input type="checkbox" name="Excel" value="ได้"></td> 
                    <td><input type="checkbox" name="PowerPoint" value="ได้"></td> 
                </tr>
                <tr>
                    <th><input type="text" name="Adobe" value="" placeholder="Adobe"></th>
                </tr>
                <tr>
                    <th><input type="text" name="Otherprogram" value="" placeholder="อื่นๆ"></th>
                </tr>
            </tbody>
        </table>
        <p id="MatrixChoice4_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
        <p class="zf-instruction">หมายเหตุ กรุณาระบุโปรแกรมที่ท่านสามารถลงในช่อง</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Matrix Choice Ends Here----------> 


<!---------Matrix Choice Starts Here----------> 
<li class="zf-tempFrmWrapper">
    <label class="zf-labelName">ความสามารถพิเศษ และงานอดิเรก</label>
    <div class="zf-tempContDiv zf-matrixTable">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" name="MatrixChoice4">
            <thead>
                <tr><th></th></tr>
            </thead> 
            <tbody>
                <tr>
                    <th>ความสามารถพิเศษ</th>
                    <td><input type="text" name="specialist" value="" placeholder="ระบุความสามารถพิเศษ"></td> 
                </tr>
                <tr>
                    <th>งานอดิเรก</th>
                    <td><input type="text" name="hobby" value="" placeholder="ระบุงานอดิเรก"></td> 
                </tr>
            </tbody>
        </table>
        <p id="MatrixChoice4_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
        <p class="zf-instruction">หมายเหตุ กรุณาระบุความสามารถ และงานอดิเรกลงในช่อง</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Matrix Choice Ends Here---------->

<!---------Section Starts Here----------> 
<li class="zf-tempFrmWrapper zf-section">
    <h2>ประวัติการทำงาน (เริ่มจากที่ทำงานล่าสุดจนถึงอดีต)</h2>
    <p></p>
</li>
<!---------Section Ends Here----------> 

<!---------Name Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName"> 
        1. 
    </label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span> 
                <input type="text" maxlength="255" name="workplace1" placeholder="ชื่อสถานที่ทำงาน" required /> 
                <label>ชื่อสถานที่ทำงาน</label>
            </span>
            <span> 
                <input type="text" maxlength="255" name="tel_office1" placeholder="เบอร์โทรศัพท์" required /> 
                <label>เบอร์โทรศัพท์</label>
            </span> 
            <span> 
                <input type="text" maxlength="255" name="position1" placeholder="ตำแหน่ง" required /> 
                <label>ตำแหน่ง</label>
            </span>
            <div class="zf-clearBoth"></div>
        </div>
        <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
    </div>
    <div class="zf-clearBoth"></div>
</li>
<!---------Name Ends Here----------> 

<!---------Employment Dates Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-twoType">
        <div class="zf-nameWrapper">
            <span> 
                <input type="date" name="Date1" checktype="c4" value="" maxlength="25" placeholder=""/>
                <label>วันที่เริ่มงาน</label>
            </span>
            <span> 
                <input type="date" name="Date2" checktype="c4" value="" maxlength="25" placeholder=""/>
                <label>วันสุดท้ายที่ทำงาน</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Employment Dates Ends Here----------> 

<!---------Employment Details Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span> 
                <input type="text" maxlength="255" name="salary1" placeholder=""/>
                <label>เงินเดือน</label>
            </span>
            <span> 
                <input type="text" maxlength="255" name="reason1" placeholder=""/>
                <label>เหตุผลที่ลาออก</label>
            </span>
            <span> 
                <input type="text" maxlength="255" name="nature1" placeholder=""/>
                <label>ลักษณะงานโดยย่อ</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name2_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Employment Details Ends Here----------> 

<!---------Second Workplace Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">2.</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span> 
                <input type="text" maxlength="255" name="workplace2" placeholder=""/>
                <label>ชื่อสถานที่ทำงาน</label>
            </span>
            <span> 
                <input type="text" maxlength="255" name="tel_office2" placeholder=""/>
                <label>เบอร์โทรศัพท์</label>
            </span>
            <span> 
                <input type="text" maxlength="255" name="position2" placeholder=""/>
                <label>ตำแหน่ง</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name6_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Second Workplace Ends Here----------> 

<!---------Employment Dates Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-twoType">
        <div class="zf-nameWrapper">
            <span> 
                <input type="date" name="Date3" checktype="c4" value="" maxlength="25" placeholder=""/>
                <label>วันที่เริ่มงาน</label>
            </span>
            <span> 
                <input type="date" name="Date4" checktype="c4" value="" maxlength="25" placeholder=""/>
                <label>วันสุดท้ายที่ทำงาน</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Employment Dates Ends Here---------->

<!---------Salary and Resignation Details Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName"></label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span> 
                <input type="text" maxlength="255" name="salary2" placeholder=""/>
                <label>เงินเดือน</label>
            </span>
            <span> 
                <input type="text" maxlength="255" name="reason2" placeholder=""/>
                <label>เหตุผลที่ลาออก</label>
            </span>
            <span> 
                <input type="text" maxlength="255" name="nature2" placeholder=""/>
                <label>ลักษณะงานโดยย่อ</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name7_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Salary and Resignation Details Ends Here----------> 

<!---------Third Workplace Details Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">3.</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span> 
                <input type="text" maxlength="255" id="workplace3" name="workplace3" placeholder=""/>
                <label for="workplace3">ชื่อสถานที่ทำงาน</label>
            </span>
            <span> 
                <input type="text" maxlength="255" id="tel_office3" name="tel_office3" placeholder=""/>
                <label for="tel_office3">เบอร์โทรศัพท์</label>
            </span>
            <span> 
                <input type="text" maxlength="255" id="position3" name="position3" placeholder=""/>
                <label for="position3">ตำแหน่ง</label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name8_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Third Workplace Details Ends Here----------> 
 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-twoType">
        <div class="zf-nameWrapper">
            <span> 
                <label for="Date5">วันที่เริ่มงาน</label>
                <input type="date" id="Date5" name="Date5" checktype="c4" value="" maxlength="25" placeholder=""/>
            </span>
            <span> 
                <label for="Date6">วันสุดท้ายที่ทำงาน</label>
                <input type="date" id="Date6" name="Date6" checktype="c4" value="" maxlength="25" placeholder=""/>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>

<li class="zf-tempFrmWrapper zf-name zf-namelarge">

    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span> 
                <label for="salary3">เงินเดือน</label>
                <input type="text" id="salary3" maxlength="255" name="salary3" fieldType=7 placeholder=""/>
            </span>
            <span> 
                <label for="reason3">เหตุผลที่ลาออก</label>
                <input type="text" id="reason3" maxlength="255" name="reason3" fieldType=7 placeholder=""/>
            </span>
            <span> 
                <label for="nature3">ลักษณะงานโดยย่อ</label>
                <input type="text" id="nature3" maxlength="255" name="nature3" fieldType=7 placeholder=""/>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name9_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>


<!---------Section Starts Here----------> 
<li class="zf-tempFrmWrapper zf-section">
    <h2>บุคคลที่จะสามารถสอบถามเรื่องเกี่ยวกับตัวท่านได้</h2>
    <p></p>
</li>
<!---------Section Ends Here----------> 

<!---------Reference Person Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">1.</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span>
                <label>
                    ชื่อ-นามสกุล
                    <input type="text" maxlength="255" name="name_ref" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    ความสัมพันธ์
                    <input type="text" maxlength="255" name="related_ref" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    สถานที่ทำงาน/ที่อยู่
                    <input type="text" maxlength="255" name="address_ref" placeholder=""/>
                </label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Reference Person Ends Here----------> 

<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-twoType">
        <div class="zf-nameWrapper">
            <span>
                <label>
                    ตำแหน่ง
                    <input type="text" name="post_ref" value="" maxlength="25" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    เบอร์โทรศัพท์
                    <input type="text" name="tel_ref" value="" maxlength="25" placeholder=""/>
                </label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Reference Person Ends Here----------> 

<!---------Reference Person Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName">2.</label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span>
                <label>
                    ชื่อ-นามสกุล
                    <input type="text" maxlength="255" name="name_ref2" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    ความสัมพันธ์
                    <input type="text" maxlength="255" name="related_ref2" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    สถานที่ทำงาน/ที่อยู่
                    <input type="text" maxlength="255" name="address_ref2" placeholder=""/>
                </label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Reference Person Ends Here----------> 

<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-twoType">
        <div class="zf-nameWrapper">
            <span>
                <label>
                    ตำแหน่ง
                    <input type="text" name="post_ref2" value="" maxlength="25" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    เบอร์โทรศัพท์
                    <input type="text" name="tel_ref2" value="" maxlength="25" placeholder=""/>
                </label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Reference Person Ends Here----------> 

<!---------Section Starts Here----------> 
<li class="zf-tempFrmWrapper zf-section">
    <h2>กรณีเร่งด่วนติดต่อ</h2>
    <p></p>
</li>
<!---------Section Ends Here----------> 

<!---------Urgent Contact Starts Here----------> 
<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <label class="zf-labelName"></label>
    <div class="zf-tempContDiv zf-threeType">
        <div class="zf-nameWrapper">
            <span>
                <label>
                    ชื่อ-นามสกุล
                    <input type="text" maxlength="255" name="name_urgent" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    ความสัมพันธ์
                    <input type="text" maxlength="255" name="related_urgent" placeholder=""/>
                </label>
            </span>
            <span>
                <label>
                    สถานที่ทำงาน/ที่อยู่
                    <input type="text" maxlength="255" name="address_urgent" placeholder=""/>
                </label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Urgent Contact Ends Here----------> 

<li class="zf-tempFrmWrapper zf-name zf-namelarge">
    <div class="zf-tempContDiv zf-twoType">
        <div class="zf-nameWrapper">
            <span>
                <label>
                    เบอร์โทรศัพท์
                    <input type="text" name="tel_urgent" value="" maxlength="25" placeholder=""/>
                </label>
            </span>
        </div>
        <div class="zf-clearBoth"></div>
    </div>
    <p id="Name1_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
</li>
<!---------Urgent Contact Ends Here----------> 
</ul>
</div>
<!---------template Container Ends Here----------> 

<ul>
    <li class="zf-fmFooter">
        <button type="submit" class="zf-submitColor" aria-label="Apply changes">Apply</button>
    </li>
</ul>
</div><!-- 'zf-templateWrapper' ends -->
</form>
</div><!-- 'zf-templateWidth' ends -->

<script type="text/javascript">var zf_DateRegex = new RegExp("^(([0][1-9])|([1-2][0-9])|([3][0-1]))[-](Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)[-](?:(?:19|20)[0-9]{2})$");
var zf_MandArray = [ "Name5_First", "Name5_Last", "Name5_Middle", "Dropdown1", "Name_Salutation", "Name_First", "Name_Last", "Name_Middle", "Date", "Name3_First", "Name3_Last", "Name3_Middle", "Address_AddressLine1", "Address_AddressLine2", "Address_City", "Address_Region", "Address_ZipCode", "Address1_AddressLine1", "Address1_AddressLine2", "Address1_City", "Address1_Region", "Address1_ZipCode", "PhoneNumber_countrycode", "Email", "Radio1", "Radio5", "writeEng", "writeother", "readEng", "readother", "speakEng", "speakother"]; 
var zf_FieldArray = [ "Date4", "Name5_First", "Name5_Last", "Name5_Middle", "Dropdown1", "Name_Salutation", "Name_First", "Name_Last", "Name_Middle", "Date", "Name3_First", "Name3_Last", "Name3_Middle", "Name4_First", "Name4_Last", "Name4_Middle", "Name10_First", "Name10_Last", "Name10_Middle", "Date9", "Address_AddressLine1", "Address_AddressLine2", "Address_City", "Address_Region", "Address_ZipCode", "Address1_AddressLine1", "Address1_AddressLine2", "Address1_City", "Address1_Region", "Address1_ZipCode", "PhoneNumber_countrycode", "Email", "Radio", "Radio1", "Name11_First", "Name11_Last", "Name11_Middle", "Radio2", "Radio3", "Radio4", "Radio5", "MatrixChoice5_row1", "MatrixChoice5_row2", "MatrixChoice6_row1", "MatrixChoice6_row2", "MatrixChoice4_row1", "MatrixChoice4_row2", "Radio6", "Name1_First", "Name1_Last", "Name1_Middle", "Date1", "Date2", "Name2_First", "Name2_Last", "Name6_First", "Name6_Last", "Name6_Middle", "Date5", "Date6", "Name7_First", "Name7_Last", "Name8_First", "Name8_Last", "Name8_Middle", "Date7", "Date8", "Name9_First", "Name9_Last"]; 
var isSalesIQIntegrationEnabled = false;
var salesIQFieldsArray = [];</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownIds = [
            'startYearDropdown', 'gradeYearDropdown',
            'startYearDropdown2', 'gradeYearDropdown2',
            'startYearDropdown3', 'gradeYearDropdown3',
            'startYearDropdown4', 'gradeYearDropdown4'
        ];

        var currentYear = new Date().getFullYear();
        var startYear = currentYear - 30; // Start from 30 years ago

        dropdownIds.forEach(function(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            for (var year = startYear; year <= currentYear; year++) {
                var option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                dropdown.appendChild(option);
            }
        });
    });
</script>

<script>
function showInput(selectId, inputContainerId, expectedValue, inputName, placeholder) {
    var selectValue = document.getElementById(selectId).value;
    var inputContainer = document.getElementById(inputContainerId);

    // Clear previous input
    inputContainer.innerHTML = "";

    // Create input element if the selected value matches the expected value
    if (selectValue === expectedValue) {
        var input = document.createElement("input");
        input.type = "text";
        input.name = inputName;
        input.placeholder = placeholder;
        inputContainer.appendChild(input);
    }
}

// Event listener for dropdowns
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("mySelect").addEventListener("change", function() {
        showInput("mySelect", "inputContainer", "ได้รับการยกเว้น", "except", "ยกเว้นเพราะ");
    });
    document.getElementById("mySelect1").addEventListener("change", function() {
        showInput("mySelect1", "inputContainer1", "อื่นๆ", "other1", "");
    });
    document.getElementById("mySelect2").addEventListener("change", function() {
        showInput("mySelect2", "inputContainer2", "มี", "other2", "กรุณาระบุโรค");
    });
    document.getElementById("mySelect3").addEventListener("change", function() {
        showInput("mySelect3", "inputContainer3", "เคย", "other3", "");
    });
    document.getElementById("mySelect4").addEventListener("change", function() {
        showInput("mySelect4", "inputContainer4", "เคย", "other4", "");
    });
});

// Checkbox functionality
var checkbox = document.querySelector('input[name="Same"]');
var addressElement = document.querySelector('.zf-tempFrmWrapper.zf-address.zf-addrlarge.aa');

checkbox.addEventListener('click', function() {
    addressElement.style.display = checkbox.checked ? 'none' : 'block';
});
</script>

<script>
    function fetchAmphur(provinceId, amphurId, tambonId) {
        const provinceCode = document.getElementById(provinceId).value;

        if (provinceCode) {
            fetch('filter_amphur.php?province_code=' + provinceCode)
                .then(response => response.json())
                .then(data => {
                    const amphurSelect = document.getElementById(amphurId);
                    amphurSelect.innerHTML = '<option value="">-- เลือกอำเภอ --</option>';
                    data.forEach(amphur => {
                        const option = document.createElement('option');
                        option.value = amphur.amphur_code;  // Use amphur_code to fetch tambons
                        option.textContent = amphur.amphur_name;
                        amphurSelect.appendChild(option);
                    });
                    document.getElementById(tambonId).innerHTML = '<option value="">-- เลือกตำบล --</option>';  // Clear tambon options
                })
                .catch(error => console.error('Error:', error));
        } else {
            document.getElementById(amphurId).innerHTML = '<option value="">-- เลือกอำเภอ --</option>';
            document.getElementById(tambonId).innerHTML = '<option value="">-- เลือกตำบล --</option>';
        }
    }

    function fetchTambon(amphurId, tambonId) {
        const amphurCode = document.getElementById(amphurId).value;

        if (amphurCode) {
            fetch('filter_tambon.php?amphur_code=' + amphurCode)
                .then(response => response.json())
                .then(data => {
                    const tambonSelect = document.getElementById(tambonId);
                    tambonSelect.innerHTML = '<option value="">-- เลือกตำบล --</option>';
                    data.forEach(tambon => {
                        const option = document.createElement('option');
                        option.value = tambon.tambon_code;
                        option.textContent = tambon.tambon_name;
                        tambonSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        } else {
            document.getElementById(tambonId).innerHTML = '<option value="">-- เลือกตำบล --</option>';
        }
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('province').addEventListener('change', function() {
            fetchAmphur('province', 'amphur', 'tambon');
        });

        document.getElementById('amphur').addEventListener('change', function() {
            fetchTambon('amphur', 'tambon');
        });

        document.getElementById('province1').addEventListener('change', function() {
            fetchAmphur('province1', 'amphur1', 'tambon1');
        });

        document.getElementById('amphur1').addEventListener('change', function() {
            fetchTambon('amphur1', 'tambon1');
        });
    });
</script>

</body>
</html>