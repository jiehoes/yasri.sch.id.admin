<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';
include_once dirname(__FILE__) . '/' . 'components/mail/mailer.php';
include_once dirname(__FILE__) . '/' . 'components/mail/phpmailer_based_mailer.php';
require_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('Asia/Krasnoyarsk');

function GetGlobalConnectionOptions()
{
    return
        array(
          'server' => 'localhost',
          'port' => '3306',
          'username' => 'u1565842_yasridb',
          'password' => 'P3rtadex$2020',
          'database' => 'u1565842_yasridb',
          'client_encoding' => 'utf8'
        );
}

function HasAdminPage()
{
    return true;
}

function HasHomePage()
{
    return true;
}

function GetHomeURL()
{
    return 'index.php';
}

function GetHomePageBanner()
{
    return '';
}

function GetPageGroups()
{
    $result = array();
    $result[] = array('caption' => 'Akademik', 'description' => '');
    $result[] = array('caption' => 'Administrator', 'description' => '');
    $result[] = array('caption' => 'User', 'description' => '');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Kelas', 'short_caption' => 'Kelas', 'filename' => 'kelas.php', 'name' => 'kelas', 'group_name' => 'Akademik', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Mata Ajaran', 'short_caption' => 'Mata Ajaran', 'filename' => 'ma.php', 'name' => 'ma', 'group_name' => 'Akademik', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Mengajar', 'short_caption' => 'Mengajar', 'filename' => 'mengajar.php', 'name' => 'mengajar', 'group_name' => 'Akademik', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Silabus', 'short_caption' => 'Silabus', 'filename' => 'silabus.php', 'name' => 'silabus', 'group_name' => 'Akademik', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Siswa', 'short_caption' => 'Siswa', 'filename' => 'siswa.php', 'name' => 'siswa', 'group_name' => 'Akademik', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Tahun Ajaran', 'short_caption' => 'Tahun Ajaran', 'filename' => 'ta.php', 'name' => 'ta', 'group_name' => 'Administrator', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Program Keahlian', 'short_caption' => 'Program Keahlian', 'filename' => 'pa.php', 'name' => 'pa', 'group_name' => 'Administrator', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Admin', 'short_caption' => 'Admin Users', 'filename' => 'admin_users.php', 'name' => 'admin_users', 'group_name' => 'User', 'add_separator' => true, 'description' => '');
    $result[] = array('caption' => 'Guru/Staf', 'short_caption' => 'Guru/Staf Users', 'filename' => 'guru_users.php', 'name' => 'guru_users', 'group_name' => 'User', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'Siswa', 'short_caption' => 'Siswa Users', 'filename' => 'siswa_users.php', 'name' => 'siswa_users', 'group_name' => 'User', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'PPDB', 'short_caption' => 'Ppdb Users', 'filename' => 'ppdb_users.php', 'name' => 'ppdb_users', 'group_name' => 'User', 'add_separator' => false, 'description' => '');
    return $result;
}

function GetPagesHeader()
{
    return
        '';
}

function GetPagesFooter()
{
    return
        '';
}

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(true);
    $page->setShowNavigation(true);
    $page->OnGetCustomExportOptions->AddListener('Global_OnGetCustomExportOptions');
    $page->getDataset()->OnGetFieldValue->AddListener('Global_OnGetFieldValue');
    $page->getDataset()->OnGetFieldValue->AddListener('OnGetFieldValue', $page);
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
    $grid->AfterUpdateRecord->AddListener('Global_AfterUpdateHandler');
    $grid->AfterDeleteRecord->AddListener('Global_AfterDeleteHandler');
    $grid->AfterInsertRecord->AddListener('Global_AfterInsertHandler');
}

function GetAnsiEncoding() { return 'windows-1252'; }

function Global_AddEnvironmentVariablesHandler(&$variables)
{

}

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($type, $part, $mode, &$result, &$params, CommonPage $page = null)
{
    if ($part == PagePart::Mail && $mode == PageMode::MailVerificationBody) {
      $result = 'mail/user_verification_body.tpl';
    }
    
    if ($part == PagePart::Mail && $mode == PageMode::MailVerificationSubject) {
      $result = 'mail/user_verification_subject.tpl';
    }
    
    if ($part == PagePart::Mail && $mode == PageMode::MailRecoveringPasswordSubject) {
      $result = 'mail/recovering_password_subject.tpl';
    }
    
    if ($part == PagePart::Mail && $mode == PageMode::MailRecoveringPasswordBody) {
      $result = 'mail/recovering_password_body.tpl';
    }
    
    
    
    
    if ($part == PagePart::LoginPage) {
      $result = 'login/login_page.tpl';
    }
    
    if ($part == PagePart::LoginControl) {
      $result = 'login/login_control.tpl';
    }
    
    
    if ($part == PagePart::RegistrationPage) {
      $result = 'registration/registration_page.tpl';
    }
    
    if ($part == PagePart::RegistrationForm) {
      $result = 'registration/registration_form.tpl';
    }
    
    
    
    if ($part == PagePart::Layout) {
      $result = 'common/layout.tpl';
    }
}

function Global_OnGetCustomExportOptions($page, $exportType, $rowData, &$options)
{

}

function Global_OnGetFieldValue($fieldName, &$value, $tableName)
{

}

function Global_GetCustomPageList(CommonPage $page, PageList $pageList)
{

}

function Global_BeforeInsertHandler($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_BeforeUpdateHandler($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_AfterInsertHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterUpdateHandler($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterDeleteHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetPageListType()
{
    return PageList::TYPE_SIDEBAR;
}

function GetNullLabel()
{
    return null;
}

function UseMinifiedJS()
{
    return true;
}

function GetOfflineMode()
{
    return false;
}

function GetInactivityTimeout()
{
    return 7200;
}

function GetMailer()
{
    $smtpOptions = new SMTPOptions('mail.yasri.sch.id', 465, true, 'sekretariat@yasri.sch.id', 'P3rtadex$2020', 'ssl');
    $mailerOptions = new MailerOptions(MailerType::SMTP, 'sekretariat@yasri.sch.id', '', $smtpOptions);
    
    return PHPMailerBasedMailer::getInstance($mailerOptions);
}

function sendMailMessage($recipients, $messageSubject, $messageBody, $attachments = '', $cc = '', $bcc = '')
{
    GetMailer()->send($recipients, $messageSubject, $messageBody, $attachments, $cc, $bcc);
}

function createConnection()
{
    $connectionOptions = GetGlobalConnectionOptions();
    $connectionOptions['client_encoding'] = 'utf8';

    $connectionFactory = MySqlIConnectionFactory::getInstance();
    return $connectionFactory->CreateConnection($connectionOptions);
}

/**
 * @param string $pageName
 * @return IPermissionSet
 */
function GetCurrentUserPermissionsForPage($pageName) 
{
    return GetApplication()->GetCurrentUserPermissionSet($pageName);
}
