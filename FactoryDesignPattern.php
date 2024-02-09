<?php

//  The Factory pattern is a creational pattern that provides an interface for 
//  creating instances of a class but allows subclasses to alter the type
//   of objects that will be created. 

// Product interface
interface Notifier {
    public function sendNotification(): string;
}

// Concrete Products
class EmailNotifier implements Notifier {
    public function sendNotification(): string {
        return "Sending Email Notification";
    }
}

class SMSNotifier implements Notifier {
    public function sendNotification(): string {
        return "Sending SMS Notification";
    }
}

// Factory interface
interface NotifierFactory {
    public function createNotifier(): Notifier;
}

// Concrete Factories
class EmailNotifierFactory implements NotifierFactory {
    public function createNotifier(): Notifier {
        return new EmailNotifier();
    }
}

class SMSNotifierFactory implements NotifierFactory {
    public function createNotifier(): Notifier {
        return new SMSNotifier();
    }
}

// Client code
function clientCode(NotifierFactory $notifierFactory) {
    $notifier = $notifierFactory->createNotifier();
    echo $notifier->sendNotification() . PHP_EOL;
}

// Client code with EmailNotifier
$emailNotifierFactory = new EmailNotifierFactory();
clientCode($emailNotifierFactory);

// Client code with SMSNotifier
$smsNotifierFactory = new SMSNotifierFactory();
clientCode($smsNotifierFactory);
?>
