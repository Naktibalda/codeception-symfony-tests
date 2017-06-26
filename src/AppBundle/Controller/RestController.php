<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RestController
{
    /**
     * @Route("/rest")
     */
    public function restAction(Request $request)
    {
        $tokenHeaderValue = $request->headers->get('X-Auth-Token');

        //var_dump($request->files->all()); die;
        return new JsonResponse([
            'requestMethod' => $request->getMethod(),
            'requestUri' => $request->getRequestUri(),
            'queryParams' => $request->query->all(),
            'formParams' => $request->request->all(),
            'rawBody' => $request->getContent(),
            'headers' => $request->headers->all(),
            'X-Auth-Token' => $tokenHeaderValue,
            'files' => $this->filesToArray($request->files->all()),
        ]);
    }


    /**
     * @param array[UploadedFile] $files
     * @return array
     */
    private function filesToArray(array $files)
    {
        $result = [];
        foreach ($files as $fieldName => $uploadedFile) {

            if (is_array($uploadedFile)) {
                $result[$fieldName] = $this->filesToArray($uploadedFile);
            } else {
                /**
                 * @var $uploadedFile UploadedFile
                 */
                $result[$fieldName] = [
                    'name' => $uploadedFile->getClientOriginalName(),
                    'tmp_name' => $uploadedFile->getPathname(),
                    'size' => $uploadedFile->getClientSize(),
                    'type' => $uploadedFile->getClientMimeType(),
                    'error' => $uploadedFile->getError(),
                ];
            }
        }
        return $result;
    }
}