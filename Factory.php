<?php

interface Notifier {
  public function sendNotification();
}

class Email implements Notifier {
  public function sendNotification() {
    echo "I will send an email", PHP_EOL;
    return true;
  }
}

class SMS implements Notifier {
  public function sendNotification() {
    echo "I will send an SMS", PHP_EOL;
    return true;
  }
}

class Push implements Notifier {
  public function sendNotification() {
    echo "I will send a push notification", PHP_EOL;
    return true;
  }
}

class NotificationFactory {
  protected $types = [
    'email' => Email::class,
    'sms' => SMS::class,
    'push' => Push::class,
  ];

  public function create(string $type): Notifier {
    if (!isset($this->types[$type])) {
      throw new Exception('Invalid type given!');
    }
    return new $this->types[$type];
  }
}

// Usage
try {
  $factory = new NotificationFactory();

  $email = $factory->create('email');
  $email->sendNotification();

  $sms = $factory->create('sms');
  $sms->sendNotification();

  $push = $factory->create('push');
  $push->sendNotification();

  $unknown = $factory->create('unknown');
  $unknown->sendNotification();
} catch (Exception $e) {
  echo $e->getMessage(), PHP_EOL;
}
