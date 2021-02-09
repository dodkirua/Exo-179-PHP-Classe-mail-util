<?php

class Mail {
    private String $subject;
    private String $message;
    private Array $to;
    private Array $from;

    /**
     * Mail constructor.
     * @param String $subject
     * @param String $message
     * @param array $to
     * @param array $from
     */
    public function __construct(string $subject, string $message, array $to, array $from)
    {
        $this->setSubject($subject);
        $this->setMessage($message);
        $this->setTo($to);
        $this->setFrom($from);
    }

    /**
     * return subject
     * @return String
     */
    public function getSubject(): string{
        return $this->subject;
    }

    /**
     * set subject
     * @param String $subject
     */
    public function setSubject(string $subject): void    {
        $this->subject = $subject;
    }

    /**
     * return message
     * @return String
     */
    public function getMessage(): string    {
        return $this->message;
    }

    /**
     * set message
     * @param String $message
     */
    public function setMessage(string $message): void    {
        $this->message = $message;
    }

    /**
     * return recipient
     * @return array
     */
    public function getTo(): array    {
        return $this->to;
    }

    /**
     * set recipient
     * @param array $to
     */
    public function setTo(array $to): void    {
        $this->to = $to;
    }

    /**
     * return sender
     * @return array
     */
    public function getFrom(): array    {
        return $this->from;
    }

    /**
     * set sender
     * @param array $from
     */
    public function setFrom(array $from): void    {
        $this->from = $from;
    }

    /**
     * add recipient
     * @param string $recipient
     */
    public function addTo (string $recipient){
        $this->to[] = $recipient;
    }

    /**
     * add sender
     * @param string $senders
     */
    public function addFrom (string $senders){
        $this->from[] = $senders;
    }

    /**
     * send mail and return result
     * @return bool
     */
    public function send() : bool{
        $from = implode(",",$this->getFrom());
        $to = implode(",",$this->getTo());
        $header = [
            'from' => $from,
            'X-Mailer' => 'PHP/' . phpversion()
        ];
        return mail($to,$this->getSubject(),$this->getMessage(),$header);
    }

}