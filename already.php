<?php
    include_once 'connect.php';
    if (isset($_SESSION['username'])) {
        $uid = $_SESSION['username'];
        if(isset($_POST['submit'])) {
            $father_name=$_POST['father_name'];
            $p_add=$_POST['P_address'];
            $l_add=$_POST['L_address'];
            $smob_no=$_POST['smobile'];
            $pmob_no=$_POST['pmobile'];
            $scheme=$_POST['scheme'];
            $semester=$_POST['sem'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];

            
            $sql=mysql_query("SELECT * FROM `student_regist` WHERE ADMISSION_NO='$uid'");
            $result=mysql_fetch_assoc($sql);
            $branch=$result['BRANCH'];

            /*$que=mysql_query("SELECT * FROM `student_personal_detail` WHERE ADMISSION_NO='$uid'");
            $row=mysql_fetch_assoc($que);
            $reg_no=$row['REGISTRATION_NO'];*/
        
            $query=mysql_query("UPDATE `student_personal_detail` SET `DATE_OF_BIRTH`='$dob', `GUARDIAN_NAME`='$father_name', `MOBILE_NO_GUARDIAN`='$pmob_no', `MOBILE_NO_SELF`='$smob_no', `SCHEME`='$scheme', `CURRENT_SEMESTER`='$semester', `GENDER`='$gender',`LOCAL_ADDRESS`='$l_add', `PERMANENT_ADDRESS`='$p_add', `BRANCH`= '$branch' WHERE ADMISSION_NO ='$uid'");
            echo $query;
            header('location:homepage_student.php');
        }
    }
    else {
        header('location:studentlog.php');
        exit();
    }
?>