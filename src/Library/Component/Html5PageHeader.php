<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2018 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material is strictly forbidden unless prior    |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     12/10/2018
// Project:  UI
//
declare(strict_types=1);
namespace CodeInc\UI\Library\Component;
use CodeInc\UI\PrintableComponentInterface;


/**
 * Class Html5PageHeader
 *
 * @package CodeInc\UI\Library\Component
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class Html5PageHeader implements PrintableComponentInterface
{
    public const DEFAULT_CHARSET = 'utf-8';
    public const DEFAULT_VIEWPORT = 'width=device-width, initial-scale=1, shrink-to-fit=no';

    /**
     * @var null|string
     */
    private $title;

    /**
     * @var string
     */
    private $charset;

    /**
     * @var string|null
     */
    private $language;

    /**
     * @var HtmlHeaders|null
     */
    private $htmlHeaders;

    /**
     * @var
     */
    private $viewport;

    /**
     * Html5PageHeader constructor.
     *
     * @param null|string $title
     * @param string $charset
     * @param null|string $language
     * @param string $viewport
     * @param HtmlHeaders|null $htmlHeaders
     */
    public function __construct(?string $title = null, string $charset = self::DEFAULT_CHARSET,
        ?string $language = null, string $viewport = self::DEFAULT_VIEWPORT, ?HtmlHeaders $htmlHeaders = null)
    {
        $this->title = $title;
        $this->charset = $charset;
        $this->language = $language;
        $this->viewport = $viewport;
        $this->htmlHeaders = $htmlHeaders ?? new HtmlHeaders();
    }

    /**
     * @return null|string
     */
    public function getTitle():?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle(?string $title):void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCharset():string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset):void
    {
        $this->charset = $charset;
    }

    /**
     * @return null|string
     */
    public function getLanguage():?string
    {
        return $this->language;
    }

    /**
     * @param null|string $language
     */
    public function setLanguage(?string $language):void
    {
        $this->language = $language;
    }

    /**
     * @return HtmlHeaders|null
     */
    public function getHtmlHeaders():?HtmlHeaders
    {
        return $this->htmlHeaders;
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function get():string
    {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html<?=$this->language ? ' lang="'.htmlspecialchars($this->language).'"' : ''?>>
            <head>
                <meta charset="<?=htmlspecialchars($this->getCharset())?>">
                <meta name="viewport" content="<?=$this->viewport?>">
                <title><?=htmlspecialchars($this->title)?></title>
                <?=$this->getHtmlHeaders()->get()?>
            </head>

            <body>
        <?
        return ob_get_clean();
    }

    /**
     * @inheritdoc
     * @uses Html5PageHeader::get()
     * @see http://php.net/manual/language.oop5.magic.php#object.tostring
     * @return string
     */
    public function __toString():string
    {
        return $this->get();
    }
}