<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_teachers.php';
 		
	include 'as_pages.php';
	
 	$as_loginid = isset( $_SESSION['school_loggedin'] ) ? $_SESSION['school_loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['school_account'] ) ? $_SESSION['school_account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$as_loginid ) {
			
			as_signin();
	   exit;
	} 
      
switch ( $action ) {
	case 'login': as_signin();
		break;
	case 'register': register();
		break;
	case 'forgot_password': forgot_password();
		break;
	case 'recover_password': recover_password();
		break;
	case 'forgot_username': forgot_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'class_all':  class_all();
		break;
	case 'class_new': class_new();
		break;
	case 'class_view': class_view();
		break;
	case 'student_all': student_all();
		break;
	case 'search': search();
		break;
	case 'student_new':  student_new();
		break;
	case 'student_view': student_view();
		break;
	case 'student_edit': student_edit();
		break;
	case 'deletestudent': deletestudent();
		break;
	case 'subject_new':  subject_new();
		break;
	case 'subject_all':  subject_all();
		break;
	case 'subject_view': subject_view();
		break;
	case 'subject_edit': subject_edit();
		break;
	case 'deletesubject': deletesubject();
		break;
	case 'marks_all':  marks_all();
		break;
	case 'marks_new':  marks_new();
		break;
	case 'marks_view': marks_view();
		break;
	case 'marks_edit': marks_edit();
		break;
	case 'deletemark': deletemark();
		break;
	case 'teacher_all': teacher_all();
		break;
	case 'teacher_new':  teacher_new();
		break;
	case 'teacher_view': teacher_view();
		break;
	case 'profile':  profile();
		break;
	case 'options':  options();
		break;  
    default:
		dashboard();
}

function as_signin() {

	$results = array();
	$results['pageTitle'] = "Management Information System"; 
	$results['pageAction'] = "Sign In";
	
	if ( isset( $_POST['SignMeIn'] ) ) {
	$loginname = $_POST['username'];
	$loginkey = md5($_POST['password']);
	
		if (as_let_me_teacher($loginname, $loginkey)){
		$_SESSION['school_loggedin'] = as_let_me_teacher($loginname, $loginkey);
		$_SESSION['school_account'] = as_logged_account($loginname);
		header( "Location: index.php" );
		
	}   else {
		
		require( AS_INC."as_signin.php" );
	}

  } else {

	require( AS_INC."as_signin.php" );
 }

}
	
function register() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		as_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		as_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( AS_INC . "as_forgot_username.php" );
	}	
}

  function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		as_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( AS_INC . "as_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		as_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_recover_password.php" );
	}
}

function dashboard() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "as_dashboard.php" );
}

function options() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['school_loggedin'] ) ? $_SESSION['school_loggedin'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		as_set_option('sitename', $_POST['sitename'], $as_loginid);	
		as_set_option('slogan', $_POST['slogan'], $as_loginid);
		as_set_option('description', $_POST['description'], $as_loginid);
		as_set_option('siteurl', $_POST['siteurl'], $as_loginid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( AS_INC . "as_options.php" );
	}	
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Profile"; 
	$as_username = $_SESSION['school_loggedin'];
	
	$as_db_query = "SELECT * FROM as_teacher WHERE teacher_name = '$as_username'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $teacherid, $teacher_name) = $database->get_row( $as_db_query );
		$results['teacher'] = $teacherid;
	} else  {
		return false;
		header( "Location: index.php?action=teacher_all");	
	}
	
	require( AS_INC . "as_viewteacher.php" );
		
}
?>
