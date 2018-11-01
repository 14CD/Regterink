<?php
/**
 * Created by PhpStorm.
 * User: onnok
 * Date: 01-11-18
 * Time: 16:23
 */

class DocumentController
{

    private $pdo;

    /**
     * @inheritDoc
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {

    }

    public function addDocument($file) {

    }

    public function getUploadDocumentForm() {
        return require '';
    }

}