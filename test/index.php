<?php
//Edit Your Domain
$sitedomain = "link.hnawstudio.com";

// DONT TOUCH THE CODE BELOW THIS LINE
// -----------------------------------------------------------------

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}

function getRandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < 16; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$ray = getRandomString();

?>
<!DOCTYPE html>
<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Access denied</title>
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="robots" content="noindex, nofollow">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <link rel="stylesheet" href="https://cdn.hnawstudio.com/errors.css" media="screen">

   <body>
      <div class="main-wrapper" role="main">
         <div class="header section">
            <h1>
               <span class="error-description">Access denied</span>
               <span class="code-label">Error code <span>1020</span></span>
            </h1>
            <div class="large-font">
               <p>You do not have access to <?php echo $sitedomain; ?>.</p><p>The site owner may have set restrictions that prevent you from accessing the site. Contact the site owner for access or try loading the page again.</p>
            </div>
         </div>
      </div>

      <div>
         <div class="clearfix section">
            <div class="column know-more">
               <h2 class="large-font">Additional information</h2>
               <p>The access policies of a site define which visits are allowed. Your current visit is not allowed according to those policies.</p><p>Only the site owner can change site access policies.</p>
            </div>
            <div class="column know-more">
               <h2 class="large-font">I am the site owner</h2>
               <p class="ray-id-wrapper">
                  Ray ID:
                  <span class="plain-ray-id hidden" id="plain-ray-id">
                     <?php echo $ray; ?>
                  </span>
                  <button class="click-to-copy-btn" id="click-to-copy-btn" title="Click to copy Ray ID" type="button">
                     <span class="ray-id"><?php echo $ray; ?></span><span class="copy-label" id="copy-label">Copy</span>
                  </button>
               </p>
               <ol>
                  <li>
                     Search the
                     <a rel="noopener noreferrer" href="<?php echo $sitedomain; ?>" target="_blank">Firewall Events Log</a>
                     <img class="external-link" title="Opens in new tab" src="https://cdn.hnawstudio.com/external.png" alt="External link">
                     for the above Ray ID.
                  </li>
                  <li>Examine and assess the details of the access policy.</li>
               </ol>
               <br>
               <a rel="noopener noreferrer" href="<?php echo $sitedomain; ?>" target="_blank">Troubleshooting guide</a>
               <img class="external-link" title="Opens in new tab" src="https://cdn.hnawstudio.com/external.png" alt="External link">
            </div>
         </div>

         <div class="clearfix footer section" role="contentinfo">
            <div class="column">
               <div class="py-8 text-center" id="error-feedback">
    <div id="error-feedback-survey" class="footer-line-wrapper">
        Was this page helpful?
        <button class="border border-solid bg-white cf-button cursor-pointer ml-4 px-4 py-2 rounded" id="feedback-button-yes" type="button">Yes</button>
        <button class="border border-solid bg-white cf-button cursor-pointer ml-4 px-4 py-2 rounded" id="feedback-button-no" type="button">No</button>
    </div>
    <div class="feedback-success feedback-hidden" id="error-feedback-success">
        Thank you for your feedback!
    </div>
</div>

            </div>
            <div class="column footer-line-wrapper text-center">
               Performance &amp; security by <a rel="noopener noreferrer" href="https://hnawstudio.com/" target="_blank">HnawStudio</a>
               <img class="external-link" title="Opens in new tab" src="https://cdn.hnawstudio.com/external.png" alt="External link">
            </div>
         </div>
      </div>
  </body></html>
  <a href="dash">.</a>