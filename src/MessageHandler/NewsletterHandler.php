<?php

namespace App\MessageHandler;

use App\Message\NewsLetter;
use App\Repository\NewsLetterRepository;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;

class NewsletterHandler implements MessageHandlerInterface
{
    private $newsLetterRepository;
    private $mailer;

    public function __construct(NewsLetterRepository $newsLetterRepository, MailerInterface $mailer)
    {
        $this->newsLetterRepository = $newsLetterRepository;
        $this->mailer               = $mailer;
    }

    /**
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function __invoke(NewsLetter $message)
    {
        // TODO: Implement __invoke() method.
        $emails = $this->newsLetterRepository->findBy(
            ['subscribed' => 1]
        );

        foreach ($emails as $email){
            $email = (new Email())
                ->from('basem.samir211@yahoo.com')
                ->to($email->getEmail())
                ->subject('Hello')
                ->text($message->getContent());
            $this->mailer->send($email);
        }

    }

}