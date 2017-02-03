<?php

/*
 * This file is part of the BeSimpleSoapClient.
 *
 * (c) Christian Kerl <christian-kerl@web.de>
 * (c) Francis Besset <francis.besset@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BeSimple\SoapClient;

use BeSimple\SoapBundle\Soap\SoapAttachment;
use BeSimple\SoapCommon\Mime\PartFactory;

/**
 * SoapResponseFactory for SoapClient. Provides factory function for SoapResponse object.
 *
 * @author Andreas Schamberger <mail@andreass.net>
 * @author Petr Bechyně <mail@petrbechyne.com>
 */
class SoapResponseFactory
{
    /**
     * Factory method for SoapClient\SoapResponse.
     *
     * @param string                    $content        Content
     * @param string                    $location       Location
     * @param string                    $action         SOAP action
     * @param string                    $version        SOAP version
     * @param string                    $contentType    Content type header
     * @param SoapAttachment[]          $attachments    SOAP attachments
     * @return SoapResponse
     */
    public static function create(
        $content,
        $location,
        $action,
        $version,
        $contentType,
        array $attachments = []
    ) {
        $response = new SoapResponse();
        $response->setContent($content);
        $response->setLocation($location);
        $response->setAction($action);
        $response->setVersion($version);
        $response->setContentType($contentType);
        if (count($attachments) > 0) {
            $response->setAttachments(
                self::createAttachmentParts($attachments)
            );
        }

        return $response;
    }

    /**
     * Factory method for SoapClient\SoapResponse with SoapResponseTracingData.
     *
     * @param string                    $content        Content
     * @param string                    $location       Location
     * @param string                    $action         SOAP action
     * @param string                    $version        SOAP version
     * @param string                    $contentType    Content type header
     * @param SoapResponseTracingData   $tracingData    Data value object suitable for tracing SOAP traffic
     * @param SoapAttachment[]          $attachments    SOAP attachments
     * @return SoapResponse
     */
    public static function createWithTracingData(
        $content,
        $location,
        $action,
        $version,
        $contentType,
        SoapResponseTracingData $tracingData,
        array $attachments = []
    ) {
        $response = new SoapResponse();
        $response->setContent($content);
        $response->setLocation($location);
        $response->setAction($action);
        $response->setVersion($version);
        $response->setContentType($contentType);
        if ($tracingData !== null) {
            $response->setTracingData($tracingData);
        }
        if (count($attachments) > 0) {
            $response->setAttachments(
                PartFactory::createAttachmentParts($attachments)
            );
        }

        return $response;
    }
}
