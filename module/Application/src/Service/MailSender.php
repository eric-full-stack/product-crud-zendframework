<?php
namespace Application\Service;
use Zend\Mail;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Mime;
use Zend\Mime\Part as MimePart;
use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\View\Resolver;

/**
 * This service class is used to deliver an E-mail message to recipient.
 */
class MailSender 
{
    /**
     * Sends the mail message.
     {@return boolean}
     */
    public function sendMail($sender, $recipient, $subject, $products) 
    {
        $result = false;
         
        try{

            $renderer = new PhpRenderer();
            $resolver = new Resolver\AggregateResolver();
            $renderer->setResolver($resolver);

            $map = new Resolver\TemplateMapResolver([
                'layout'      => __DIR__ . '/../../view/layout/email_template.phtml',
            ]);

            $resolver
            ->attach($map)    
            ->attach(new Resolver\RelativeFallbackResolver($map));

            $model    = new ViewModel();
            
            $model = new ViewModel(['products' => $products]);

            $model->setTemplate('layout');
    
            $bodyHtml = $renderer->render($model);


            $html = new MimePart($bodyHtml);
            $html->type = Mime::TYPE_HTML;
            $html->charset = 'utf-8';
            $html->encoding = Mime::ENCODING_QUOTEDPRINTABLE;

            $body = new MimeMessage();
            $body->setParts([$html]);
            
            $message = new Message();
            $message->setBody($body);

            $contentTypeHeader = $message->getHeaders()->get('Content-Type');
            $contentTypeHeader->setType('multipart/alternative');

            $message->setFrom($sender);
            $message->addTo($recipient);
            $message->setSubject($subject);

            // Send E-mail message
            $transport = new SmtpTransport();
            $options   = new SmtpOptions([
                'name'              => 'localhost',
                'host'              => 'smtp.gmail.com',
                'port'              => 587,
                'connection_class'  => 'login',
                'connection_config' => [
                    'ssl'               => 'tls',
                    'username' => 'login',
                    'password' => 'pass',
                ],
            ]);
            $transport->setOptions($options);
            $transport->send($message);

            $result = true;
      
        }catch(\Excpetion $e){
            $result = false;
        }
        return $result;
    }
};
