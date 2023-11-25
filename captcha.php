<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha Verification</title>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Lfy7BcpAAAAACENg5PtPar2WAY_pE1vJaBhkdU1" async defer></script>
</head>
<body>
    <h2>Captcha Verification</h2>
    <?php
    require 'vendor/autoload.php';

    use Google\Cloud\RecaptchaEnterprise\V1\RecaptchaEnterpriseServiceClient;
    use Google\Cloud\RecaptchaEnterprise\V1\Event;
    use Google\Cloud\RecaptchaEnterprise\V1\Assessment;
    use Google\Cloud\RecaptchaEnterprise\V1\TokenProperties\InvalidReason;

    function create_assessment(
        string $recaptchaKey,
        string $token,
        string $project,
        string $action
    ): void {
        $client = new RecaptchaEnterpriseServiceClient();
        $projectName = $client->projectName($project);

        $event = (new Event())
            ->setSiteKey($recaptchaKey)
            ->setToken($token);

        $assessment = (new Assessment())
            ->setEvent($event);

        try {
            $response = $client->createAssessment($projectName, $assessment);

            if ($response->getTokenProperties()->getValid() == false) {
                printf('The CreateAssessment() call failed because the token was invalid for the following reason: ');
                printf(InvalidReason::name($response->getTokenProperties()->getInvalidReason()));
                return;
            }

            if ($response->getTokenProperties()->getAction() == $action) {
                printf('The score for the protection action is: ');
                printf($response->getRiskAnalysis()->getScore());
                
                // Redirect to homepage.php or handle the successful verification as needed
                header("Location: homepage.php");
                exit();
            } else {
                printf('The action attribute in your reCAPTCHA tag does not match the action you are expecting to score');
            }
        } catch (Exception $e) {
            printf('CreateAssessment() call failed with the following error: ');
            printf($e);
        } finally {
            // Close the client to release resources
            $client->close();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recaptchaKey = '6Lfy7BcpAAAAACENg5PtPar2WAY_pE1vJaBhkdU1';
        $token = $_POST['g-recaptcha-response'];
        $project = 'your-google-cloud-project-id'; // Replace with your actual Google Cloud project ID
        $action = 'LOGIN';  // Replace with your actual reCAPTCHA action

        create_assessment($recaptchaKey, $token, $project, $action);
        // If the assessment is successful, the function will redirect to homepage.php
        echo "Captcha verification failed!";
    }
    ?>
    <form id="captchaForm" action="captcha.php" method="post">
        <!-- Add any other form fields you need -->
        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('captchaForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            grecaptcha.enterprise.ready(async () => {
                try {
                    const token = await grecaptcha.enterprise.execute('6Lfy7BcpAAAAACENg5PtPar2WAY_pE1vJaBhkdU1', { action: 'LOGIN' });
                    const form = document.getElementById('captchaForm');

                    // Add the reCAPTCHA token to a hidden field in the form
                    const tokenInput = document.createElement('input');
                    tokenInput.type = 'hidden';
                    tokenInput.name = 'g-recaptcha-response';
                    tokenInput.value = token;
                    form.appendChild(tokenInput);

                    // Submit the form
                    form.submit();
                } catch (error) {
                    console.error('Error executing reCAPTCHA:', error);
                    // Handle error as needed
                }
            });
        });
    </script>
</body>
</html>
