<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2019 - Code Inc. SAS - All Rights Reserved.           |
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
// Date:     20/02/2018
// Time:     14:46
// Project:  HtmlTemplates
//
namespace CodeInc\HtmlTemplates;
use CodeInc\HtmlTemplates\HtmlHeaders\HtmlHeaders;


/**
 * Interface HtmlTemplateInterface
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
interface HtmlTemplateInterface
{
    /**
     * Returns the object in charge of managing the HTML headers.
     *
     * @return HtmlHeaders
     */
    public function getHeaders():HtmlHeaders;

    /**
     * Returns the full generated HTML page.
     *
     * @return string
     */
    public function getHtml():string;
}