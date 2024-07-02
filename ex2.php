<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    interface Notification {
        public function send(string $title, string $message);
    }

    class EmailNotification implements Notification {
        private $adminEmail;
        public function __construct(string $adminEmail) {
            $this->adminEmail = $adminEmail;
        }
        public function send(string $title, string $message): void {
            mail($this->adminEmail, $title, $message);
            echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
        }
    }

    class SlackApi {
        private $login;
        private $apiKey;
        public function __construct(string $login, string $apiKey) {
            $this->login = $login;
            $this->apiKey = $apiKey;
        }
        public function logIn() : void {
            // Send authentication request to Slack web service.
            echo "Logged in to a slack account '{$this->login}'.\n";
        }
        public function sendMessage(string $chatId, string $message) : void {
            // Send message post request to Slack web service.
            echo "Posted following message into the '$chatId' chat: '$message
            '.\n";
        }
    }
    
    class SlackNotification implements Notification {
        private $slack;
        private $chatId;
        public function __construct(SlackApi $slack, string $chatId) {
            $this->slack = $slack;
            $this->chatId = $chatId;
        }
        /** * An Adapter is not only capable of adapting interfaces, but it can also
        * convert incoming data to the format required by the Adaptee. */
        public function send(string $title, string $message) : void {
            $slackMessage = "#" . $title ."#" . strip_tags($message);
            $this->slack->logIn();
            $this->slack->sendMessage($this->chatId, $slackMessage);
        }
    }
    ?>
</body>
</html>