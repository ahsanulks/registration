# registration
User registration and send email with generate pdf with codeigniter

# CONFIG

## SET DIRECTORI PENYIMPANAN FILE
```Application/config/constants.php on SAVE_PDF```

## SET DIRECTORI ATTACHMENT FILE
```Application/controller/Loan.php on method loan_action when call sendemail```
```Application/controller/Registration.php on method register_action when call sendemail```

## SET RECAPTCHA GOOGLE
### Set SECREAT KEY
```Application/config/constants.php on SECRET```
### Set SITE KEY
```Application/config/constants.php on SITE_KEY```

## SET ADMIN EMAIL
```Application/config/constants.php on ADMIN_EMAIL```

# CUSTOM LIBRARY

## Sendmail
for send email
### SETTING
```Application/libraries/Sendmail.php```

#### USE
```
$this->load->library(sendmail);
//with attach file
$this->sendmail->send_to($email, $subject, $message, $attach)
//just send email
$this->sendmail->send_to($email, $subject, $message)
```

## Dates
for changes dates format on display and save on database

### USE
```
$this->load->library(dates);
//if you wont change date format from dd-mm-yyyy to yyyy-mm-dd 
$this->change_format($date)
//if you wont change date format from yyyy-mm-dd to dd-mm-yyyy
$this->change_format($date, false)
```
